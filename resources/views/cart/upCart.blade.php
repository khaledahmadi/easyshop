<script src="{{ asset('js/jquery.js') }}"></script>
<script>
$(document).ready(function(){
<?php for($i=1;$i<20;$i++){?>
  $('#upCart<?php echo $i;?>').on('change keyup', function(){
  var newqty = $('#upCart<?php echo $i;?>').val();
  var rowId = $('#rowId<?php echo $i;?>').val();
  var proId = $('#proId<?php echo $i;?>').val();
   if(newqty <=0){ 
	   alert('enter only valid qty');
   }
  else {
	   $.ajax({
        method: 'GET',
		dataType: 'html',
		url:"{{ url('/cart/update')}}/"+proId,
        data: {qty:newqty,rowId:rowId,proId:proId},
        success: function (response) {
            console.log(response);
            $('#updateDiv').html(response);
        }
    });
  }
	  });
  <?php } ?>
});
</script>
@if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
        @endif
          @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
        @endif
<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Description</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php $count =1;?>
					@foreach($cartItem as $cartItems)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{asset('images/'.$cartItems->options->img) }}" width='150px' height="150px;"></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$cartItems->name}}</a></h4>
								<p>Product ID: {{$cartItems->id}}</p>
                                 <p>Only {{$cartItems->options->stock}} left</p>
							</td>
							<td class="cart_price">
								<p>{{$cartItems->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<input type="hidden" id="rowId<?php echo $count;?>" value="{{$cartItems->rowId}}"/>
                                    <input type="hidden" id="proId<?php echo $count;?>" value="{{$cartItems->id}}"/>
                                    <input type="number" size="2" value="{{$cartItems->qty}}" name="qty" id="upCart<?php echo $count;?>"
                                           autocomplete="off" style="text-align:center; width:60px; "  MIN="1" MAX="30" class="form-control">
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$cartItems->subtotal}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{route('cart.destroy',$cartItems->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php $count++;?>
					@endforeach
					</tbody>
</table>
</div>