@extends('back.layouts.app')
@section('title','Create Size')
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
                                <h3 class="page-title mr-sm-auto"> Create Product Size </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('size.index') }}" class="btn btn-primary">Size List</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                                <form action="{{ Route('size.store') }}" method="POST">
                                    @csrf
                                    @include('back.layouts.message')
                                    <div class="form-group">
                                        <label for="title"> Title <span style="color:red;">*</span></label>
                                        <input type="text" name="title" placeholder="Enter Size Title" class="form-control" required>
                                   </div>
                                   <div class="form-group">
                                       <label for="title"> Short Code <span style="color:red;">*</span></label>
                                       <input type="text" name="shortcode" placeholder="Enter Size Short Code" class="form-control" required>
                                  </div>

                                  <!-- <div class="form-group">
                                       <label for="title"> Extra Price <span style="color:red;">*</span></label>
                                       <input type="text" name="price" placeholder="Enter Extra Price (if it rquire)" class="form-control" value="0">
                                  </div> -->
                                  <div class="form-group">
                                       <label for="color"> Parent Color <span style="color:red;">*</span></label>
                                       <select name="color_id" class="form-control" required>
                                           <option value="">==== Selct Color ====</option>
                                           @foreach(\App\color::all() as $color)
                                            <option value="{{ $color->id }}">{{$color->name}} ({{ $color->shortcode }})</option>
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
