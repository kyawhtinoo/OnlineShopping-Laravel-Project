@extends('backend_master')

@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Orders</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Orders</a></li>
      </ul>
    </div>

    <div class="row">
      <div class="col-md-12">
       <div class="tile">
        <div class="tile-body">
         <div class="table-responsive">
          <table class="table table-hover table-bordered mt-3" id="sampleTable">
             <h3 class="d-inline-block">Orders List</h3>
            
          <thead class="thead-dark">
           <tr>
          <th>#</th>
          <th>Order No</th>
          <th>Total</th>
          <th>Order Date</th>
          <th>Customer Name</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @php $i=1; @endphp
        @foreach($orders as $order)
        <tr>
          <td>{{$i++}}</td>
          <td>{{$order->orderno}}</td>
          <td>{{number_format($order->total)}}</td>
          <td>{{$order->orderdate}}</td>
          <td>{{$order->user->name}}</td>
          
          <td>

              @if($order->status==0)
                <p class="text-white d-inline-block bg-warning rounded py-1 px-2">Pending</p>
              @elseif($order->status==1)
                <p class="text-white d-inline-block bg-success rounded py-1 px-2">Success</p>
              @elseif($order->status==2)
                <p class="text-white d-inline-block bg-danger rounded py-1 px-2">Cancel</p>
              @endif
          
          </td>
          

          <td>
            <a href="{{route('orders.show',$order->id)}}" class="btn btn-info">Detail</a>
            
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