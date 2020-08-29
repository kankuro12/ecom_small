@extends('back.layouts.app')
@section('title','Pending Order')
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
                        <div class="card-header">
                            <div class="d-md-flex align-items-md-start">
                                <h3 class="page-title mr-sm-auto"> List Of Customer Order In Pending State </h3><!-- .btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            @include('back.layouts.message')
                           <table class="table table-bordered ">
                               <tr>
                                    <th>S.N</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Subtotal</th>
                                    <th>Discount</th>
                                    <th>Shipping Charge</th>
                                    <th>Total</th>
                                    <th>Action</th>
                               </tr>
                               @foreach ($orders as $key => $item)
                                   <tr>
                                      <td>{{ $key+1 }}</td>
                                      <td>{{ $item->name }}</td>
                                      <td>{{ $item->address }}, {{ $item->city }}, {{ $item->district }}</td>
                                      <td>{{ $item->phone }}</td>
                                      <td>{{ $item->total }}</td>
                                      <td>{{ $item->discount }}</td>
                                      <td>{{ $item->shipping_charge }}</td>
                                      <td>{{ $item->total - $item->discount + $item->shipping_charge }}</td>
                                      <td><a href="{{ url('dashboard/pending-order-detail/'.$item->id) }}">View</a></td>
                                   </tr>
                               @endforeach
                           </table>
                        </div><!-- /.card-body -->
                        <div class="d-flex justify-content-center">

                        </div>
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
