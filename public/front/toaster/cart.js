// cart item list

// cart item update quantity
function updateCartQty(cart_id,qty){
    axios.get('cart/update-qty/'+cart_id+'/'+qty)
    .then(function (response) {
        var data = response.data;
        if(data.qty != null){
            bootoast.toast({
                message: 'Quantity has been updated successfully!',
                type: 'success'
              });
        }else{
            bootoast.toast({
              message: data.message,
              type: 'danger'
            });
        }
        console.log(data);
      }).catch(function (error) {
      console.log(error);
  })
}

// cart item list
axios.get('cart/item/list')
.then(function (response) {
    var data = response.data;
    var total = 0;
    data.cart.forEach(element => {
          total = total + (element.price*element.qty);
      var html ='<div class="product" id="cartItem-'+element.id+'">';
            html+='<div class="product-cart-details">';
            html+='<h4 class="product-title">';
            html+='<a href="#">'+element.product_name+'</a></h4>';
            html+='<span class="cart-product-info">';
            html+='<span class="cart-product-qty">'+element.qty+'</span>x NPR'+element.price+'</span></div>';
            html+='<figure class="product-image-container">';
            html+='<a href="product.html" class="product-image">';
            html+='<img src="back/images/product/'+element.product_image+'" alt="product"></a></figure>';
            html+='<span onclick="removeCartItem('+element.id+');" class="btn-remove" title="Remove Product"><i class="icon-close"></i></span></div>';
            $('#cartItem').append(html);
    });
    console.log(data.cart);
    $('#totalAmt').append('NPR '+total);
  }).catch(function (error) {
  console.log(error);
})


// cart item remove

function removeCartItem(cart_id,totalamt){
    axios.get('api/remove/cart/item/'+cart_id)
    .then(function (response) {
        var data = response.data;
            bootoast.toast({
              message: data.message,
              type: 'success'
            });
            $('#cartItem-'+cart_id).empty();
        // console.log(data);
      }).catch(function (error) {
      console.log(error);
  })
}

