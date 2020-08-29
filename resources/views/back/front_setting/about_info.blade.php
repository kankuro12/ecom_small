@extends('back.layouts.app')
@section('title','Abount Info')
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
                                <h3 class="page-title mr-sm-auto"> Abount Info </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                                <form action="{{ url('dashboard/about-info')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @include('back.layouts.message')

                                    <div class="form-group">
                                         <label for="title"> Detail <span style="color:red;">*</span></label>
                                         <textarea name="detail" rows="10" class="form-control" required>{{ $info->detail }}</textarea>
                                    </div>
                                    <div class="form-group " style="border: 1px #bbb solid; padding-bottom:5px;" >
                                        <p >Signature</p>
                                        <img src="{{ asset('front/images/info/'.$info->signature) }}" style="height: 80px;" id="photo" required/>
                                        <input type="file" name="signature" class="form-control"  onchange="readURL(this);">
                                    </div>
                                    <div class="form-group " style="border: 1px #bbb solid; padding-bottom:5px;" >
                                        <p >Image</p>
                                        <img src="{{ asset('front/images/info/'.$info->image) }}" style="height: 150px;" id="photo_1" required/>
                                        <input type="file" name="image" class="form-control"  onchange="readURL(this);">
                                    </div>

                                    <hr>
                                    <button type="submit" class="btn btn-primary btn-block">Update Item</button>
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
     function readURL(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();

             reader.onload = function (e) {
                 $('#photo_1')
                     .attr('src', e.target.result);
             };

             reader.readAsDataURL(input.files[0]);
         }
     }
</script>
@endsection
