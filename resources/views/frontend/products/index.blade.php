@extends('layouts.front')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="filter">

                <h5>Цвет</h5>
                @foreach($products_colors as $p_colors)
                    @foreach($p_colors->colors as $color)
                        <div class="form-group">
                            <input type="checkbox" id="{{$color->color}}" name="color" value="{{$color->color}}">
                            <label for="{{$color->color}}"> {{$color->color}}</label>
                        </div>
                    @endforeach
                @endforeach

                <!--
                <h5>Размер</h5>

                @foreach($products_sizes as $p_sizes)
                    @foreach($p_sizes->sizes as $size)
                        <div class="form-group">
                            <input type="checkbox" id="{{$size->size}}" name="size" value="{{$size->size}}">
                            <label for="{{$size->size}}"> {{$size->size}}</label>
                        </div>
                    @endforeach
                @endforeach
                -->

                <h5>Стиль</h5>

                @foreach($products_styles as $style)
                    <div class="form-group">
                        <input type="checkbox" id="{{$style->style}}" name="style" value="{{$style->style}}">
                        <label for="{{$style->style}}"> {{$style->style}}</label>
                    </div>
                @endforeach

                <h5>Производитель</h5>

                @foreach($products_manufacturers as $manufacturer)
                    <div class="form-group">
                        <input type="checkbox" id="{{$manufacturer->manufacturer}}" name="manufacturer" value="{{$manufacturer->manufacturer}}">
                        <label for="{{$manufacturer->manufacturer}}"> {{$manufacturer->manufacturer}}</label>
                    </div>
                @endforeach

                <a id="form_filter_url" href="" class="btn-standard">Применить</a>
            </div>
        </div>

        <div class="col-12 col-md-9 product-list-page">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-12 col-md-3">
                        <a class="product-list-page-item" href="/products/{{$product->id}}/@foreach($product->colors as $color)@if($loop->first){{ $color->id }}@endif{{""}}@endforeach/@foreach($product->sizes as $size)@if($loop->first){{ $size->id }}@endif{{""}}@endforeach">
                            
                            <div class="product-list-page-item-images">
                                @foreach($product->colors as $color)
                                    @if($loop->first)
                                    <div class="product-list-page-item-image" style="background-image: url({{$color->color_image}});"></div>
                                    @endif
                                @endforeach
                            </div>                            

                            <div class="product-list-page-item-prices mt-3">
                                @foreach($product->colors->sortBy('color_price')->values() as $color)
                                    @if($loop->first)
                                    <span class="{{ $product->id }}" style="display:none;">{{ $color->color_price }}</span>
                                    @endif
                                @endforeach

                                @foreach($product->sizes->sortBy('size_price')->values() as $size)
                                    @if($loop->first)
                                        <span class="{{ $product->id }}" style="display:none;">{{ $size->size_price }}</span>
                                    @endif
                                @endforeach

                                <p class="price_t mb-0">от {{ $product->base_price }} ₽</p>
                            </div>
                            
                            <h3 class="mt-2 mb-0">{{$product->title}}</h3>

                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
    <script>
        $('.product-list-page-item-images').flickity({
        cellAlign: 'center',
        contain: true,
        prevNextButtons: false,
        pageDots: false,
        });
    </script>

    <script>
        var color_url = "";
        var size_url = "";
        var style_url = "";
        var manufacturer_url = "";
        var url = "";

        $(':checkbox').change(function() {
            color_url = "";
            size_url = "";
            $(':checkbox[name=color]:checked').each(function() {
                color_url = color_url + ',' + $(this).val();
            });
            $(':checkbox[name=size]:checked').each(function() {
                size_url = size_url + ',' + $(this).val();
            });
            $(':checkbox[name=style]:checked').each(function() {
                style_url = style_url + ',' + $(this).val();
            });
            $(':checkbox[name=manufacturer]:checked').each(function() {
                manufacturer_url = manufacturer_url + ',' + $(this).val();
            });

            if(color_url == '') {
                color_url_f = '*'
            } else {
                color_url_f = color_url;
            }

            if(size_url == '') {
                size_url_f = '*'
            } else {
                size_url_f = size_url;
            }

            if(style_url == '') {
                style_url_f = '*'
            } else {
                style_url_f = style_url;
            }

            if(manufacturer_url == '') {
                manufacturer_url_f = '*'
            } else {
                manufacturer_url_f = manufacturer_url;
            }
            
            url = "/filter/color=" + color_url_f + "&size=" + size_url_f + "&style=" + style_url_f + "&manufacturer=" + manufacturer_url_f;
            $('#form_filter_url').attr('href', url);
        });
    </script>
@endsection