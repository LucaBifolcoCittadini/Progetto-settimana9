@extends('layouts.backoffice')

@section('content')
    <h1>Modifica la categoria del tuo prodotto</h1>
    <form action="/product-categories/{{ $productCategory->id }}" method="POST">
        @csrf()
        @method('PUT')
        <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" id="name" name="name" value="{{ $productCategory->name }}">
        @error('name')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
        </div>
        <div class="from-group">
            <label for="product-categories">Product Categories</label>
            <select class="form-select" name="product-category-id" id="product-category">
                <option value="">--Select Category</option>
                @foreach($categories as $category)
                    <option 
                        value="{{ $category->id }}" 
                        @if($category->id === $productCategory->product_category_id) selected @endif
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-2">
                <button class="btn btn-primary">Edit</button>
            </div>
        </div>
    </form>
@endsection