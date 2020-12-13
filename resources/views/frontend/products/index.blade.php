@extends('layouts.front')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-3">
        <div class="filter">

<h5>Цвет</h5>
@foreach($products_all as $product_colors)
    @foreach($product_colors->colors as $color)
        <div class="form-group">
            <input type="checkbox" id="{{$color->color}}" name="color" value="{{$color->color}}">
            <label for="{{$color->color}}"> {{$color->color}}</label>
        </div>
    @endforeach
@endforeach

<h5>Размер</h5>

@foreach($products_all as $product_sizes)
    @foreach($product_sizes->sizes as $size)
        <div class="form-group">
            <input type="checkbox" id="{{$size->size}}" name="size" value="{{$size->size}}">
            <label for="{{$size->size}}"> {{$size->size}}</label>
        </div>
    @endforeach
@endforeach

<a id="form_filter_url" href="">Применить</a>

<script>
    var color_url = "";
    var size_url = "";
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
        url = "http://localhost/filter/color=" + color_url + "&size=" + size_url;
        $('#form_filter_url').attr('href', url);
    });
</script>


</div>
        </div>

        <div class="col-12 col-md-9">
        <div class="row">
                @forelse($products as $product)
                        <div class="col-12 col-md-3">
                            <a href="/products/{{$product->id}}/{{ $color->color }}/{{ $size->size }}">
                                
                                @foreach($product->colors as $color)
                                    <img src="{{$color->color_image}}" style="width: 100px;">
                                @endforeach

                                <h5>{{$product->title}}</h5>
                                
                                @foreach($product->colors as $color)
                                    <span>{{ $color->color }}</span>
                                @endforeach

                                @foreach($product->sizes as $size)
                                    <span>{{ $size->size }}</span>
                                @endforeach
                                
                            </a>
                        </div>
                @empty
                    <div class="col-12">Пусто &#9785;</div>
                @endforelse
            </div>
        </div>
    </div>
    </div>
@endsection