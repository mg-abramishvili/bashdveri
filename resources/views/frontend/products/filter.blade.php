@extends('layouts.front')
@section('content')

    <div class="row">
        <div class="col-12 col-md-3">
            <div class="filter">
                <h5>Цвет</h5>

                @foreach($products as $product)
                    <div class="form-group">
                        <input type="checkbox" id="{{$product->color}}" name="{{$product->color}}" value="{{$product->color}}" checked>
                        <label for="{{$product->color}}"> {{$product->color}}</label>
                    </div>
                @endforeach
                @foreach($diff as $diff_item)
                    <div class="form-group">
                        <input type="checkbox" id="{{$diff_item->color}}" name="{{$diff_item->color}}" value="{{$diff_item->color}}">
                        <label for="{{$diff_item->color}}"> {{$diff_item->color}}</label>
                    </div>
                @endforeach

                

            </div>
        </div>

        <div class="col-12 col-md-9">
            <div class="row">
                @forelse($products as $product)
                    <div class="col-12 col-md-3">
                        <a href="/products/@foreach($product->products as $p){{$p->id}}@endforeach">
                            <img src="{{$product->color_image}}" style="width: 100px;">
                            @foreach($product->products as $p)
                                <h5>{{$p->title}}</h5>
                            @endforeach
                            {{$product->color}}
                        </a>
                    </div>
                @empty
                    <div class="col-12">Пусто &#9785;</div>
                @endforelse
            </div>
        </div>
    </div>

@endsection