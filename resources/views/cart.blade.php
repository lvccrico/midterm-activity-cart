@extends('layouts.master')

@section('content')

    <div class="container">
        <p><a href="{{ url('shop') }}">Home</a> / Cart</p>
        <h1>Your Cart</h1>

        <hr>

        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif

        @if (sizeof($items) > 0)

            <table class="table">
                <thead>
                    <tr>
                        <th class="table-image"></th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th class="column-spacer"></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td class="table-image"><a href="{{ url('shop', [$item->id]) }}"><img src="{{ asset('img/' . $item->product->image) }}" alt="product" class="img-responsive cart-image"></a></td>
                        <td><a href="{{ url('shop', [$item->id]) }}">{{ $item->product->name }}</a></td>
                        <td>
                            <select class="quantity" id="quantity" data-id="{{ $item->id }}">
                                <option {{ $item->pivot->quantity == 1 ? 'selected' : '' }}>1</option>
                                <option {{ $item->pivot->quantity == 2 ? 'selected' : '' }}>2</option>
                                <option {{ $item->pivot->quantity == 3 ? 'selected' : '' }}>3</option>
                                <option {{ $item->pivot->quantity == 4 ? 'selected' : '' }}>4</option>
                                <option {{ $item->pivot->quantity == 5 ? 'selected' : '' }}>5</option>
                            </select>
                        </td>
                        <td>${{ ($item->pivot->quantity * $item->price) }}</td>
                        <td class=""></td>
                        <td>
                            <form action="{{ url('cart', $item->id) }}" method="POST" class="side-by-side">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" class="btn btn-danger btn-sm" value="Remove">
                            </form> 
                        </td>
                    </tr>

                    @endforeach
                    <tr>
                        <td class="table-image"></td>
                        <td></td>
                        <td class="small-caps table-bg" style="text-align: right">Subtotal</td>
                        <td>${{ $total_amount }}</td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr class="border-bottom">
                        <td class="table-image"></td>
                        <td style="padding: 40px;"></td>
                        <td class="small-caps table-bg" style="text-align: right">Your Total</td>
                        <td class="table-bg">${{ $total_amount }}</td>
                        <td class="column-spacer"></td>
                        <td></td>
                    </tr>

                </tbody>
            </table>

            <a href="{{ url('/shop') }}" class="btn btn-primary btn-lg">Continue Shopping</a> &nbsp;
            <a href="#" class="btn btn-success btn-lg">Proceed to Checkout</a>

            <div style="float:right">
                <form action="{{ url('/emptyCart') }}" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger btn-lg" value="Empty Cart">
                </form>
            </div>

        @else

            <h3>You have no items in your shopping cart</h3>
            <a href="{{ url('/shop') }}" class="btn btn-primary btn-lg">Continue Shopping</a>

        @endif

        <div class="spacer"></div>

    </div> <!-- end container -->

@endsection

@section('extra-js')
    <script>
        console.log(document.getElementById('quantity').value);

        (function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.quantity').on('change', function() {
                var id = $(this).attr('data-id')
                $.ajax({
                  type: "PATCH",
                  url: '{{ url("/cart") }}' + '/' + id,
                  data: {
                    'quantity': this.value,
                    'product_price_id': id
                  },
                  success: function(data) {
                    window.location.href = '{{ url('/cart') }}';
                  }
                });
            });
        })();

    </script>
@endsection
