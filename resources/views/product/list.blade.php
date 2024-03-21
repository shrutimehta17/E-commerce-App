@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <th>{{$product->name}}</th>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->discount}}</td>
                                    <td>
                                        <a href="{{ route('products-view', $product->id) }}" class="btn btn-primary">View</a>
                                        <a href="{{ route('products-edit', $product->id) }}" class="btn btn-success ml-3">Edit</a>
                                        <a href="{{ route('products-delete', $product->id) }}" class="btn btn-danger ml-3">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <a href="{{ route('products-add') }}" class="btn btn-danger mt-3">Add Product</a>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

@endsection