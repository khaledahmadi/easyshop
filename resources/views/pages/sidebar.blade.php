<script src="{{ asset('js/jquery.js') }}"></script>
	<div class="row" >
		<div class="col-md-3">
		<div class="left-sidebar">
			<h2>Category</h2>
			<div class="panel-group category-products" id="accordian"><!--category-productsr-->
				
				@foreach(App\Cat::all() as $categories)
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordian" href="#{{$categories->category_id}}">
								<span class="badge pull-right"><i class="fa fa-plus"></i></span>
								{{$categories->name}}
							</a>
						</h4>
					</div>
					<div id="{{$categories->category_id}}" class="panel-collapse collapse">
						<div class="panel-body">
							<ul>
							@foreach($categories->SubCat as $sub)
								<li><a href="">{{$sub->name}}</a></li>
							@endforeach
							</ul>
						</div>
					</div>
				</div>
				@endforeach
				@foreach(App\Cat::orderBy('name', 'asc')->get() as $categories)
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><input type="checkbox" id="fetchCat" class="fetchCat" value="{{$categories->category_id}}"> <a href="{{ route('pages.catpro',$categories->name) }}"><span class="pull-right">({{ App\Product::where('category_id', $categories->category_id)->count()}})</span>{{$categories->name}}</a></h4>
					</div>
				</div>
				@endforeach
			</div><!--/category-productsr-->
		
			<div class="brands_products"><!--brands_products-->
				<h2>Brands</h2>
				<div class="brands-name">
					<ul class="nav nav-pills nav-stacked">
					@foreach(App\Brand::all() as $brands)
						<li><a href="{{ route('pages.brandpro',$brands->name) }}"> <span class="pull-right">(50)</span>{{$brands->name}}</a></li>
					@endforeach
					</ul>
				</div>
			</div><!--/brands_products-->
			
			<div class="price-range"><!--price-range-->
				<h2>Price Range</h2>
				<div class="well">
				 	<div id="slider-range"></div>
					 <br/>
					 <b>$ <input type="text" size="2" id="max_amount" name="max_amount" value="50" class="text_range" readonly></b> <b class="pull-right">$ <input type="text" size="2"  id="min_amount" name="min_amount" value="200" class="text_range" readonly></b>
				</div>
			</div><!--/price-range-->
			
			<div class="shipping text-center"><!--shipping-->
				<img src="images/home/shipping.jpg" alt="" />
			</div><!--/shipping-->
			
		</div>
	</div>
</div>


<!--slider range javaScript Funtions-->
		<script>
		  $(document).ready(function() {
			$( "#slider-range" ).slider({
			  range: true,
			  min: 10,
			  max: 400,
			  values: [50, 200],
			  slide: function( event, ui ) {
				$( "#max_amount" ).val(ui.values[0]);
				$( "#min_amount" ).val(ui.values[1]);
				
					var max=$('#max_amount').val();
   				var min=$('#min_amount').val();
				  
				$.ajax({
				   type:'GET',
					 dataType: 'html',
				   url:'',
				   data:{max:max, min:min},
				   success:function(response){
					   //alert(response);
					   $('#show_based_onRange').html(response);
				   }
			   });
			  }
			});
				
			//Fetch data based on category 
				$(".fetchCat").click(function(){
			    
					var fetch= [];
					$(".fetchCat").each(function(){
						if($(this).is(':checked')){
							fetch.push($(this).val());
						}
					});
					
					finalFetch=fetch.toString();
					
					$.ajax({
				   type:'GET',
					 dataType: 'html',
				   url:'',
				   data:{fetchCat:finalFetch},
				   success:function(response){
					   //alert(response);
						 console.log(finalFetch);
					   $('#show_based_onRange').html(response);
				   }
			   });
				});
				
		  });
  		</script>