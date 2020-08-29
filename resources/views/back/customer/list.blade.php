@extends('back.layouts.app')
@section('title','Customer List')
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
                                <h3 class="page-title mr-sm-auto"> List Of Customers  </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <!-- <a href="" class="btn btn-primary">Create New Coupon</a> -->
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            @include('back.layouts.message')
                           <table class="table table-bordered ">
                               <tr>
                                    <th>S.N</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Telephone</th>
                                    <th>Email</th>
                               </tr>
                                 @foreach ($customers as $k => $attr)
                                  <tr>
                                      <td>{{ $k+1 }}</td>
                                      <td class="text-center"><img src="{{ asset('front/images/customers/'.$attr->image)}}" alt="image" style="height:70px; width:70px; border-radius: 50%;"></td>
                                      <td>{{ $attr->name }}</td>
                                      <td>{{ $attr->address }}</td>
                                      <td>{{ $attr->phone }}</td>
                                      <td>{{ $attr->email }}</td>
                                  </tr>
                                 @endforeach
                           </table>

                        </div><!-- /.card-body -->
                        <div class="d-flex justify-content-center">
                            {{ $customers->links() }}
                        </div>
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
