@extends('back.layouts.app')
@section('title','Create Product Color')
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
                                <h3 class="page-title mr-sm-auto"> Create Product Color  </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('color.index') }}" class="btn btn-primary">Color List</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                                <form action="{{ Route('color.store') }}" method="POST">
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
                                         <label for="title"> Title <span style="color:red;">*</span></label>
                                         <input type="text" name="title" placeholder="Enter Color Title" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="title"> Short Code <span style="color:red;">*</span></label>
                                        <input type="text" name="shortcode" placeholder="Enter Color Short Code" class="form-control" required>
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
