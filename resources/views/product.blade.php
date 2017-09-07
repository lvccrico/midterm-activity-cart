@extends('layouts.master')

@section('content')

    <div class="container">
        <p><a href="{{ url('/shop') }}">Shop</a> / {{ $product->name }}</p>
        <h1>{{ $product->name }}</h1>

        <hr>

        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('img/' . $product->image) }}" alt="product" class="img-responsive">
            </div>

            <div class="col-md-8">
                <h3>{{ $product->price_description }}</h3>
                <h4>For ${{ $product->price }}</h3>
                <form action="{{ url('/cart') }}" method="POST" class="side-by-side">
                    {!! csrf_field() !!}
                    <input type="hidden" name="product_price_id" value="{{ $product->product_price_id }}">
                    <input type="hidden" name="amount" value="{{ $product->price }}">
                    <input type="hidden" name="barcode" value="{{ $product->barcode }}">
                    <input type="submit" class="btn btn-success btn-lg" value="Add to Cart">
                </form>

                <br><br>

                {{ $product->description }}
            </div> <!-- end col-md-8 -->
        </div> <!-- end row -->

    </div> <!-- end container -->

@endsection
