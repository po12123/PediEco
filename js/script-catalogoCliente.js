document.querySelectorAll('.products-container .product').forEach(product =>{
  product.onclick = () =>{
    let name = product.getAttribute('data-name');
      window.location = "detallesProductoCliente.php?id="+name;
}});
