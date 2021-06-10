@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Двери</h1>
            </div>
            <div class="col-6" style="text-align: right;">
                <a href="/backend/products/create" class="btn btn-primary">Добавить дверь</a>
            </div>
        </div>

        <div class="page">
        <div class="box p-3">
            <table class="table table-bordered table-hover mb-0">
                @forelse($products as $product)
                <tr>
                    <td style="text-align: left; padding-left: 20px; padding-right: 20px;">
                        {{$product->title}}
                    </td>
                    <td style="width: 200px; text-align: center;">
                        <a href="/backend/product/{{$product->id}}/edit" class="btn btn-sm btn-warning">Изменить</a>
                        <a href="/backend/products/delete/{{$product->id}}" class="btn btn-sm btn-danger">Удалить</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td style="text-align: center;">
                        Пусто &#9785;
                    </td>
                </tr>
                @endforelse
            </table>
        </div>
        </div>
    </div>
@endsection