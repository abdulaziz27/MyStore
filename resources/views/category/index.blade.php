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
    <div class="row mb-md-3 mt-md-3">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a href="{{ route('category.create') }}" class="btn btn-success">Create New Category</a>
            </div>
        </div>
    </div>

    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-hover table-bordered table-responsive">
        <tr class="bg-light">
            <th class="text-md-center"width="90px">NO</th>
            <th class="text-md-center"width="700px">Category</th>
            <th class="text-md-center"width="350px">Action</th>
        </tr>
        @forelse ($category as $ct)
        <tr>
            <th class="text-md-center">{{ $loop->iteration }}</td>
            <th class="text-md-center">{{ $ct->name_categories }}</td>
            <th class="text-md-center">
                <form action="{{ route('category.destroy', $ct->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('category.show', $ct->id) }}" class="btn btn-info">Show</a>
                    <a href="{{ route('category.edit', $ct->id) }}" class="btn btn-warning">Update</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>    
        @empty
            <tr>
                <td colspan="3" class="text-center">Tidak Ada Data</td>
            </tr>
        @endforelse
        
    </table>

@endsection
