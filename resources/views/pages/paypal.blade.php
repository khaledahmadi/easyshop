<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="business" value="khaledahmadi455@yahoo.com">

<?php $count=0; ?>
@foreach($cartlist as $cartlists)
<?php $count++ ?>
<input type="hidden" name="item_name_{{$count}}" value="{{$cartlists->name}}">
<input type="hidden" name="item_number_{{$count}}" value="{{$cartlists->id}}">
<input type="hidden" name="quantity_{{$count}}" value="{{$cartlists->qty}}">
<input type="hidden" name="amount_{{$count}}" value="{{$cartlists->price}}">
<input type="hidden" name="shipping_{{$count}}" value="0.75">
@endforeach
<input type="image" name="submit" value="PayPal" id="paypalbtn" src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalcheckout-34px.png" height="60">

<input type="hidden" name="return" id="return" value="http://localhost:8000/ThankYou" />
<input type="hidden" name="cancel_return" id="cancel_return" value="http://localhost:8000/checkout" />
</form>