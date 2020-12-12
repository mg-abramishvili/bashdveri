@extends('layouts.front')
@section('content')

    {{ \Cart::session(auth()->id())->getTotalQuantity() }}

    <table class="table table-bordered">
        @forelse($cart_items as $item)
            <tr>
                <td>{{ $item->name }}</td>

                <td>
                    <form action="{{ route('cart.update', $item->id) }}">
                        <input name="quantity" type="number" value="{{ $item->quantity }}">
                        <input type="submit" value="обновить">
                    </form>
                </td>

                <td>{{ $item->price }}</td>

                <td>{{ \Cart::session(auth()->id())->get($item->id)->getPriceSum() }}</td>

                <td><a href="{{ route('cart.delete', $item->id) }}">Удалить</a></td>
            </tr>
        @empty
            <tr>
                <td>Корзина пуста</td>
            </tr>
        @endforelse
    </table>

    TOTAL: {{ \Cart::session(auth()->id())->getTotal() }}

@endsection