@extends('back.layouts.app')
@section('title','Banner List')
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
                                <h3 class="page-title mr-sm-auto"> List Of Banner </h3><!-- .btn-toolbar -->
                                
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            @include('back.layouts.message')
                            <table class="table table-bordered ">
                                <tr>
                                     <th>Banner Title</th>
                                     <th colspan="2">Action</th>
                                </tr>
                                @foreach(\App\Banner::all() as $b)
                                 <tr>
                                     <td>{{ $b->name }}</td>
                                     <td><a href="{{ url('dashboard/banner/edit/'.$b->id) }}" class="badge badge-primary">Edit</a></td>
                                 </tr>
                                @endforeach
                            </table>
                        </div><!-- /.card-body -->
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
