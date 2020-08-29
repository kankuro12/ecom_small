@extends('back.layouts.app')
@section('title','Coupon List')
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
                                <h3 class="page-title mr-sm-auto"> List Of Coupon  </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('coupon.create') }}" class="btn btn-primary">Create New Coupon</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            @include('back.layouts.message')
                           <table class="table table-bordered ">
                               <tr>
                                    <th>Coupon Code</th>
                                    <th>Min. Spend Amount</th>
                                    <th>Coupon Amount</th>
                                    <th>Amount Type</th>
                                    <th>Expiry Date</th>
                                    <th>Status</th>
                                    <th colspan="2">Action</th>
                               </tr>
                                 @foreach ($coupons as $attr)
                                  <tr>
                                      <td>{{ $attr->coupon_code }}</td>
                                      <td>{{ $attr->applicable_amount }}</td>
                                      <td>{{ $attr->amount }}</td>
                                      <td>
                                          @if ($attr->amount_type == 1)
                                              Fixed
                                          @else
                                              Percentage
                                          @endif
                                      </td>
                                      <td>{{ $attr->expiry_date }}</td>
                                      <td><span class="badge {{ $attr->status ? 'badge-primary' : 'badge-danger' }}">{{ $attr->status?'Active' : 'Inactive' }}</span></td>
                                      <td width="50px">
                                          <a href="{{ route('coupon.edit',$attr->id) }}" class="badge badge-primary">Edit</a>
                                      </td>
                                      <td>
                                          <form action="{{ route('coupon.destroy',$attr->id) }}" method="POST">
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
                            {{ $coupons->links() }}
                        </div>
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
