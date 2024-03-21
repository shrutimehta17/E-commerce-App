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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart_items as $cart_item)
                                <tr>
                                    <th>{{$cart_item->product->name}}</th>
                                    <td>{{$cart_item->price}}</td>
                                    <td>{{$cart_item->discount}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-5">
                        <h5> Total Discount : {{ $cart->discount }}</h5>
                        <h5> Total Price : {{ $cart->total }}</h5>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

@endsection