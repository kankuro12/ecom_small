@extends('back.layouts.app')
@section('title','Edit Shipping Charge')
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
                                <h3 class="page-title mr-sm-auto"> Edit Shipping Charge </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('shipping.index') }}" class="btn btn-primary">District List</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                                <form action="{{ Route('shipping.update',$district->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    @include('back.layouts.message')
                                    <div class="form-group">
                                         <label for="title"> District Name <span style="color:red;">*</span></label>
                                         <input type="text" value="{{ $district->district }}" disabled class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="title"> Shipping Charge <span style="color:red;">*</span></label>
                                        <input type="number" name="shipping_charge" value="{{ $district->shipping_charge }}" placeholder="Enter shipping charge" min="0" class="form-control" required>
                                   </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary btn-block">Save Item</button>
                                </form>
                        </div><!-- /.card-body -->
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
