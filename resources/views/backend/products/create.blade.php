@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Новая дверь</h1>
            </div>
        </div>

        <form action="/backend/products" method="post" enctype="multipart/form-data">@csrf
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Название">
                @if ($errors->has('title'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('title') }}-->
                        Укажите название
                    </div>
                @endif
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="style" placeholder="Подкатегория">
                @if ($errors->has('style'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('style') }}-->
                        Укажите подкатегорию
                    </div>
                @endif
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="type" placeholder="Тип двери">
                        @if ($errors->has('type'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('type') }}-->
                                Укажите тип двери
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="construct_type" placeholder="Конструкция">
                        @if ($errors->has('construct_type'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('construct_type') }}-->
                                Укажите конструкцию
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="surface" placeholder="Покрытие">
                        @if ($errors->has('surface'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('surface') }}-->
                                Укажите покрытие
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="manufacturer" placeholder="Производитель">
                        @if ($errors->has('manufacturer'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('manufacturer') }}-->
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