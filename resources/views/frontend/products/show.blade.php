@extends('layouts.front')
@section('content')

<div class="container product-item-page">

    <div class="row">
        <div class="col-12 col-md-4">
            <div class="product-item-page-slider">
                @foreach($product->colors as $color)
                    <div class="product-item-page-slider-item product-item-page-slider-item{{ $color->id }}" id="{{ $color->id }}" style="background-image: url({{ $color->color_image }})"></div>
                @endforeach
            </div>
        </div>
        <div class="col-12 col-md-8">
            <h1>{{ $product->title }}</h1>
            <div id="out"></div>

            <form id="myForm" class="mt-4">

                <div class="row align-items-center mb-3">
                    <div class="col-12 col-md-2">
                        <strong>Тип двери</strong>
                    </div>
                    <div class="col-12 col-md-10">
                        <div class="types-box">
                            @foreach($product->types as $type)
                                <div class="form-group">
                                    <input type="radio" id="type{{ $type->id }}" name="type" value="{{ $type->id }}" data-price="{{ $type->type_price }}" @if($type->id == $producttype) checked @endif>
                                    <label for="type{{ $type->id }}">{{ $type->type }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row align-items-center mb-3">
                    <div class="col-12 col-md-2">
                        <strong>Цвет</strong>
                    </div>
                    <div class="col-12 col-md-10">
                        <div class="colors-box">
                            @foreach($product->colors as $color)
                                <div class="form-group">
                                    <input type="radio" id="color{{ $color->id }}" name="color" value="{{ $color->id }}" data-price="{{ $color->color_price }}" data-selector=".product-item-page-slider-item{{ $color->id }}" @if($color->id == $productcolor) checked @endif>
                                    <label for="color{{ $color->id }}">{{ $color->color }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row align-items-center mb-3">
                    <div class="col-12 col-md-2">
                        <strong>Размер</strong>
                    </div>
                    <div class="col-12 col-md-10">
                        <div class="sizes-box">
                            @foreach($product->sizes as $size)
                                <div class="form-group">
                                    <input type="radio" id="size{{ $size->id }}" name="size" value="{{ $size->id }}" data-price="{{ $size->size_price }}" @if($size->id == $productsize) checked @endif>
                                    <label for="size{{ $size->id }}">{{ $size->size }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </form>

            <div class="price mb-4"></div>
            <!--<a href="{{ route('cart.add', $product->id) }}" class="btn-standard">В корзину</a>-->
            <a href="#" class="btn-standard">В корзину</a>
        </div>
    </div>

</div>

@endsection

@section('scripts')
    <script>
        $('.product-item-page-slider').flickity({
        cellAlign: 'left',
        contain: true
        });
    </script>

    <script>
        $( document ).ready(function() {
            if(isNaN(parseInt($('input[name=color]:checked', '#myForm').attr("data-price")))) {
                var color_price = '{{ $product->base_price }}';
            } else {
                var color_price = parseInt($('input[name=color]:checked', '#myForm').attr("data-price"));
            }
            var color = $('input[name=color]:checked', '#myForm').val();

            if(isNaN(parseInt($('input[name=size]:checked', '#myForm').attr("data-price")))) {
                var size_price = '{{ $product->base_price }}';
            } else {
                var size_price = parseInt($('input[name=size]:checked', '#myForm').attr("data-price"));
            }
            var size = $('input[name=size]:checked', '#myForm').val();

            if(isNaN(parseInt($('input[name=type]:checked', '#myForm').attr("data-price")))) {
                var type_price = '{{ $product->base_price }}';
            } else {
                var type_price = parseInt($('input[name=type]:checked', '#myForm').attr("data-price"));
            }
            var type = $('input[name=size]:checked', '#myForm').val();

            var price_max = Math.max(color_price, size_price, type_price);
            
            $('.price').html(price_max + ' ₽');

            $('#out').html('{{ $product->title }} Цвет: '+ color + 'Тип: ' + type + ' Цена: '+ price_max +'руб.');

            $('.product-item-page-slider').flickity( 'selectCell', '.product-item-page-slider-item{{ $productcolor }}' );
        });

        $('#myForm input').on('change', function() {
            if(isNaN(parseInt($('input[name=color]:checked', '#myForm').attr("data-price")))) {
                var color_price = '{{ $product->base_price }}';
            } else {
                var color_price = parseInt($('input[name=color]:checked', '#myForm').attr("data-price"));
            }
            var color_slider_selector = $('input[name=color]:checked', '#myForm').attr("data-selector");
            var color = $('input[name=color]:checked', '#myForm').val();

            if(isNaN(parseInt($('input[name=size]:checked', '#myForm').attr("data-price")))) {
                var size_price = '{{ $product->base_price }}';
            } else {
                var size_price = parseInt($('input[name=size]:checked', '#myForm').attr("data-price"));
            }
            var size = $('input[name=size]:checked', '#myForm').val();

            if(isNaN(parseInt($('input[name=type]:checked', '#myForm').attr("data-price")))) {
                var type_price = '{{ $product->base_price }}';
            } else {
                var type_price = parseInt($('input[name=type]:checked', '#myForm').attr("data-price"));
            }
            var type = $('input[name=size]:checked', '#myForm').val();

            var price_max = Math.max(color_price, size_price, type_price);

            $('.price').html(price_max + ' ₽');

            $('#out').html('{{ $product->title }} Цвет: '+ color + 'Тип: ' + type + ' Цена: '+ price_max +'руб.')
            
            $('.product-item-page-slider').flickity( 'selectCell', color_slider_selector );
        });
    </script>
@endsection