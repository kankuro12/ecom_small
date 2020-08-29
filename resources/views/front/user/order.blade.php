@extends('front.layouts.app')
@section('title','My Order')
@section('content')
<div class="main">
    <div class="page-header text-center" style="background-image: url({{ asset('front/images/page-header-bg.jpg') }})">
        <div class="container">
            <h1 class="page-title">My Order<span>List</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav" style="margin-bottom: 0rem;">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Order</li>
                <li class="breadcrumb-item" aria-current="page">List</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content mt-2">
        <div class="container">
            <h4>My Order List</h4>
            <table class="table table-bordered table-mobile text-center">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Telephone</th>
                        <th>Subtotal</th>
                        <th>Discount</th>
                        <th>Shipping Charge</th>
                        <Th>Total</Th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $item)
                    @php
                        $responseCount = \App\Responsemessage::where('order_id',$item->id)->count();
                        $responseMessage = \App\Responsemessage::where('order_id',$item->id)->first();
                    @endphp
                       <tr>
                           <td>{{ $key+1 }}</td>
                           <td>{{ $item->name }}</td>
                           <td>{{ $item->address }}, {{ $item->district }}</td>
                           <td>{{ $item->phone }}</td>
                           <td>{{ $item->total }}</td>
                           <td>{{ $item->discount }}</td>
                           <td>{{ $item->shipping_charge }}</td>
                           <td>{{ $item->total - $item->discount + $item->shipping_charge }}</td>
                           <td>
                               @if ($item->status == 1)
                                   <span class="badge badge-danger">Waiting</span>
                               @endif
                               @if ($item->status == 2)
                                   <span class="badge badge-warning">In Processing</span>
                               @endif
                               @if ($item->status == 3)
                                   <span class="badge badge-primary">On The Way</span>
                               @endif
                               @if ($item->status == 4)
                                   <span class="badge badge-success">Delivered</span>
                               @endif
                           </td>
                           <td>{{ $item->date() }}</td>
                           <td><a href="{{ url('my-order/detail/'.$item->id) }}">View Detail</a></td>
                       </tr>
                       <tr> <td colspan="11">
                           @if ($responseCount>0)
                             <strong>Response Message :-</strong> {{ $responseMessage->message }}
                           @else
                             <strong>Response Message :-</strong> Not Response Yet !
                           @endif
                           </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $orders->links() }}
            </div>
        </div>
    </div>

</div>

@endsection
