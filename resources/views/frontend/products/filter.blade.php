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
                            <input type="checkbox" id="{{$color->color}}" name="color" value="{{$color->color}}" @foreach($filtercolor as $fc) @if($color->color == $fc) checked @endif @endforeach>
                            <label for="{{$color->color}}"> {{$color->color}}</label>
                        </div>
                    @endforeach
                @endforeach

                <!--
                <h5>Размер</h5>

                @foreach($products_sizes as $p_sizes)
                    @foreach($p_sizes->sizes as $size)
                        <div class="form-group">
                            <input type="checkbox" id="{{$size->size}}" name="size" value="{{$size->size}}" @foreach($filtersize as $fs) @if($size->size == $fs) checked @endif @endforeach>
                            <label for="{{$size->size}}"> {{$size->size}}</label>
                        </div>
                    @endforeach
                @endforeach
                -->

                <h5>Стиль</h5>

                @foreach($products_styles as $style)
                    <div class="form-group">
                        <input type="checkbox" id="{{$style->style}}" name="style" value="{{$style->style}}" @foreach($filterstyle as $fstyle) @if($style->style == $fstyle) checked @endif @endforeach>
                        <label for="{{$style->style}}"> {{$style->style}}</label>
                    </div>
                @endforeach

                <h5>Производитель</h5>

                @foreach($products_manufacturers as $manufacturer)
                    <div class="form-group">
                        <input type="checkbox" id="{{$manufacturer->manufacturer}}" name="manufacturer" value="{{$manufacturer->manufacturer}}" @foreach($filtermanufacturer as $fm) @if($manufacturer->manufacturer == $fm) checked @endif @endforeach>
                        <label for="{{$manufacturer->manufacturer}}"> {{$manufacturer->manufacturer}}</label>
                    </div>
                @endforeach

                <a id="form_filter_url" href="" class="btn-standard">Применить</a>


                

            </div>
        </div>

        <div class="col-12 col-md-9 product-list-page">
            <div class="row">
                @forelse($products as $product)
                    @foreach($product->colors as $color)
                        
                            <div class="col-12 col-md-3">
                                <a class="product-list-page-item" href="/products/{{$product->id}}/{{ $color->id }}/@foreach($product->sizes as $size)@if($loop->first){{ $size->id }}@endif{{""}}@endforeach">

                                    <div class="product-list-page-item-images">
                                        <div class="product-list-page-item-image" style="background-image: url({{$color->color_image}});"></div>
                                    </div>

                                    <div class="product-list-page-item-prices">
                                        <p class="price m-0">от {{ $product->base_price }} ₽</p>
                                    </div>

                                    <h3 class="mt-1 mb-2">{{$product->title}}</h3>

                                    <span style=>{{ $color->color }}</span>
                                    

                                    <span style="display:none;">{{ $product->manufacturer }}</span>
                                </a>
                            </div>
                        @endforeach
                @empty
                    <div class="col-12">Пусто &#9785;</div>
                @endforelse
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
            style_url = "";
            manufacturer_url = "";
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