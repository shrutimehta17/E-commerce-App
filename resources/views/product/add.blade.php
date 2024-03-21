@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card mb-5 rounded-3">
                <div class="card-body">
                    <div class="justify-content-start">
                        <h1>Add Product</h1>
                    </div>
                    <form class="mt-5" method='post' action="{{ route('products-create') }}" id='addProductForm'>
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price" aria-describedby="priceHelp" placeholder="Enter price" required>
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="number" class="form-control" id="discount" name="discount" aria-describedby="discountHelp" placeholder="Enter discount" required>
                        </div>
                        <div class="form-group">
                            <label for="style">Style</label>
                            <input type="text" class="form-control" id="style" name="style" aria-describedby="styleHelp" placeholder="Enter style" required>
                        </div>
                        <div class="form-group">
                            <label for="vendor">Vendor</label>
                            <input type="text" class="form-control" id="vendor" name="vendor" aria-describedby="vendorHelp" placeholder="Enter vendor" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

@endsection