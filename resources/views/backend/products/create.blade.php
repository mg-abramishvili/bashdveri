@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Новая дверь</h1>
            </div>
        </div>

        <form action="/backend/products" method="post" enctype="multipart/form-data">@csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="title" class="font-weight-bold">Название</label>
                        <input type="text" class="form-control" name="title" placeholder="Название">
                        @if ($errors->has('title'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('title') }}-->
                                Укажите название
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="base_price" class="font-weight-bold">Базовая стоимость</label>
                        <input type="text" class="form-control" name="base_price" placeholder="Базовая стоимость">
                        @if ($errors->has('base_price'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('base_price') }}-->
                                Укажите базовую стоимость
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Стиль</label>
                        <select name="styles" class="form-control">
                            <option disabled selected value> -- Выберите стиль -- </option>
                            @foreach ($styles as $style)
                                <option value="{{ $style->id }}">{{ $style->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('style'))
                            <div class="alert alert-danger">
                                Укажите стиль
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Конструкция</label>
                        <select name="constructs" class="form-control">
                            <option disabled selected value> -- Выберите конструкцию -- </option>
                            @foreach ($constructs as $construct)
                                <option value="{{ $construct->id }}">{{ $construct->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('constructs'))
                            <div class="alert alert-danger">
                                Укажите конструкцию
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Покрытие</label>
                        <select name="surfaces" class="form-control">
                            <option disabled selected value> -- Выберите покрытие -- </option>
                            @foreach ($surfaces as $surface)
                                <option value="{{ $surface->id }}">{{ $surface->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('surfaces'))
                            <div class="alert alert-danger">
                                Укажите покрытие
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Производитель</label>
                        <select name="manufacturers" class="form-control">
                            <option disabled selected value> -- Выберите производителя -- </option>
                            @foreach ($manufacturers as $manufacturer)
                                <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('manufacturers'))
                            <div class="alert alert-danger">
                                Укажите производителя
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group">
                <textarea rows="4" class="form-control" name="description" placeholder="Описание"></textarea>
                @if ($errors->has('description'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('description') }}-->
                        Укажите описание
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-lg btn-success">Сохранить</button>
        </form>
    </div>

@endsection