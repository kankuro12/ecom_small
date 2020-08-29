@extends('back.layouts.app')
@section('title','Customer Message')
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
                                <h3 class="page-title mr-sm-auto"> List Of Customer Unseen Messages  </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <!-- <a href="" class="btn btn-primary">Create New Coupon</a> -->
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            @include('back.layouts.message')
                           <table class="table table-bordered ">
                               <tr>
                                    <th>Customer Name </th>
                                    <th>Address</th>
                                    <th>Telephone</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Status</th>
                               </tr>
                                 @foreach (\App\Message::where('status',0)->latest()->get() as $sms)
                                  <tr>
                                      <td>{{ $sms->user->name }}</td>
                                      <td>{{ $sms->user->address }}</td>
                                      <td>{{ $sms->user->phone }}</td>
                                      <td>{{ $sms->subject }}</td>
                                      <td>{{ $sms->message }}</td>
                                      
                                     
                                      <td>
                                          <a href="{{ url('dashboard/seen-message/'.$sms->id) }}" class="badge badge-warning">Unseen</a>
                                      </td>
                                  </tr>
                                 @endforeach
                           </table>

                        </div><!-- /.card-body -->
                        <div class="d-flex justify-content-center">
                            
                        </div>
                </div>
                <div class="card card-fluid" style="margin-top:1rem;">
                        <!-- .card-header -->
                        <div class="card-header">
                            <div class="d-md-flex align-items-md-start">
                                <h3 class="page-title mr-sm-auto"> List Of Customer Seen Messages  </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <!-- <a href="" class="btn btn-primary">Create New Coupon</a> -->
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                           <table class="table table-bordered ">
                               <tr>
                                   <th>S.N</th>
                                    <th>Customer Name </th>
                                    <th>Address</th>
                                    <th>Telephone</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Status</th>
                               </tr>
                                @php
                                    $messages = \App\Message::latest()->where('status',1)->paginate(10);
                                @endphp
                                 @foreach ($messages as $k => $sms)
                                  <tr>
                                      <td>{{ $k+1 }}</td>
                                      <td>{{ $sms->user->name }}</td>
                                      <td>{{ $sms->user->address }}</td>
                                      <td>{{ $sms->user->phone }}</td>
                                      <td>{{ $sms->subject }}</td>
                                      <td>{{ $sms->message }}</td>
                                      <td>
                                          <span class="badge badge-primary">Seen</span>
                                      </td>
                                  </tr>
                                 @endforeach
                           </table>

                        </div><!-- /.card-body -->
                        <div class="d-flex justify-content-center">
                            {{ $messages->links() }}
                        </div>
                </div>
            </div>
          </div>
        </div>
</main>

@endsection
