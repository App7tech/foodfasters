$(document).ready(function(){
	// var cartData = {};
	// cartData['customer_id'] = customer_id; 
	// cartData['customer_id'] = 1; 
	refreshCart();
});

function refreshCart(){
	$.ajax({
		// data:cartData,
		url:baseUrl+'home/getCart',
		// type:'POST',
		dataType:'JSON',
		success:function(response){
			var data = '';
			console.log(response);
			if(response.status){
				var jsonData = response.data;
				var totalAmount = 0;
				jsonData.forEach(function(cart){
					var update = 1;
					var product_id = cart['product_id'];
					var restaurant_id = cart['restaurant_id'];
					var customer_id = cart['customer_id'];
					// var quantity = $('#number-input').val();
					data += ' <div class="row">';
					data += ' <div class="col-xs-3">';
					data += ' 	<div class="title-row" style="text-transform:capitalize">'+cart['product_name']+'</div>';
					data += ' </div>';
					data += ' <div class="col-xs-3">';
					data += '₹ '+cart['price']+' X ';
					data += ' </div>';
					data += ' <div class="col-xs-2">';
					data += ' 	<input class="form-control cart-quant-input" type="number" value="'+cart['quantity']+'" id="number-input" onchange="add_to_cart('+product_id+','+restaurant_id+',this.value,'+customer_id+','+update+')">';
					data += ' </div>';
					data += ' <div class="col-xs-3">';
					data += ' = '+parseFloat(cart['price']*cart['quantity']);
					data += ' </div>';
					data += ' <div class="col-xs-1">';
					data += ' 	<a href="#" onclick="deleteItem('+cart['cart_id']+');"><i class="fa fa-trash pull-right"></i></a>';
					data += ' </div>';
					data += ' </div>';
					totalAmount += parseFloat(cart['price']*cart['quantity']);
					console.log(totalAmount);
				});
					data += '<hr> <div class="row">';
					data += ' <div class="col-xs-8">';
					data += ' Total:';
					data += ' </div>';
					data += ' <div class="col-xs-3">';
					data += ' = '+totalAmount;
					data += ' </div>';
					data += ' <div class="col-xs-1">';
					data += ' </div>';
					data += ' </div>';

					data += '<hr> <div class="row">';
					data += ' <div class="col-xs-4">';
					data += ' </div>';
					data += ' <div class="col-xs-4">';
					data += ' <a href="" class="btn theme-btn btn-lg">Checkout</a>';
					data += ' </div>';
					data += ' <div class="col-xs-4">';
					data += ' </div>';
					data += ' </div>';

				$('.cartData').html(data);
			}else{
				$('.cartData').html(response.message);
			}
		}
	});
}
//function for deleting cart idems
function deleteItem(cart_id){
	var cartData = {};
	cartData['cart_id'] = cart_id;
	$.ajax({
		data:cartData,
		url:baseUrl+'home/deleteCart',
		type:'POST',
		dataType:'JSON',
		success:function(response){
			var data = '';
			console.log(response);
			if(response.status){
				var jsonData = response.data;
				refreshCart();
				console.log(response.message);
				// $('.cartData').html(data);
			}
		}
	});
}