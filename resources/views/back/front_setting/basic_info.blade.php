@extends('back.layouts.app')
@section('title','Basic Info')
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
                                <h3 class="page-title mr-sm-auto"> Basic Info </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                                <form action="{{ url('dashboard/basic-info')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @include('back.layouts.message')
                                    <div class="form-group " style="border: 1px #bbb solid; padding-bottom:5px;" >
                                        <p >Ecommerce Lolo</p>
                                        <img src="{{ asset('front/images/info/'.$info->logo) }}" style="height: 50px;" id="photo" required/>
                                        <input type="file" name="logo" class="form-control"  onchange="readURL(this);">
                                    </div>

                                    <div class="form-group">
                                         <label for="title"> Short Detail <span style="color:red;">*</span></label>
                                         <textarea name="short_detail" rows="5" class="form-control" required>{{ $info->short_detail }}</textarea>
                                    </div>
                                    <div class="form-group">
                                         <label > Address <span style="color:red;">*</span></label>
                                         <input type="text" name="address" class="form-control" value="{{ $info->address }}" required>
                                    </div>

                                    <div class="form-group">
                                         <label > Telephone <span style="color:red;">*</span></label>
                                         <input type="text" name="phone" class="form-control" value="{{ $info->phone }}" required>
                                    </div>

                                    <div class="form-group">
                                         <label > Email <span style="color:red;">*</span></label>
                                         <input type="text" name="email" class="form-control" value="{{ $info->email }}" required>
                                    </div>

                                    <div class="form-group">
                                         <label > Navbar Right Quote <span style="color:red;">*</span></label>
                                         <input type="text" name="clearance" class="form-control" value="{{ $info->clearance }}" required>
                                    </div>

                                    <div class="form-group">
                                         <label > Home Top Product Title <span style="color:red;">*</span></label>
                                         <input type="text" name="product_top" class="form-control" value="{{ $info->product_top }}" required>
                                    </div>

                                    <div class="form-group">
                                         <label > Home Bottom Product Title <span style="color:red;">*</span></label>
                                         <input type="text" name="product_bottom" class="form-control" value="{{ $info->product_bottom }}" required>
                                    </div>

                                    <div class="form-group">
                                         <label > Copy Rights Quotes<span style="color:red;">*</span></label>
                                         <input type="text" name="copyrights" class="form-control" value="{{ $info->copyrights }}" required>
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
