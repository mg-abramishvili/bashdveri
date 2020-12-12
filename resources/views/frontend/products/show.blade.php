@extends('layouts.front')
@section('content')

    <h1>{{ $product->title }}</h1>

    <h6>{{ $product->price }}</h6>

    <p>{{ $product->description }}</p>

    <form id="myForm">
        @if (!empty($product->color01_name))
        <input type="radio" id="color01_name" name="color" value="{{ $product->color01_name }}" data-price="{{ $product->color01_price }}">
        <label for="color01_name">{{ $product->color01_name }}</label><br>
        @endif

        @if (!empty($product->color02_name))
        <input type="radio" id="color02_name" name="color" value="{{ $product->color02_name }}" data-price="{{ $product->color02_price }}">
        <label for="color02_name">{{ $product->color02_name }}</label><br>
        @endif

        @if (!empty($product->color03_name))
        <input type="radio" id="color03_name" name="color" value="{{ $product->color03_name }}" data-price="{{ $product->color03_price }}">
        <label for="color03_name">{{ $product->color03_name }}</label>
        @endif

        @if (!empty($product->size01_name))
        <input type="radio" id="size01_name" name="size" value="{{ $product->size01_name }}" data-price="{{ $product->size01_price }}">
        <label for="size01_name">{{ $product->size01_name }}</label><br>
        @endif

        @if (!empty($product->size02_name))
        <input type="radio" id="size02_name" name="size" value="{{ $product->size02_name }}" data-price="{{ $product->size02_price }}">
        <label for="size02_name">{{ $product->size02_name }}</label><br>
        @endif

        @if (!empty($product->size03_name))
        <input type="radio" id="size03_name" name="size" value="{{ $product->size03_name }}" data-price="{{ $product->size03_price }}">
        <label for="size03_name">{{ $product->size03_name }}</label>
        @endif
    </form>

    <div id="out"></div>

    <a href="{{ route('cart.add', $product->id) }}">В корзину</a>

    <script>
        var price = parseInt('{{ $product->price }}');

        $('#myForm input').on('change', function() {
            if(parseInt($('input[name=color]:checked', '#myForm').attr("data-price")) > 0) { 
                var color_price = parseInt($('input[name=color]:checked', '#myForm').attr("data-price"));
            } else {
                var color_price = price;
            }
            var color = $('input[name=color]:checked', '#myForm').val();

            if(parseInt($('input[name=size]:checked', '#myForm').attr("data-price")) > 0) { 
                var size_price = parseInt($('input[name=size]:checked', '#myForm').attr("data-price"));
            } else {
                var size_price = price;
            }
            var size = $('input[name=size]:checked', '#myForm').val();

            var price_max = Math.max(price, color_price, size_price);

            $('h6').html(price_max);

            $('#out').html('{{ $product->title }} Цвет: '+ color +' Размер: '+ size +' '+ price_max +'руб.');
        });
    </script>

@endsection