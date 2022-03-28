@extends('layouts.backoffice')

@section('content')
    <h1>Modifica il tuo prodotto</h1>
    <form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
        @csrf()
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" id="name" name="name" value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control " id="description" name="description" >{{ $product->description }}</textarea>
        </div>
        <div class="form-group mt-2">
                <label for="price">Price</label>
                <input class="form-control" type="number" id="price" name="price" value="{{ $product->price }}" step="any"/>        
            </div>
            <div class="form-group">
                <label for="image">Select Image</label>
                <input type="file" class="form-control" id="image" value="{{ $product->image }}" name="image">
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-2">
                <button class="btn btn-primary">Edit</button>
            </div>
        </div>
    </form>
@endsection
