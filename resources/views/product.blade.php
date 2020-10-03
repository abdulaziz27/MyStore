@extends('layouts.app')

@section('content')
    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-hover table-bordered">
        <tr class="bg-light">
            <th class="text-md-center">NO</th>
            <th class="text-md-center">Product</th>
            <th class="text-md-center">Image Name</th>
            <th width="350px" class="text-md-center">Action</th>
        </tr>
        @forelse ($product as $pr)
        <tr>
            <td class="text-md-center">{{ $loop->iteration }}</td>
            <td class="text-md-center">{{ $pr->product_title }}</td>
            <td class="text-md-center">{{ $pr->product_image }}</td>
            <td class="text-md-center">
                <form action="{{ route('product.destroy', $pr->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('product.show', $pr->product_slug) }}" class="btn btn-info">
                    <i class="fas fa-search"> Detail</i></a>
                    <a href="{{ route('product.edit', $pr->product_slug) }}" class="btn btn-warning">
                    <i class="fas fa-edit"> Update</i></a>
                    <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash"> Delete</i></button>
                </form>
            </td>
        </tr>    
        @empty
            <tr>
                <td colspan="8" class="text-center">Tidak Ada Data</td>
            </tr>
        @endforelse
        
    </table>
@endsection
