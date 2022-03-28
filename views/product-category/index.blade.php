@extends('layouts.backoffice')

@section('content')
        @if(session ('hasError'))
            <div class="alert alert-danger mt-2">
                @if(session ('action') === 'destroy')
                    Delete action not allowed: check  if the select category has children
                @endif
            </div>
        @endif
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Parent</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id}}</td>
                <td>{{ $category->name}}</td>
                <td>
                    @if($category->productCategory)
                        {{ $category->productCategory->name }}
                    @else
                        -
                    @endif
                </td>
                <td class="text-end">
                    <a href="/product-categories/{{ $category->id }}/edit" class="btn btn-primary">Edit</a>
                    <form class="d-inline" action="/product-categories/{{ $category->id }}" method="POST">
                        @csrf()
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>            
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection