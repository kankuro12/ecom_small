@extends('back.layouts.app')
@section('title','Edit Product')
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
                                <h3 class="page-title mr-sm-auto"> Edit Product </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('product.index') }}" class="btn btn-primary">Product List</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                                <form action="{{ Route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title"> Select Product Type <span style="color:red;">*</span></label>
                                                <select name="type" class="form-control" onchange="
                                                if(this.value==0){
                                                   $('#attrSection').hide();
                                                }else{
                                                    $('#attrSection').show();
                                                }
                                                " required>
                                                    <option value="">==== Select Product Type ====</option>
                                                    <option value="0" >Simple</option>
                                                    <option value="1" >Variable</option>
                                                </select>
                                           </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                 <label for="title"> Product Name <span style="color:red;">*</span></label>
                                                 <input type="text" value="{{ old('name',$product->name)}}" name="title" placeholder="Enter Product Name" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="title"> Short Detail <span style="color:red;">*</span></label>
                                        <textarea name="short_detail" rows="3" class="form-control" placeholder="Enter Short Detail About Product">{{ old('short_detail',$product->short_detail)}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Detail <span style="color:red;">*</span></label>
                                        <textarea name="detail" rows="6" class="form-control" placeholder="Enter Full Detail About Product">{{ old('detail',$product->detail)}}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="category"> Select Category <span style="color:red;">*</span></label>
                                                <select name="category_id" class="form-control" {{ old('category_id')}}>
                                                    <option value="">==== Select Product Category ====</option>
                                                    @foreach ($cats as $item)
                                                        <option value="{{ $item->id }}" {{ $product->category_id == $item->id ? 'selected' : '' }}>{{ $item->getName() }}</option>
                                                    @endforeach
                                                </select>
                                           </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="brand"> Select Brand <span style="color:red;">*</span></label>
                                                <select name="brand_id" class="form-control" {{ old('brand_id')}}>
                                                    <option value="">==== Select Product Brand ====</option>
                                                    @foreach ($brands as $item)
                                                        <option value="{{ $item->id }}" {{ $item->id == $product->brand_id ? 'selected' : '' }}> {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                           </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="price"> Product Price <span style="color:red;">*</span></label>
                                                <input type="number" value="{{ old('price',$product->price)}}"  name="price" placeholder="Enter Product Price" class="form-control" required>
                                           </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="sales_price"> Product Sale Price <span style="color:red;">*</span></label>
                                                <input type="number" value="{{ old('sales_price',$product->sales_price) }}"  name="sales_price" placeholder="Enter Product Sales Price" class="form-control" required>
                                           </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="code"> Product Code <span style="color:red;">*</span></label>
                                                <input type="text" value="{{ old('code',$product->code)}}"  name="code" placeholder="Enter Product Code" class="form-control" required>
                                           </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tag"> Product Tags <span style="color:red;">*</span></label>
                                        <input type="text" value="{{ old('tag',$product->tag) }}"  name="tag" placeholder="Enter Product Tags Separated by (,)" class="form-control" required>
                                   </div>
                                   <hr>
                                   <div style="border:1px #30619F solid; padding:1rem;" id="attrSection">
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
                                    </div>
                                    <div class="text-center">
                                        <hr>
                                        <div class="form-group">
                                            <img src="{{ asset('back/images/product/'.$product->feature_image) }}" id="photo" style="border:1.5px #30619F solid; padding:10px; height:450px; margin-bottom:12px;">
                                            <div class="custom-file">
                                                <input type="file" name="feature_image" class="custom-file-input" onchange="readURL(this);">
                                                <label class="custom-file-label" >Choose Product Feature Image</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Product Sales Options <span style="color:red;">*</span></label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                                    <span>Product On Sale</span>
                                                    <label class="switcher-control switcher-control-lg"><input type="checkbox" class="switcher-input" value='1' name="onsale" {{ $product->onsale ? 'checked' : ''}}> <span class="switcher-indicator"></span> <span class="switcher-label-on">ON</span> <span class="switcher-label-off">OFF</span></label>
                                                </div>
                                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                                    <span>Product Promo Item</span>
                                                    <label class="switcher-control switcher-control-lg"><input type="checkbox" class="switcher-input" value='1' name="promo" {{ $product->promo ? 'checked' : ''}}> <span class="switcher-indicator"></span> <span class="switcher-label-on">ON</span> <span class="switcher-label-off">OFF</span></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
   $('#attrSection').hide();

</script>
@endsection
