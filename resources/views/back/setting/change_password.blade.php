@extends('back.layouts.app')
@section('title','Change Password')
@section('content')

<main class="app-main">
        <!-- .wrapper -->
        <div class="wrapper">
          <!-- .page -->
          <div class="page">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="page-inner">
                        <div class="card card-fluid" style="margin-top:1rem;">
                                <!-- .card-header -->
                                <div class="card-header">
                                    <div class="d-md-flex align-items-md-start">
                                        <h3 class="page-title mr-sm-auto"> Change Password </h3><!-- .btn-toolbar -->
                                        <div class="dt-buttons btn-group">
                                        </div><!-- /.btn-toolbar -->
                                    </div>
                                </div><!-- /.card-header -->
                                <!-- .card-body -->
                                <div class="card-body">
                                        <form action="{{ url('dashboard/change-password') }}" method="POST">
                                            @csrf
                                            @include('back.layouts.message')
                                            @if ($errors->any())
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
                                            @endif
                                            <div class="form-group">
                                                 <label for="title"> Email <span style="color:red;">*</span></label>
                                                 <input type="text" value="{{ $user->email }}" disabled class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="old-pass"> Current Password <span style="color:red;">*</span></label>
                                                <input type="password" name="current_password" placeholder="Enter current passwrod" autocomplete="false" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="new"> New Password <span style="color:red;">*</span></label>
                                                <input id="password" type="password" class="form-control" placeholder="Enter new password" name="new_password" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="confirm"> Confirm Password <span style="color:red;">*</span></label>
                                                <input id="password-confirm" type="password" class="form-control" name="new_password_confirmation" placeholder="Confirm new password" required autocomplete="new-password">
                                            </div>
                                            <hr>
                                            <button type="submit" class="btn btn-primary btn-block">Save Item</button>
                                        </form>
                                </div><!-- /.card-body -->
                            </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
              </div>
            <!-- .page-inner -->
          </div>
        </div>
</main>

@endsection
