const ide={
    val:0
}
const campos={
    correo:false,
    contraseña:false,
    nuevaContra:false
}
const expresiones={
    correo: /^.+@(gmail|hotmail|outlook).(com|es)$/,//permite cualquier caracter y solo dominios como:gmail, hotmail y outlook 
	contraseña: /^(?=.*[a-zñÑ0-9])(?=.*[A-Z])(?=.*[!@#$&]).{8,12}$/, // 8 a 12 digitos.
    nuevaContra: /^(?=.*[a-zñÑ0-9])(?=.*[A-Z])(?=.*[!@#$&]).{8,12}$/ // 8 a 12 digitos.
}

function ingresar(){
    var correo=document.getElementById('correo').value;
    var contraseña=document.getElementById('contraseña').value;
    validarCampo(expresiones.correo, correo, "correo");
    validarCampo(expresiones.contraseña, contraseña, "contraseña");
    if(campos.correo==true && campos.contraseña==true){
        buscarCuenta(correo, contraseña);
    }else{
        mensajeInvalidos();
    }
}
function validarCampo(expresion, input, campo){
    if(expresion.test(input) && input.length>0){
        campos[campo]=true;
    }else{
        campos[campo]=false;
    }
}
function buscarCuenta(email, password){
    $.post('metodo-buscarCuenta.php',{usuario:email,pass:password},function(res){
        var res =res.split(":");
        if(res[0]==1){
            ingresarCliente();
        }else{
            if(res[0]==2){
                ingresarEncargado();
            }else{
                mensajeError();
            }
        }
    });
}
function ingresarCliente(){
    Swal.fire({
        title: 'Felicitaciones',
        text: 'Se ha logeado exitosamente como Cliente',
        icon: 'success',
        confirmButtonText: 'Continuar',
        backdrop: true,
        allowOutsideClick: false,
        allowEscapeKey: true,
        allowEnterKey: false,
        stopKetdownPropagation: false
    }).then(function(){
        window.location = "catalogo.php";
    });
        event.preventDefault();
}
function ingresarEncargado(){
    Swal.fire({
        title: 'Felicitaciones',
        text: 'Se ha logeado exitosamente como Establecimiento',
        icon: 'success',
        confirmButtonText: 'Continuar',
        backdrop: true,
        allowOutsideClick: false,
        allowEscapeKey: true,
        allowEnterKey: false,
        stopKetdownPropagation: false
    }).then(function(){
        window.location = "catalogoAdmin.php";
    });
        event.preventDefault();
}
function mensajeError(){
    Swal.fire({
        title: 'Ocurrio un error',
        text: 'Los datos no coinciden con ninguna cuenta creada',
        icon: 'error',
        confirmButtonText: 'Continuar',
        backdrop: true,
        allowOutsideClick: false,
        allowEscapeKey: true,
        allowEnterKey: false,
        stopKetdownPropagation: false
    });
}
function mensajeInvalidos(){
    Swal.fire({
        title: 'Ocurrio un error',
        text: 'Los datos ingresados son invalidos',
        icon: 'error',
        confirmButtonText: 'Continuar',
        backdrop: true,
        allowOutsideClick: false,
        allowEscapeKey: true,
        allowEnterKey: false,
        stopKetdownPropagation: false
    });
}
function mensajeCambioContraseña(){
    Swal.fire({
    title: 'Felicitaciones',
    text: 'Se ha cambiado la contraseña correctamente',
    icon: 'success',
    confirmButtonText: 'Continuar',
    backdrop: true,
    allowOutsideClick: false,
    allowEscapeKey: true,
    allowEnterKey: false,
    stopKetdownPropagation: false
    }).then(function(){
        window.location = "login.php";
    });
        //event.preventDefault_();
}
function verificarCelular(){
    var correo=document.getElementById('corr').value;
    var celular=document.getElementById('celular').value;
    if(correo.length>0 && celular.length>0){
        buscarCuentaCelular(correo, celular);
    }else{
        mensajeInvalidos();
    }
}
var prueba;
function buscarCuentaCelular(email, celphone){
    $.post('metodo-buscarCuentaCelular.php',{user:email,cel:celphone},function(res){
        var res =res.split(":");
        prueba=res;
        if(res[0]==1){
           document.getElementById('cambContr').style.display = 'block';
            document.getElementById('cambiarContr').style.display = 'block';
            ocultar();
        }else{
            if(res[0]==2){
                document.getElementById('cambContr').style.display = 'block';
                document.getElementById('cambiarContr').style.display = 'block';
                ocultar();
            }else{
                mensajeError();
            }
        }
    });
}
function ocultar(){
    document.getElementById('correoOcult').style.display = 'none';
    document.getElementById('telefonoOcult').style.display = 'none';
    document.getElementById('verifOcult').style.display = 'none';
  }
  function cambiarContraseña(){
    var contraseña=document.getElementById('contraNueva').value;
    validarCampo(expresiones.nuevaContra, contraseña, "nuevaContra");
    if(campos.nuevaContra == true){
        if(prueba[0]==1){
            modificarCliente(prueba[1],contraseña);
            mensajeCambioContraseña();
        }else{
            modificarEncargado(prueba[1],contraseña);
            mensajeCambioContraseña();
        }
    }else{
        mensajeInvalidos();
    }
}
function modificarCliente(idCliente,contraseña){
    $.post('metodo-modificarClienteContraseña.php',{id:idCliente, con:contraseña});
}
function modificarEncargado(idEncargado,contraseña){
    $.post('metodo-modificarEncargadoContraseña.php',{id:idEncargado, con:contraseña});
}