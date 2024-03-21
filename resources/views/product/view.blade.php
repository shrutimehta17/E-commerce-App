@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title" style="font-size: 20px;">Name : {{$product->name}}</h1>
                    <p class="card-text" style="font-size: 20px;">Price : {{$product->price}}</p>
                    <p class="card-text" style="font-size: 20px;">Discount : Rs {{$product->discount}}</p>
                    <p class="card-text" style="font-size: 20px;">Style : {{$product->style}}</p>
                    <p class="card-text" style="font-size: 20px;">Vendor : {{$product->vendor}}</p>
                    <p class="card-text">Description : {{$product->description}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

@endsection