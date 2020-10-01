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
                    <div class="col text-eft">Product</div>
                    <div class="col text-right">
                    <a href="/product" class="btn btn-xs btn-dark">
                        <i class="fa fa-backspace"></i> Back  
                    </a>
                </div>
                </div>
            </div>
            <div class="card-body">
            <form action="{{ route('product.show', $product->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="#">product_title</label>
                    <div class="form-control">{{ $product->product_title }}</div>
                </div>
                <div class="form-group">
                    <label for="#">product_slug</label>
                    <div class="form-control">{{ $product->product_slug }}</div>
                </div>
                <div class="form-group">
                    <label for="#">product_image</label>
                    <div class="form-control">{{ $product->product_image }}</div>
                </div>
            </form>                    
            </div>
            </div>
        </div>
    </div>
@endsection