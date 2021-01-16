@extends('backend_master')

@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Categories</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Categories</a></li>
      </ul>
    </div>

    <div class="row">
      <div class="col-md-12">
       <div class="tile">
        <div class="tile-body">
         <div class="table-responsive">
          <table class="table table-hover table-bordered mt-3" id="sampleTable">
             <h3 class="d-inline-block">Category List</h3>
             <a href="{{route('categories.create')}}" class="btn btn-primary float-right">Add New</a>
          <thead class="thead-dark">
           <tr>
          <th>#</th>
          <th>Name</th>
          <th>Photo</th>
          <th>Item Count</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @php $i=1; @endphp
        @foreach($categories as $category)
        <tr>
          <td>{{$i++}}</td>
          <td>{{$category->name}}</td>
          <td><img src="{{asset($category->photo)}}" width="100"></td>
          <td>{{count($category->items)}}</td>
          <td>
            <a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning btn-sm">Edit</a>
            <form method="post" action="{{route('categories.destroy',$category->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
              @csrf
              @method('DELETE')
              <input type="submit" name="btn-delete" class="btn btn-danger btn-sm" value="Delete">
            </form>
            
          </td>
        </tr>
        @endforeach
      </tbody>
        </table>
     </div>
   </div>
  </div>
 </div>
</div>
  </main>
@endsection
@section('script')
  <script type="text/javascript" src="{{asset('backend_assets/js/plugins/chart.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend_assets/js/plugins/jquery.dataTables.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('backend_assets/js/plugins/dataTables.bootstrap.min.js')}}"></script>
@endsection
