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
                        <a href="{{ url('/product/') }}" class="btn btn-sm btn-dark">
                            <i class="fa fa-backspace"></i> Back  
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="/product/upload/data" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <!-- <label for="#">Upload File</label> -->
                        <label for="#">Upload File</label>
                        <input type="file" name="file" class="form-control"
                            placeholder="Gambar Product">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Save</button>
                </form>                    
            </div>
            </div>
        </div>
    </div>
@endsection