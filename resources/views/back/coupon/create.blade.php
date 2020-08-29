@extends('back.layouts.app')
@section('title','Create Coupon')
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
                                <h3 class="page-title mr-sm-auto"> Create New Coupon  </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('coupon.index') }}" class="btn btn-primary">Coupon List</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                                <form action="{{ Route('coupon.store') }}" method="POST">
                                    @csrf
                                    @include('back.layouts.message')
                                    {{-- @if ($errors->any())
                                       <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Error has been occurred !</strong>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif --}}
                                    <div class="form-group">
                                         <label for="title"> Coupon Code <span style="color:red;">*</span></label>
                                         <input type="text" name="coupon_code" placeholder="Enter Coupon Code" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                         <label for="amt"> Coupon Appliable Min. Amount <span style="color:red;">*</span></label>
                                         <input type="text" min="0" name="applicable_amount" placeholder="Enter Coupon appliable amount" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="title"> Coupon Amount <span style="color:red;">*</span></label>
                                        <input type="number" min="0" name="amount" placeholder="Enter Amount (it may be fixed amount or in percentage)" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="title"> Amount Type <span style="color:red;">*</span></label>
                                        <select name="amount_type" class="form-control" required>
                                            <option value="">==== Select Amount Type ====</option>
                                            <option value="1">Fixed</option>
                                            <option value="2">Precentage</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title"> Expiry Date <span style="color:red;">*</span></label>
                                        <input id="flatpickr01" type="text" class="form-control flatpickr-input" name="expiry_date" data-toggle="flatpickr" readonly="readonly">
                                    </div>
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>Coupon Status</span> <!-- .switcher-control -->
                                        <label class="switcher-control switcher-control-lg"><input type="checkbox" name="status" class="switcher-input" checked=""> <span class="switcher-indicator"></span> <span class="switcher-label-on">ON</span> <span class="switcher-label-off">OFF</span></label> <!-- /.switcher-control -->
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
