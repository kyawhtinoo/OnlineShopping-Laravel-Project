@extends('backend_master')
@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i>Items</h1>
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
            <h2 class="d-inline-block">Items List</h2>
            <a href="{{route('items.create')}}" class="btn btn-primary float-right">Add New</a>
            <div class="table-responsive">
              <table class="table table-hover table-bordered mt-3" id="sampleTable">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Codeno</th>
                    <th scope="col">Name</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Description</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Subcategory</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @php $i= 1; @endphp
                  @foreach($items as $item)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$item->codeno}}</td>
                    <td>{{$item->name}}</td>
                    <td><img src="{{asset($item->photo)}}" width="100"></td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->discount}}</td>
                    <td>{{$item->description}}</td>

                    <td>{{$item->brand->name}}</td>
                    <td>{{$item->subcategory->name}}</td>

                    <td>
                      <a href="{{route('items.edit',$item->id)}}" class="btn btn-warning btn-sm">Edit</a>
                      <form method="post" action="{{route('items.destroy',$item->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
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
  <script type="text/javascript" src="{{ asset('backend_assets/js/plugins/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('backend_assets/js/plugins/dataTables.bootstrap.min.js')}}"></script>
  <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endsection