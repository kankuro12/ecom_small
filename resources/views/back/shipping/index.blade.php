@extends('back.layouts.app')
@section('title','District For Shipping')
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
                                <h3 class="page-title mr-sm-auto"> List District For Shipping Charge </h3><!-- .btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            @include('back.layouts.message')
                           <table class="table table-bordered ">
                               <tr>
                                    <th>S.N</th>
                                    <th>District Name</th>
                                    <th>Shipping Charge</th>
                                    <th>Action</th>
                               </tr>
                               @foreach($districts as $key => $dis)
                                 <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $dis->district }}</td>
                                    <td>{{ $dis->shipping_charge }}</td>
                                    <td><a class="badge badge-primary" href="{{ route('shipping.edit',$dis->id)}}">Edit</a></td>
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
