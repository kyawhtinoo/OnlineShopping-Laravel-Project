@extends('frontend_master')
@section('content')
   <!-- Subcategory Title -->
  <div class="jumbotron jumbotron-fluid subtitle">
      <div class="container">
        <h1 class="text-center text-white">Your Order History </h1>
      </div>
  </div>
  
  <!-- Content -->
 {{--  <div class="container mt-5">
  

    <div class="row justify-content-center">
      
      <div class="col-sm-4 my-3">
          <div class="card orderCard">
        
              <div class="card-body">
                <h5 class="card-title">  </h5>
                <h6 class="card-text">  </h6>
                 <p class="text-white card-text float-right"> 
              <span class="bg-warning"></span>
         
           
             <span class="bg-danger"></span>
           
              <span class="bg-success"></span>
           
           </p>

                <a href="javascript:void(0)" class="btn btn-secondary mainfullbtncolor btn-sm orderDetail" data-id="" data-orderdate="" data-voucherno="" data-total="" data-status="">
               Detail
            </a>

              </div>
          </div>
      </div>

     

    </div>
    

  </div> --}}

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Date</th>
              <th>Total Amount</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @php $i=1; @endphp
            @foreach($orders as $order)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$order->orderdate}}</td>
              <td>{{$order->total}}</td>
              <td>
                 @if($order->status==0)
                  <p class="text-white d-inline-block bg-warning rounded py-1 px-2">Pending</p>
                 @elseif($order->status==1)
                  <p class="text-white d-inline-block bg-success rounded py-1 px-2">Success</p>
                 @elseif($order->status==2)
                  <p class="text-white d-inline-block bg-danger rounded py-1 px-2">Cancel</p>
                 @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>


<!-- Modal -->
{{-- <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel"> 
              Order Detail
            </h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-9">
                  <h5> Voucherno: <span id="invoiceNo"></span> </h5>
                  <h6> Date : <span id="dateNo"></span> </h6>


                </div>
                <div class="col-3" id="orderStatus">
                  
                </div>
              </div>

              <div class="col-12 mt-3">

                <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th colspan="2"> Product </th>
                    <th> Qty </th>
                    <th> Price </th>
                    <th> Total </th>
                  </tr>
                </thead>
                <tbody id="orderDetail">
                </tbody>
                <tfoot id="shoppingcart_tfoot">
                  <tr>
                    <td colspan="8">
                      <h3 class="text-right"> Total : <span id="orderTotal"></span> </h3>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </div>
              </div>

            </div>
          </div>
      </div>
  </div>
</div> --}}
@endsection