@extends('back.layouts.app')
@section('title','Create Main Categories')
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
                                <h3 class="page-title mr-sm-auto"> Create Main Product Category </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('maincat.index') }}" class="btn btn-primary">Categories List</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                                <form action="{{ Route('maincat.update',$cat->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    @include('back.layouts.message')

                                    <div class="form-group">
                                         <label for="title"> Title <span style="color:red;">*</span></label>
                                         <input type="text" name="title" value="{{ $cat->name }}" placeholder="Enter Category Title" class="form-control" required>
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
