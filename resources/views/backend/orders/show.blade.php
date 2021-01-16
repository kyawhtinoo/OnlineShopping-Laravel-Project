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
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-globe"></i> Vali Inc</h2>
                </div>
                <div class="col-6">
                  <h5 class="text-right">Date: {{$order->orderdate}}</h5>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-4">From
                  <address><strong>Vali Inc.</strong><br>518 Akshar Avenue<br>Gandhi Marg<br>New Delhi<br>Email: hello@vali.com</address>
                </div>
                <div class="col-4">To
                  <address><strong>{{$order->user->name}}</strong><br>795 Folsom Ave, Suite 600<br>San Francisco, CA 94107<br>Phone: (555) 539-1037<br>Email: john.doe@example.com</address>
                </div>
                <div class="col-4"><b>Order No: {{$order->orderno}}</b><b><br><b>Total:</b> {{$order->total}}</div>
              </div>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Qty</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($order->items as $item)
                      @php 
                      $qty = $item->pivot->qty;
                      $subtotal = $item->price*$qty; 
                      @endphp
                      <tr>
                        <td>{{$qty}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$subtotal}}</td>
                      </tr>
                      @endforeach
                  </table>
                </div>
              </div>
              <div class="row d-print-none mt-2">
                    @if($order->status == 0)
                       
                        <form action="{{route('orders.update',$order->id)}}" method="post">
                          @csrf
                          @method("PUT")
                         <button class="btn btn-info" type="submit" style="margin-left: 1050px;">Confirm</button>
                        </form>
                       
                        
                        <form  action="{{route('orders.destroy',$order->id)}}" method="post">
                          @csrf
                          @method("DELETE")
                         <button class="btn btn-danger mx-1" type="submit" >Cancel</button>
                        </form>
    
                    @endif
              </div>
            </section>
          </div>
        </div>
      </div>  
  </main>
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('backend_assets/js/plugins/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend_assets/js/plugins/dataTables.bootstrap.min.js')}}"></script>
  <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endsection 