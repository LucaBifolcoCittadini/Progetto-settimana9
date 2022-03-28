@extends('layouts.backoffice')

@section('content')
        @if(session ('hasError'))
            <div class="alert alert-danger mt-2">
                @if(session ('action') === 'destroy')
                    Delete action not allowed: check  if the select product has children
                @endif
            </div>
        @endif
        <div class="container">
            <div class="row">
                @foreach($products as $product)
                    <div class="card col-md-4 col-12" style="width: 18rem;">
                        <img class="card-img-top" src="{{ $product->image }}" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text">Prezzo: {{ $product->price }} €</p>
                            <p class="card-text">Quantità: {{ $product->quantity }} pezzi</p>
                            <td class="text-end">
                                <a href="/products/{{ $product->id }}/edit" class="btn btn-primary">Edit</a>
                                <form class="d-inline" action="/products/{{ $product->id }}" method="POST">
                                    @csrf()
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>            
                            </td>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
@endsection