function agregar(id, precio){
    subirBD_PC(id, precio);
}
const subirBD_PC=(id, precio)=>{
	let formData = new FormData();
	var cantidad=document.getElementById('cant').value;
	formData.append("id", id);
	formData.append("pre", precio);
    formData.append("can", cantidad);

    fetch("metodo-subirBD_PC.php", {
	method: 'POST',
	body: formData,
	});
    alert("registro exitoso");
}
