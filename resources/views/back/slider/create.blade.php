@extends('back.layouts.app')
@section('title','Create Slider')
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
                                <h3 class="page-title mr-sm-auto"> Create Slider </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('slider.index') }}" class="btn btn-primary">Slider List</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                                <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @include('back.layouts.message')
                                    <div class="form-group">
                                        <label for="sub_title"> Top Title <span style="color:red;">*</span></label>
                                        <input type="text" name="sub_title" placeholder="Enter Top Title" class="form-control" required>
                                   </div>
                                   <div class="form-group">
                                       <label for="title"> Title <span style="color:red;">*</span></label>
                                       <input type="text" name="title" placeholder="Enter Title" class="form-control" required>
                                   </div>

                                  <div class="form-group">
                                       <label for="price_section"> Extra Info <span style="color:red;">*</span></label>
                                       <textarea name="price_section" rows="5" class="form-control" required></textarea>
                                  </div>
                                   <div class="form-group">
                                       <label for="button"> Button Name <span style="color:red;">*</span></label>
                                       <input type="text" name="button_name" placeholder="Enter Button Name" class="form-control" required>
                                   </div>
                                   <div class="form-group">
                                       <label for="link"> Link (Optional) </label>
                                       <input type="text" name="link" placeholder="Enter link" class="form-control" >
                                   </div>
                                   <div class="form-group text-center " style="border: 1px #bbb solid; padding-bottom:5px;" >
                                        <p >Image</p>
                                        <img src="" style="height: 200px;" id="photo"/>
                                        <input type="file" name="image" class="form-control"  onchange="readURL(this);" required>
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