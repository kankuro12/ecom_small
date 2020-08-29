@extends('back.layouts.app')
@section('title','Create Blog')
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
                                <h3 class="page-title mr-sm-auto"> Create New Blog  </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('blog.index') }}" class="btn btn-primary">BLog List</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                                <form action="{{ Route('blog.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @include('back.layouts.message')
                                    
                                    <div class="form-group">
                                         <label> Blog Title <span style="color:red;">*</span></label>
                                         <input type="text" name="title" placeholder="Enter blog title " class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                         <label> Publisher <span style="color:red;">*</span></label>
                                         <input type="text" name="post_by" placeholder="Enter name of publisher " class="form-control" required>
                                    </div>
                                
                                    <div class="form-group">
                                        <label> Publish Date <span style="color:red;">*</span></label>
                                        <input id="flatpickr01" type="text" class="form-control flatpickr-input" name="publish" data-toggle="flatpickr" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                         <label> Blog Tags <span style="color:red;">*</span></label>
                                         <input type="text" name="tag" placeholder="Enter blog tag separated by(,) " class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                         <label> Blog Detail <span style="color:red;">*</span></label>
                                         <textarea name="desc" rows="10" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group" style="border: 1px #bbb solid; padding-bottom:5px;" >
                                        <p >Image</p>
                                        <img src="" style="height: 200px;" id="photo"/>
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