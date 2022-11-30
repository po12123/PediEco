fetch('metodo-listarCarrito.php')
.then(res => res.json())
.then(data => {

    // console.log(data);
    let str = '';
    data.map(item => {
        str += `
        <div class="row shoppingCartItem">
              <div class="col-6">
                  <div class="shopping-cart-item d-flex align-items-center h-100 border-bottom pb-2 pt-3">
                      <img src="data:image/png;base64,${item.imagen}" class="shopping-cart-image" width="150" height="150">
                      <div class=grupo_producto>
                        <h6 class="shopping-cart-item-title shoppingCartItemTitle text-truncate ml-3 mb-0">${item.nombre}</h6>
                        <h6 class="shopping-cart-item-title shoppingCartItemTitle text-truncate ml-3 mb-0">${item.est}</h6>
                      </div>
                  </div>
              </div>
              <div class="col-2">
                  <div class="shopping-cart-price d-flex align-items-center h-100 border-bottom pb-2 pt-3">
                      <p class="item-price mb-0 shoppingCartItemPrice">${item.precio} Bs</p>
                  </div>
              </div>
              <div class="col-4">
                  <div
                      class="shopping-cart-quantity d-flex justify-content-between align-items-center h-100 border-bottom pb-2 pt-3">
                      <div>
                        <a onclick="reducirCantidad(${item.id},${item.precio})" class="btn btn-danger buttonDelete" type="button">-</a>
                        <b class="shopping-cart-quantity-input shoppingCartItemQuantity" id="can${item.id}">${item.cantidad}</b>
                        <a onclick="aumentarCantidad(${item.id},${item.precio},${item.max})" class="btn btn-danger buttonDelete" type="button">+</a>
                      </div>
                      <a onclick="abrirNotas(${item.id})" class="btn btn-danger buttonDelete" type="button">Notas</a>
                      <a onclick="eliminar(${item.id})" class="btn btn-danger buttonDelete" type="button">X</a>
                  </div>
              </div>
          </div>
          <div>
            <dialog class="notas" id="modal${item.id}">
              <h2>Notas del producto</h2>
              <textarea id="texto${item.id}" cols="45" rows="6">${item.nota}</textarea>
              <a onclick="guardarNota(${item.id},)" id="guardarNotas">Guardar</a>
            </dialog>
          </div>`
    });
    const shoppingCartItemsContainer = document.querySelector(
      '.shoppingCartItemsContainer'
    );
    const elementsTitle = shoppingCartItemsContainer.getElementsByClassName(
      'shoppingCartItemTitle'
    );
    const shoppingCartRow = document.createElement('div');
    shoppingCartRow.innerHTML = str;
    shoppingCartItemsContainer.append(shoppingCartRow);
    cambiarTotal();

});

function reducirCantidad(idProducto, pProducto){
  var cantidad=+document.getElementById('can'+idProducto).innerHTML;
  console.log("reducir");
  console.log(idProducto);
  console.log(cantidad-1);
  if(cantidad>1){
    document.getElementById('can'+idProducto).innerHTML=cantidad-1;
    actualizarCarrito(idProducto, cantidad-1, pProducto);
    cambiarTotal();
  }
}
function aumentarCantidad(idProducto, pProducto, pMax){
  var cantidad=+document.getElementById('can'+idProducto).innerHTML;
  console.log("aumentar");
  console.log(idProducto);
  console.log(cantidad+1);
  console.log(pMax);
  if(cantidad<pMax){
    document.getElementById('can'+idProducto).innerHTML=cantidad+1;
    actualizarCarrito(idProducto, cantidad+1, pProducto);
    cambiarTotal();
  }
}
function abrirNotas(idN){
  const modal = document. querySelector('#modal'+idN);
  console.log('#modal'+idN);
  modal.showModal();
}
function guardarNota(idN){
  var texto=document.getElementById('texto'+idN).value;
  console.log(texto.length);
  if(texto.length>0){
    actualizarNotaProducto(idN,texto);
  }
  const modal = document. querySelector('#modal'+idN);
  console.log('#modal'+idN);
  modal.close();
}
function actualizarNotaProducto(idProducto,notaP){
  console.log("actualizar nota");
  console.log(idProducto);
  let formData = new FormData();
	formData.append("idP", idProducto);
  formData.append("notaP", notaP);
  fetch("metodo-actualizarNota_PC.php", {
	method: 'POST',
	body: formData,
	}); 
}
function actualizarCarrito(idProducto, cantidad, precio){
  let formData = new FormData();
	formData.append("idP", idProducto);
  formData.append("canP", cantidad);
  formData.append("preP", precio);
  fetch("metodo-cambiarCantidad_PC.php", {
	method: 'POST',
	body: formData,
	}); 
}
function cambiarTotal() {
  let total = 0;
  const shoppingCartTotal = document.querySelector('.shoppingCartTotal');

  const shoppingCartItems = document.querySelectorAll('.shoppingCartItem');

  shoppingCartItems.forEach((shoppingCartItem) => {
    const shoppingCartItemPriceElement = shoppingCartItem.querySelector(
      '.shoppingCartItemPrice'
    );
    const shoppingCartItemPrice = Number(
      shoppingCartItemPriceElement.textContent.replace('Bs', '')
    );
    const shoppingCartItemQuantityElement = shoppingCartItem.querySelector(
      '.shoppingCartItemQuantity'
    );
    const shoppingCartItemQuantity = Number(
      +shoppingCartItemQuantityElement.innerHTML
    );
    total = total + shoppingCartItemPrice * shoppingCartItemQuantity;
  });
  shoppingCartTotal.innerHTML = `${total.toFixed(2)}Bs`;
}
function eliminar (idProducto){
  Swal.fire({
    title: 'Quieres eliminar este prouducto del carrito?',
    text: "Esto no se puede revertir ",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#eda919',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, eliminar'
  }).then((result) => {
    if (result.isConfirmed) {
      let formData = new FormData();
	    formData.append("idP", idProducto);
      fetch("metodo-eliminar_PC.php", {
	    method: 'POST',
	    body: formData,
	    });

      location.reload();
      Swal.fire(
        'Eliminado!',
        'El producto fue eliminado de manera correcta.',
        'success'
      )
    }
  })
}