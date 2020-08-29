@extends('back.layouts.app')
@section('title','Edit Banner')
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
                                <h3 class="page-title mr-sm-auto"> Edit Banner </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ url('dashboard/banners') }}" class="btn btn-primary">Banner List</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                                <form action="{{ url('dashboard/banner/edit/'.$banner->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @include('back.layouts.message')

                                    <div class="form-group">
                                         <label for="title"> Sub Title <span style="color:red;">*</span></label>
                                         <input type="text" name="sub_title" value="{{ $banner->sub_title }}" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                         <label for="title"> Title <span style="color:red;">*</span></label>
                                         <input type="text" name="title" value="{{ $banner->title }}"  class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                         <label for="title"> Button Name <span style="color:red;">*</span></label>
                                         <input type="text" name="button_name" value="{{ $banner->button_name }}"  class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                         <label for="title"> Custome Link (Optional)</label>
                                         <input type="text" name="link" value="{{ $banner->link }}"  class="form-control" >
                                    </div>

                                    <div class="form-group text-center " style="border: 1px #bbb solid; padding-bottom:5px;" >
                                        <p >Image</p>
                                        <img src="{{ asset('back/images/banner/'.$banner->image)}}" style="height: 200px;" id="photo"/>
                                        <input type="file" name="image" class="form-control"  onchange="readURL(this);">
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
