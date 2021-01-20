@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Data:</strong> not save <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row align-items-center justify-content-center h-100">
        <div class="col-12">
            <div class="card mt-md-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col text-lg text-left">Create Product</div>
                        <div class="col text-right">
                        <a href="/product" class="btn btn-sm btn-dark">
                            <i class="fa fa-backspace"></i> Back  
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="#">Product</label>
                        <input type="text" name="product_title" class="form-control"
                            placeholder="Product Name">
                    </div>
                    <div class="form-group">
                        <label for="#">Category</label>
                        <select class="form-control select2" name ="category_id" id="category_id" width="100%">
                            <!-- <option disabled value>Select Category</option> -->
                            <option> -- Select Category -- </option>
                            @foreach($category as $item)
                                <option value="{{$item->id}}">{{$item->name_categories}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="#">Price</label>
                        <input type="text" name="product_price" class="form-control"
                            placeholder="Product Price">
                    </div>
                    <div class="form-group">
                        <label for="#">Image</label>
                        <input type="text" name="product_image" class="form-control"
                            placeholder="Gambar Product">
                    </div>
                    <!-- <div class="form-group">
                        <label for="#">Image</label>
                        <input type="file" name="file" class="form-control"
                            placeholder="Gambar Product">
                    </div> -->
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>                    
            </div>
            </div>
        </div>
    </div>
@endsection