@extends('back.layouts.app')
@section('title','Popup Info')
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
                                <h3 class="page-title mr-sm-auto"> Popup Info </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                                <form action="{{ url('dashboard/popup-info')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @include('back.layouts.message')

                                    <div class="form-group">
                                         <label for="title"> Title <span style="color:red;">*</span></label>
                                         <input type="text" name="title" value="{{ $pop->title }}" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                         <label for="title"> Short Detail <span style="color:red;">*</span></label>
                                         <input type="text" name="short_detail" value="{{ $pop->short_detail }}" class="form-control" required>
                                    </div>
                                    
                                    <div class="form-group " style="border: 1px #bbb solid; padding-bottom:5px;" >
                                        <p >Image (size : 395 x 420px)</p>
                                        <img src="{{ asset('front/images/info/'.$pop->image) }}" style="height: 150px;" id="photo" required/>
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
     
</script>
@endsection
