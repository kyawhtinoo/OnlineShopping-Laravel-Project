@extends('backend_master')

@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Items</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Items</a></li>
      </ul>
    </div>
   
    <div class="row">
      <div class="col-md-12">
       <div class="tile">
        <div class="tile-body">
          <h3 class="d-inline-block">Item Edit Form</h3>
          <a href="{{route('items.index')}}" class="btn btn-info float-right">Back</a>
          <form method="post" action="{{route('items.update',$item->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
              <label for="name">Codeno</label>
              <input type="text" name="codeno" id="codeno" class="form-control @error('codeno') is-invalid @enderror" value="{{$item->codeno}}">

              @error('codeno')
               <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>


            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$item->name}}">

              @error('name')
               <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            
            <div class="form-group">
              <label for="photo">Photo</label>
             <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Old Photo</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">New Photo</a>
                  </li>
              </ul>
              <div class="tab-content my-2" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <img src="{{asset($item->photo)}}" width="100">
              </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror" id="photo">
                    @error('photo')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>

             <div class="form-group">
              <label for="name">Price</label>
              <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{$item->price}}">

              @error('price')
               <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

             <div class="form-group">
              <label for="name">Discount</label>
              <input type="text" name="discount" id="discount" class="form-control @error('discount') is-invalid @enderror" value="{{$item->discount}}">

              @error('discount')
               <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

             <div class="form-group">
              <label for="name">Description</label>
              <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{$item->description}}">

              @error('description')
               <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group ">
              <label for="category" class=" ">Brand</label>
                <select class="form-control" name="brand">
                 
                    @foreach($brands as $brand)
                      <option value="{{$brand->id}}" @if($brand->id==$item->brand_id) selected="selected" @endif>{{ $brand->name}}</option>
                    @endforeach
                 
                </select>
             
            </div>


            <div class="form-group ">
              <label for="category" class=" ">Subcategory</label>
                <select class="form-control" name="subcategory">
                 
                    @foreach($subcategories as $subcategory)
                      <option value="{{$subcategory->id}}" @if($subcategory->id==$item->subcategory_id) selected="selected" @endif>{{ $subcategory->name}}</option>
                    @endforeach
                 
                </select>
             
            </div>

            <div class="form-group">
              <input type="submit" name="btn-submit" value="Update" class="btn btn-info">
            </div>
            
          </form>

        </div>
       </div>
      </div>
    </div>
</main>
@endsection