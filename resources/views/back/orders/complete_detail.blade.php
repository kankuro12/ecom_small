@extends('back.layouts.app')
@section('title','Complete Order Detail')
@section('content')

<main class="app-main">
        <!-- .wrapper -->
        <div class="wrapper">
          <!-- .page -->
          <div class="page">
            <!-- .page-inner -->
            <div class="page-inner">
                <div class="card card-fluid" style="margin-top:1rem;">
                        <!-- .card-header -->
                        {{-- <div class="card-header">
                            <div class="d-md-flex align-items-md-start">
                                <h3 class="page-title mr-sm-auto"> List Of Customer Order In Pending State </h3><!-- .btn-toolbar -->
                            </div>
                        </div> --}}
                        <!-- .card-body -->
                        <div class="card-body">
                            @include('back.layouts.message')

                            <div class="row">
                                <div class="col-md-6">
                                    @php
                                        $billingDetail = \App\User::where('id',$orderDetail[0]->order->user_id)->first();
                                    @endphp
                                    <h5>Billing Information</h5>
                                    <hr>
                                        <dl class="row">
                                                <dt class="col-md-6">Customer Name :-</dt>
                                                <dd class="col-md-6">{{ $billingDetail->name }}</dd>
                                                <dt class="col-md-6">Customer phone Number :-</dt>
                                                <dd class="col-md-6">{{ $billingDetail->phone }}</dd>
                                                <dt class="col-md-6">Customer Mail :-</dt>
                                                <dd class="col-md-6">{{ $billingDetail->email }}</dd>
                                                <dt class="col-md-6">Customer Address :-</dt>
                                                <dd class="col-md-6">{{ $billingDetail->address }}</dd>
                                                <dt class="col-md-6">Order Status :-</dt>
                                                <dd class="col-md-6">
                                                    @if ($orderDetail[0]->order->status == 1)
                                                        <span class="badge badge-danger">Waiting</span>
                                                    @endif
                                                    @if ($orderDetail[0]->order->status == 2)
                                                        <span class="badge badge-warning">In Processing</span>
                                                    @endif
                                                    @if ($orderDetail[0]->order->status == 3)
                                                        <span class="badge badge-primary">On The Way</span>
                                                    @endif
                                                    @if ($orderDetail[0]->order->status == 4)
                                                        <span class="badge badge-success">Delivered</span>
                                                    @endif
                                                </dd>
                                        </dl>
                                </div>
                                <div class="col-md-6">
                                    <h5>Shipping Information</h5>
                                    <hr>
                                    <dl class="row">
                                        <dt class="col-md-6">Customer Name :-</dt>
                                        <dd class="col-md-6"> {{ $orderDetail[0]->order->name }} </dd>
                                        <dt class="col-md-6">Customer Phone Number :-</dt>
                                        <dd class="col-md-6">{{ $orderDetail[0]->order->phone }}</dd>
                                        <dt class="col-md-6">Customer Email :-</dt>
                                        <dd class="col-md-6">{{ $orderDetail[0]->order->email }}</dd>
                                        <dt class="col-md-6">Customer Address :-</dt>
                                        <dd class="col-md-6"> {{ $orderDetail[0]->order->address }}, {{ $orderDetail[0]->order->city }}, {{ $orderDetail[0]->order->district }} </dd>
                                        <dt class="col-md-6">Zipcode :-</dt>
                                        <dd class="col-md-6">{{ $orderDetail[0]->order->zipcode }}</dd>
                                        <dt class="col-md-6">Customer Message :-</dt>
                                        <dd class="col-md-6">{{ $orderDetail[0]->order->order_note }}</dd>
                                </dl>
                                </div>
                            </div>
                            <hr>
                           <table class="table table-bordered ">
                               <tr>
                                    <th>S.N</th>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                               </tr>
                               @php
                                   $total = 0;
                                   $discount = 0;
                               @endphp
                               @foreach ($orderDetail as $key => $item)
                               <tr>
                                   <td> {{ $key+1 }} </td>
                                   <td><img src="{{ asset('back/images/product/'.$item->product->feature_image) }}" height="100" alt="ProductImage"></td>
                                   <td>
                                       {{ $item->product->name }}
                                       @if ($item->color_id == null)
                                           <p>--This product has not any attributes !</p>
                                        @else
                                           <p>Color :- <strong>{{ $item->color_name }}</strong>  | Size :- <strong>{{ $item->size_name }}</strong> </p>
                                       @endif
                                   </td>
                                   <td>{{ $item->qty }}</td>
                                   <td>NPR {{ $item->rate }}</td>
                               </tr>
                               @php
                                   $total = $total + ($item->qty * $item->rate);
                                   $discount = $item->order->discount;
                                   $shipping_charge = $item->order->shipping_charge;
                               @endphp
                               @endforeach
                               <tr>
                                   <td class="text-right" colspan="4"> <strong>Subtotal :</strong> </td>
                                   <td class="5">NPR {{ $total }} </td>
                               </tr>
                               <tr>
                                   <td class="text-right" colspan="4"> <strong>Discount :</strong> </td>
                                   <td colspan="5">NPR ({{ $discount }})</td>
                               </tr>
                               <tr>
                                   <td class="text-right" colspan="4"> <strong>Shipping Charge :</strong> </td>
                                   <td colspan="5">NPR {{ $shipping_charge }}</td>
                               </tr>
                               <tr>
                                    <td class="text-right" colspan="4"> <strong>Net Total :</strong> </td>
                                   <td colspan="5">NPR {{ $total + $shipping_charge - $discount }}</td>
                               </tr>
                           </table>
                        </div><!-- /.card-body -->
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
