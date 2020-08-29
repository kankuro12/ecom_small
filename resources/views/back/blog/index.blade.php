@extends('back.layouts.app')
@section('title','Blogs')
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
                                <h3 class="page-title mr-sm-auto"> List Of Blogs  </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('blog.create') }}" class="btn btn-primary">Create New Blog</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            @include('back.layouts.message')
                           <table class="table table-bordered ">
                               <tr>
                                    <th>Title</th>
                                    <th>Publisher</th>
                                    <th>Publish date</th>
                                    <th colspan="2">Action</th>
                               </tr>
                                 @foreach ($blogs as $attr)
                                  <tr>
                                      <td>{{ $attr->title }}</td>
                                      <td>{{ $attr->post_by }}</td>
                                      <td>{{ $attr->publish }}</td>
                                      <td width="50px">
                                          <a href="{{ route('blog.edit',$attr->id) }}" class="badge badge-primary">Edit</a>
                                      </td>
                                      <td>
                                          <form action="{{ route('blog.destroy',$attr->id) }}" method="POST">
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
                            {{ $blogs->links() }}
                        </div>
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
