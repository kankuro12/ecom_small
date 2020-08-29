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
                                        $stockOfSimpleProductCount = \App\Stock::where('product_id',$product->id)->count();
                                        $stockOfSimpleProduct = \App\Stock::where('product_id',$product->id)->first();
                                    @endphp
                                <form action="" method="POST">
                                    @csrf
                                    @if ($product->type == 1)
                                    <h5 class="text-danger mb-5"> Product Stock Based On Size</h5>
                                    <div class="row mb-4">
                                        @foreach ($product->sizes as $item)
                                          @php
                                               // variable type product stock BY size
                                                $stockBySizeCount = \App\Stock::where('product_id',$product->id)->where('size_id',$item->id)->count();
                                                $stockBySize = \App\Stock::where('product_id',$product->id)->where('size_id',$item->id)->get();
                                          @endphp
                                            {{-- <input type="hidden" name="product_id" value="{{ $product->id }}"> --}}
                                            <div class="col-md-2 text-center" >
                                                <h6 style="margin-top:2.3rem;">{{ $item->name }} ({{ $item->shortcode }}) :</h6>
                                                <input type="hidden" name="size_id[]" value="{{ $item->id }}">
                                            </div>
                                            <div class="col-md-2 mb-4" >
                                                <label for="size-stock">Total</label>
                                                @if ($stockBySizeCount>0)
                                                    @foreach ($stockBySize as $s)
                                                       <input type="number" class="form-control" value="{{ $s->total }}" name="sizetotal[]">
                                                    @endforeach
                                                @else
                                                    <input type="number" class="form-control" value="0" name="sizetotal[]">
                                                @endif
                                            </div>
                                            @endforeach
                                    </div>
                                    <hr>
                                    <h5 class="text-danger mb-5"> Product Stock Based On Color</h5>
                                    <div class="row mb-4">
                                        @foreach ($product->colors as $item)
                                            @php
                                                // variable type product stock BY color
                                                $stockByColorCount = \App\Stockbycolor::where('product_id',$product->id)->where('color_id',$item->id)->count();
                                                $stockByColor = \App\Stockbycolor::where('product_id',$product->id)->where('color_id',$item->id)->get();
                                            @endphp
                                            <div class="col-md-2 text-center" >
                                                <h6 style="margin-top:2.3rem;">{{ $item->name }} ({{ $item->shortcode }}) :</h6>
                                                <input type="hidden" name="color_id[]" value="{{ $item->id }}">
                                            </div>
                                            <div class="col-md-2 mb">
                                                <label for="size-stock">Total</label>
                                                @if ($stockByColorCount>0)
                                                    @foreach ($stockByColor as $c)
                                                       <input type="number" class="form-control" value="{{ $c->total }}" name="colortotal[]">
                                                    @endforeach
                                                @else
                                                    <input type="number" class="form-control" value="0" name="colortotal[]">
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                    @else
                                    <div class="form-group">
                                        <label for="stock">Total</label>
                                        @if($stockOfSimpleProductCount>0)
                                           <input type="number" class="form-control" name="total" value="{{ $stockOfSimpleProduct->total }}">
                                        @else
                                            <input type="number" class="form-control" name="total" placeholder="Enter Total Number OF Product">
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
