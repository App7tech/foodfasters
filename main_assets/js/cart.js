$(document).ready(function(){
	var cartData = {};
	// cartData['customer_id'] = customer_id; 
	cartData['customer_id'] = 1; 
	refreshCart(cartData);
});

function refreshCart(cartData){
	$.ajax({
		data:cartData,
		url:baseUrl+'home/getCart',
		type:'POST',
		dataType:'JSON',
		success:function(response){
			var data = '';
			console.log(response);
			if(response.status){
				var jsonData = response.data;
				jsonData.forEach(function(cart){
					var update = 1;
					var product_id = cart['product_id'];
					var restaurant_id = cart['restaurant_id'];
					var customer_id = cart['customer_id'];
					// var quantity = $('#number-input').val();
					data += ' <div class="col-xs-8">';
					data += ' 	<div class="title-row">'+cart['product_name']+'</div>';
					data += ' </div>';
					data += ' <div class="col-xs-3">';
					data += ' 	<input class="form-control" type="number" value="'+cart['quantity']+'" id="number-input" onchange="add_to_cart('+product_id+','+restaurant_id+',this.value,'+customer_id+','+update+')">';
					data += ' </div>';
					data += ' <div class="col-xs-1">';
					data += ' 	<a href="#"><i class="fa fa-trash pull-right"></i></a>';
					data += ' </div>';
				});
				$('.cartData').html(data);
			}
		}
	});
}
