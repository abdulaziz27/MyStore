@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Dulziz</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('product.index') }}">Products</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('category.index') }}">Category</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li> -->
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav> 
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-12">
                <div class="card mt-md-3">
                  <div class="card-header">
                    <div class="row">
                      <div class="col text-left">Create New Category</div>
                      <div class="col text-right">
                        <a href="{{ route('category.index')}}" class="btn btn-xs btn-dark">
                          <i class="fa fa-backspace"></i> View category  
                      </a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="name">Category Name</label>
                      <input type="text" name="name_categories" class="form-control" required="">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>                    
                </div>
                </div>
            </div>
        </div>
@endsection