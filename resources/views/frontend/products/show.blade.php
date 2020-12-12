@extends('layouts.front')
@section('content')

<div class="container product-item-page">

    <div class="row">
        <div class="col-12 col-md-4">

        </div>
        <div class="col-12 col-md-8">
            <h1>{{ $product->title }}</h1>
            <div id="out"></div>

            <form id="myForm" class="mt-4">
                <div class="colors-box">
                    @foreach($product->colors as $color)
                        <div class="form-group">
                            <input type="radio" id="{{ $color->id }}" name="color" value="{{ $color->id }}" data-price="{{ $color->color_price }}" @if($color->color == $productcolor) checked @endif>
                            <label for="{{ $color->id }}">{{ $color->color }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="sizes-box">
                    @foreach($product->sizes as $size)
                        <div class="form-group">
                            <input type="radio" id="{{ $size->size }}" name="size" value="{{ $size->size }}" data-price="{{ $size->size_price }}" @if($size->size == $productsize) checked @endif>
                            <label for="{{ $size->size }}">{{ $size->size }}</label>
                        </div>
                    @endforeach
                </div>
            </form>

            <div class="price mb-4"></div>
            <a href="{{ route('cart.add', $product->id) }}" class="btn-standard">В корзину</a>
        </div>
    </div>

    <script>
        $( document ).ready(function() {
            var color_price = parseInt($('input[name=color]:checked', '#myForm').attr("data-price"));
            var color = $('input[name=color]:checked', '#myForm').val();

            var size_price = parseInt($('input[name=size]:checked', '#myForm').attr("data-price"));
            var size = $('input[name=size]:checked', '#myForm').val();

            var price_max = Math.max(color_price, size_price);

            $('.price').html(price_max + ' ₽');

            $('#out').html('{{ $product->title }} Цвет: '+ color +' Цена: '+ price_max +'руб.');
        });

        $('#myForm input').on('change', function() {
            var color_price = parseInt($('input[name=color]:checked', '#myForm').attr("data-price"));
            var color = $('input[name=color]:checked', '#myForm').val();

            var size_price = parseInt($('input[name=size]:checked', '#myForm').attr("data-price"));
            var size = $('input[name=size]:checked', '#myForm').val();

            var price_max = Math.max(color_price, size_price);

            $('.price').html(price_max + ' ₽');

            $('#out').html('{{ $product->title }} Цвет: '+ color +' Цена: '+ price_max +'руб.');
        });
    </script>

</div>

@endsection