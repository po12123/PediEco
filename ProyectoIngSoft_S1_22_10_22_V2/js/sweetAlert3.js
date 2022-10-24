
if(x > 0){
    Swal.fire({
    title: 'Felicitaciones',
    text: 'Se ha registrado exitosamente',
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
    event.preventDefault_();
}
