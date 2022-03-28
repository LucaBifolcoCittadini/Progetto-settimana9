@extends('layouts.backoffice')

@section('content')
    <h1>Inserisci il tuo prodotto</h1>
    <form action="/products" method="POST" enctype="multipart/form-data">
        @csrf()
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" id="name" name="name">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control " id="description" name="description"></textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="from-group">
            <label for="product-categories">Product Categories</label>
            <select class="form-select" name="product-category-id" id="product-category">
                <option value="">--Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="price">Price</label>
            <input class="form-control" type="number" id="price" name="price" step="any"/>  
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Select Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity">
            @error('quantity')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-2">
                <button class="btn btn-primary">Create</button>
            </div>
        </div>
    </form>
@endsection