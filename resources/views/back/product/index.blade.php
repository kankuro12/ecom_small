@extends('back.layouts.app')
@section('title','Products')
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
                                <h3 class="page-title mr-sm-auto"> List Products </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('product.create') }}" class="btn btn-primary">Create New Product</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            @include('back.layouts.message')
                           <table class="table table-bordered ">
                               <tr>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Sales Price</th>
                                    <th>Product Type</th>
                                    <th colspan="3">Action</th>
                               </tr>
                               @foreach ($products as $attr)
                                   <tr>
                                       <td><img src="{{ asset('back/images/product/'.$attr->feature_image) }}" height="100" alt="NO Image Available"></td>
                                       <td><a href="{{ route('product.show',$attr->id) }}"> {{ $attr->name }} </a></td>
                                       <td> {{ $attr->sales_price }}</td>
                                       <td>
                                           @if ($attr->type==1)
                                                Variable
                                            @else
                                                Simple
                                           @endif
                                       </td>
                                       <td width="50px">
                                           <a href="{{ route('product.edit',$attr->id) }}" class="badge badge-primary">Edit</a>
                                       </td>
                                       
                                       <td>
                                         <a href="{{ route('manage.stock',$attr->id) }}" class="badge badge-warning">Manage Stock</a><br>
                                         
                                       </td>
                                       <td>
                                           <form action="{{ route('product.destroy',$attr->id) }}" method="POST">
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
                            {{ $products->links() }}
                        </div>
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
