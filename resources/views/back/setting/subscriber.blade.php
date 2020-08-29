@extends('back.layouts.app')
@section('title','Subscriber List')
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
                                <h3 class="page-title mr-sm-auto"> List Of Subscribers  </h3><!-- .btn-toolbar -->
                                
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            @include('back.layouts.message')
                           <table class="table table-bordered ">
                               <tr>
                                    <th>S.N</th>
                                    <th>Email Address</th>
                               </tr>
                                 @foreach ($subs as $key => $s)
                                  <tr>
                                      <td>{{ $key+1 }}</td>
                                      <td>{{ $s->email }}</td>
                                  </tr>
                                 @endforeach
                           </table>

                        </div><!-- /.card-body -->
                        <div class="d-flex justify-content-center">
                            {{ $subs->links() }}
                        </div>
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
