@extends('back.layouts.app')
@section('title','Manage Stock')
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
                                <h3 class="page-title mr-sm-auto"> Manage Product Stock </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('product.index') }}" class="btn btn-primary">Product List</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @include('back.layouts.message')
                                    @if ($errors->any())
                                       <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Error has been occurred !</strong>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    @php
                                        // simple type product stock
                                        $stockOfSimpleProductCount = \App\Simplestock::where('product_id',$product->id)->count();
                                        $stockOfSimpleProduct = \App\Simplestock::where('product_id',$product->id)->first();
                                    @endphp
                                <form action="" method="POST">
                                    @csrf
                                    @if ($product->type == 1)
                                        <div class="row" >
                                        @foreach(\App\Color::all() as $color)
                                            <div class="col-md-6">
                                                <h6> Color :- <strong>{{ $color->name }} ({{ $color->shortcode }})</strong></h6>
                                                <hr>

                                                @foreach($color->size as $item)
                                                    @php
                                                        $stockOfVariableProductCount = \App\Stock::where(['product_id' => $product->id, 'color_id' => $item->color->id, 'size_id' => $item->id])->count();
                                                        $stockOfVariableProduct = \App\Stock::where(['product_id' => $product->id, 'color_id' => $item->color->id, 'size_id' => $item->id])->first();
                                                    @endphp
                                                    <div class="row">
                                                        <div class="col-md-4 text-right">
                                                        <input type="hidden" value="{{ $item->color->id }}" name="color_id[]">
                                                        <input type="hidden" value="{{ $item->id }}" name="size_id[]">
                                                        <strong> {{ $item->name }} ({{ $item->shortcode }})</strong>
                                                        </div>
                                                        
                                                        <div class="col-md-8">
                                                            @if($stockOfVariableProductCount>0)
                                                               <input type="number" min="0" value="{{ $stockOfVariableProduct->total }}"  class="form-control" name="total[]" placeholder="Enter stock keeping unit" style="width:200px;">
                                                            @else
                                                                <input type="number" min="0" value="0"  class="form-control" name="total[]" placeholder="Enter stock keeping unit" style="width:200px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <br>
                                                @endforeach
                                            </div>
                                        @endforeach
                                        </div>
                                    @else
                                    <div class="form-group">
                                        <label for="stock">Total</label>
                                        @if($stockOfSimpleProductCount>0)
                                           <input type="number" class="form-control" name="s_total" value="{{ $stockOfSimpleProduct->total }}">
                                        @else
                                            <input type="number" class="form-control" name="s_total" placeholder="Enter Total Number OF Product">
                                        @endif
                                    </div>
                                    @endif
                                    <hr>
                                    <button type="submit" class="btn btn-primary btn-block" >Save Item</button>
                                </form>
                        </div><!-- /.card-body -->
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection

@section('scripts')

@endsection
