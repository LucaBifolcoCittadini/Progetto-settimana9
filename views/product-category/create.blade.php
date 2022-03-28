@extends('layouts.backoffice')

@section('content')
    <h1>Crea la categoria per il tuo prodotto</h1>
    <form action="/product-categories" method="POST">
        @csrf
        <div class="from-group">
            <label for="product-categories">Product Categories</label>
            <select class="form-select" name="product-category-id" id="product-category">
                <option value="">--Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" id="name" name="name">
        @error('name')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
        </div>
        <div class="row">
            <div class="col-lg-12 mt-2">
                <button class="btn btn-primary">Create</button>
            </div>
        </div>
    </form>
@endsection