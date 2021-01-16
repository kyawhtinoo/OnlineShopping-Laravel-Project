<div>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid - Cato the Younger -->
</div>

    @foreach($categories as $category)
			          	
			          	{{-- <a href="{{route('categoriesitempage',$category->id)}}"><li class="dropdown-submenu"> --}}
			          		<li class="dropdown-submenu">
			          		<a class="dropdown-item" href="{{route('categoriesitempage',$category->id)}}">
			          			{{$category->name}}
			          			
			          		</a>
			          		
				         {{--  <ul class="dropdown-menu">
				          	
				            	<h6 class="dropdown-header">
				            		{{$category->name}}
				            	</h6>
				            @foreach( $category->subcategories as $subcategory)
				              	<li><a class="dropdown-item" href="{{route('categoriesitempage',$subcategory->id)}}">{{$subcategory->name}}</a></li>
				              	
				            @endforeach
				          </ul> --}}
				           
			          	</li>
 
			          


	@endforeach