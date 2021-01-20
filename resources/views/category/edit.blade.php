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
                  <div class="col text-left">Update Category</div>
                  <div class="col text-right">
                    <a href="{{ route('category.index')}}" class="btn btn-xs btn-dark">
                      <i class="fa fa-backspace"></i> Back  
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body">
            <form action="{{ route('category.update', $category->id) }}" method="post">
            @csrf
            @method('PUT')
                <div class="form-group">
                  <label for="name">Category Name</label>
                  <input type="text" name="name_categories" class="form-control"
                      placeholder="Category" value="{{ $category->name_categories }}">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
              </form>                    
            </div>
            </div>
        </div>
    </div>
@endsection