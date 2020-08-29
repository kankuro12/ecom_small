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
                                <form action="{{ Route('maincat.store') }}" method="POST">
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
                                         <label for="title"> Category Title <span style="color:red;">*</span></label>
                                         <input type="text" name="title" placeholder="Enter Category Title" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="title"> Parent Category </label>
                                        <select name="parent_id" class="form-control">
                                            <option value="0">==== Select Parent Category ====</option>
                                             @foreach ($cats as $item)
                                                 <option value="{{ $item->id }}">{{ $item->getName() }}</option>
                                             @endforeach
                                        </select>
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
