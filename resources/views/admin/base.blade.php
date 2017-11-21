<!doctype html>
<html lang="{{ config('app.locale') }}">
       <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
   			
		<title>E-Shopper @yield('title')</title>
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('css/admin/styles.css') }}" rel="stylesheet">
		
		<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
		
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
   
    </head>
    <body>
   		@include('admin.nav')
   		<div class="container">
   			@yield('content')
   		</div>
 
		
		<script src="{{ asset('js/app.js') }}"></script>
		<script src="{{ asset('js/jquery.js') }}"></script>
		<script src="{{ asset('js/admin/custom.js') }}"></script>
		<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
		<script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
		<script>
		
			$(document).ready(function() {
				$('#datatable').dataTable({
					"lengthMenu": [ [4, 8, 20, -1], [4, 8, 20, "All"] ]
				});

				 $("[data-toggle=tooltip]").tooltip();
			});
		</script>
	</body>
</html>
