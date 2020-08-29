@extends('back.layouts.app')
@section('title','Edit Store')
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
                                <h3 class="page-title mr-sm-auto"> Edit Store </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('store.index') }}" class="btn btn-primary">Store List</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                                <form action="{{ Route('store.update',$store->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    @include('back.layouts.message')

                                    <div class="form-group">
                                         <label > Title <span style="color:red;">*</span></label>
                                         <input type="text" name="name" value="{{ $store->name }}" placeholder="Enter Store Title" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                         <label > Address <span style="color:red;">*</span></label>
                                         <input type="text" name="address" value="{{ $store->address }}" placeholder="Enter Store Address" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                         <label > Telephone <span style="color:red;">*</span></label>
                                         <input type="text" name="Phone" value="{{ $store->phone }}" placeholder="Enter Store Phone" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                         <label > Opening Hour <span style="color:red;">*</span></label>
                                         <input type="text" name="opening" value="{{ $store->opening }}" placeholder="Enter Store Opening Hour" class="form-control" required>
                                    </div>

                                    <div class="form-group " style="border: 1px #bbb solid; padding-bottom:5px;" >
                                        <p >Image</p>
                                        <img src="{{ asset('back/images/store/'.$store->image) }}" style="height: 200px;" id="photo"/>
                                        <input type="file" name="image" class="form-control"  onchange="readURL(this);" >
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
@section('scripts')
<script type="text/javascript">
    function readURL(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();

             reader.onload = function (e) {
                 $('#photo')
                     .attr('src', e.target.result);
             };

             reader.readAsDataURL(input.files[0]);
         }
     }
</script>
@endsection
