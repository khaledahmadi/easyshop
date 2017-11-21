<!doctype html>
<html lang="{{ config('app.locale') }}">
       <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
   			
		<title>E-Shopper @yield('title')</title>
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
		<link href="{{ asset('css/animate.css') }}" rel="stylesheet">
		<link href="{{ asset('css/price-range.css') }}" rel="stylesheet">
		<link href="{{ asset('css/main.css') }}" rel="stylesheet">
		<link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
   
    </head>
    <body>
   		@include('pages.nav')
   		
   		<div class="container">
   			@yield('content')
   		</div>
   		
   		@include('pages.footer')
		
		<script src="{{ asset('js/app.js') }}"></script>
		<script src="{{ asset('js/jquery.js') }}"></script>
		<script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
		<script src="{{ asset('js/price-range.js') }}"></script>
		<script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
		<script src="{{ asset('js/contact.js') }}"></script>
		<script src="{{ asset('js/gmaps.js') }}"></script>
		<script src="{{ asset('js/main.js') }}"></script>
		
		<!--autocomplet search function-->
			<script>
		  <?php $pros = DB::table('products')->get();?>
      $(function(){
         var source = [
             @foreach($pros as $pro)
            { value: "<?php echo url('/');?>/product_details/<?php echo $pro->id;?>",
                label: "<?php echo $pro->pro_name;?>"
            },
            @endforeach
         ];
			 $(".prolist").autocomplete({
					 source: source,
					 select: function(event, ui){
							 window.location.href = ui.item.value;
					 }
			 });
      });	
			
		</script>
	</body>
</html>
