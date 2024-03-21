@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4 mt-2">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h1 class="card-title" style="font-size: 20px;">{{$product->name}}</h1>
                                <h1 class="card-title text-primary" style="font-size: 20px;">Rs {{$product->price}}</h1>
                                <h2 class="card-title" style="font-size: 20px;">Rs {{$product->discount}} discount!!</h2>
                                <h3 class="card-title" style="font-size: 20px;">Style: {{$product->style}}</h3>
                                <h3 class="card-title" style="font-size: 20px;">Vendor: {{$product->vendor}}</h3>
                                <p class="card-text">{{$product->description}}</p>
                                <a href="{{ route('add-to-cart', $product->id) }}" class="btn btn-danger mt-3">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

@endsection