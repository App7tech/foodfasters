//add to cart
function add_to_cart(product_id,restaurant_id,quantity,customer_id,update){
	var cartData = {};
	cartData['product_id'] = product_id; 
	cartData['restaurant_id'] = restaurant_id; 
	cartData['quantity'] = quantity;
	cartData['customer_id'] = customer_id;
	cartData['update'] = update; 
	$.ajax({
		data:cartData,
		url:baseUrl+'home/cart',
		type:'POST',
		dataType:'JSON',
		success:function(response){
			console.log(response);
			if(response.status){
				refreshCart();
			}else{
				alert(response.message);
			}
			
		}
	});
}

