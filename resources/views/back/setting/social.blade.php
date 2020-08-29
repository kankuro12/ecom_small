@extends('back.layouts.app')
@section('title','Social Media')
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
                                        <h3 class="page-title mr-sm-auto"> Social Media </h3><!-- .btn-toolbar -->
                                        <div class="dt-buttons btn-group">
                                        </div><!-- /.btn-toolbar -->
                                    </div>
                                </div><!-- /.card-header -->
                                <!-- .card-body -->
                                <div class="card-body">
                                        <form action="{{ url('dashboard/social-media') }}" method="POST">
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
                                                 <label for="face"> Facebook Url <span style="color:red;">*</span></label>
                                                 <input type="text" value="{{ $social->facebook }}" name="facebook" placeholder="Enter facebook url" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="twitter"> Twitter Url <span style="color:red;">*</span></label>
                                                <input type="text" name="twiter" value="{{ $social->twiter }}" placeholder="Enter twitter url" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="insta"> Instagram Url <span style="color:red;">*</span></label>
                                                <input type="text" name="instagram" value="{{ $social->instagram }}" placeholder="Enter instagram url" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="youtube"> Twitter Url <span style="color:red;">*</span></label>
                                                <input type="text" name="youtube" value="{{ $social->youtube }}" placeholder="Enter youtube url" class="form-control" required>
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
