@extends('back.layouts.app')
@section('title','Sliders')
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
                                <h3 class="page-title mr-sm-auto"> List Of Slider </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('slider.create') }}" class="btn btn-primary">Create New </a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            @include('back.layouts.message')
                           <table class="table table-bordered ">
                               <tr>
                                    <th>Title</th>
                                    <th colspan="2">Action</th>
                               </tr>
                               @foreach (\App\Slider::all() as $attr)
                                  <tr>
                                      <td>{{ $attr->sub_title }}</td>
                                      <td width="50px">
                                          <a href="{{ route('slider.edit',$attr->id) }}" class="badge badge-primary">Edit</a>
                                      </td>
                                      <td>
                                          <form action="{{ route('slider.destroy',$attr->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="badge badge-danger" onclick="return confirm('Are You Sure?');">Delete</button>
                                          </form>
                                      </td>
                                  </tr>
                                 @endforeach
                           </table>

                        </div><!-- /.card-body -->
                        <div class="d-flex justify-content-center">
                        </div>
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
