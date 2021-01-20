@extends('layouts.app')

@section('content')
    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="row mb-md-3 mt-md-3">
        <div class="col-lg-3 margin-tb">
            <div class="pull-right">
                <a href="/product/create" class="btn btn-success">
                <i class="fas fa-plus"></i> Create New Product</a>
            </div>
        </div>
        <div class="col-lg-9 margin-tb">
            <div class="float-right">
                <a href="{{ route('product.upload') }}" class="btn btn-success mr-md-5">
                <i class="fas fa-file-upload"></i> Upload Data</a>
                <a href="{{ route('product.exportXL') }}" class="btn btn-info">
                <i class="fas fa-file-excel"></i> Export Excel</a>
                <a href="{{ route('product.exportCSV') }}" class="btn btn-info">
                <i class="fas fa-file-csv"></i> Export CSV</a>
                <a href="{{ route('product.exportPDF') }}" class="btn btn-info">
                <i class="fas fa-file-pdf"></i> Export PDF</a>
            </div>
        </div>
    </div>
    <table class="table table-hover table-bordered">
        <tr class="bg-light">
            <th class="text-md-center">NO</th>
            <th class="text-md-center">Category</th>
            <th class="text-md-center">Product</th>
            <th class="text-md-center">Slug</th>
            <th class="text-md-center">Price ($)</th>
            <th class="text-md-center">Image Name</th>
            <th width="300px" class="text-md-center">Action</th>
        </tr>
        @forelse ($product as $pr)
        <tr>
            <td class="text-md-center">{{ $loop->iteration }}</td>
            <td class="text-md-center">{{ $pr->category->name_categories }}</td>
            <td class="text-md-center">{{ $pr->product_title }}</td>
            <td class="text-md-center">{{ $pr->product_slug }}</td>
            <td class="text-md-center">{{ $pr->product_price }}</td>
            <td class="text-md-center">{{ $pr->product_image }}</td>
            <td class="text-md-center">
                <form action="{{ route('product.destroy', $pr->product_slug) }}" method="post">
                    @csrf
                    @method('DELETE')
                    
                    <a href="{{ route('product.show', $pr->product_slug) }}" class="btn btn-info">
                    <i class="fas fa-search"></i></a>
                    <a href="{{ route('product.edit', $pr->product_slug) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i></a>
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">
                    <i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">Tidak Ada Data</td>
            </tr>
        @endforelse        
    </table>
    {{ $product->links() }}
@endsection
