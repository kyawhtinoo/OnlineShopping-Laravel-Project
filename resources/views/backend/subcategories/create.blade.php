@extends('backend_master')

@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Subcategories</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Subcategories</a></li>
      </ul>
    </div>

    <div class="row">
      <div class="col-md-12">
       <div class="tile">
        <div class="tile-body">
          <h3 class="d-inline-block">Subcategory Form</h3>
          <a href="{{route('subcategories.index')}}" class="btn btn-info float-right">Back</a>
          <form method="post" action="{{route('subcategories.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">

              @error('name')
               <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group ">
                  <label for="category" class=" ">Category</label>
                    <select class="form-control" name="category">
                     
                        @foreach($categories as $category)
                          <option value="{{$category->id}}">{{ $category->name}}</option>
                        @endforeach
                     
                    </select>
                 
                </div>

            <div class="form-group">
              <input type="submit" name="btn-submit" value="Save" class="btn btn-info">
            </div>
            
          </form>

        </div>
       </div>
      </div>
    </div>
</main>
@endsection