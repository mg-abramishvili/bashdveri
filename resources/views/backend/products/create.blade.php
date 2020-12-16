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
                        <label for="style" class="font-weight-bold">Подкатегория</label>
                        <select id="style" name="style" class="form-control">
                            <option value="Современный">Современный</option>
                            <option value="Классика">Классика</option>
                            <option value="Неоклассика">Неоклассика</option>
                            <option value="Ультра">Ультра</option>
                        </select>
                        @if ($errors->has('style'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('style') }}-->
                                Укажите подкатегорию
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="construct_type" class="font-weight-bold">Конструкция</label>
                        <select id="construct_type" name="construct_type" class="form-control">
                            <option value="царговая">царговая</option>
                            <option value="щитовая">щитовая</option>
                            <option value="массив">массив</option>
                        </select>
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
                        <label for="surface" class="font-weight-bold">Покрытие</label>
                        <select id="surface" name="surface" class="form-control">
                            <option value="ламинированная">ламинированная</option>
                            <option value="пвх">пвх</option>
                            <option value="экошпон">экошпон</option>
                            <option value="экокрафт">экокрафт</option>
                            <option value="эмаль">эмаль</option>
                            <option value="шпон">шпон</option>
                            <option value="массив">массив</option>
                        </select>
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
                        <label for="manufacturer" class="font-weight-bold">Производитель</label>
                        <select id="manufacturer" name="manufacturer" class="form-control">
                            <option value="VFD">VFD</option>
                            <option value="ВДК">ВДК</option>
                            <option value="Optima Porte">Optima Porte</option>
                            <option value="ДверЛайн">ДверЛайн</option>
                            <option value="Гринлайн">Гринлайн</option>
                            <option value="Лорд">Лорд</option>
                            <option value="Терри">Терри</option>
                            <option value="Ферони">Ферони</option>
                            <option value="Аргус">Аргус</option>
                            <option value="Тайгер">Тайгер</option>
                            <option value="Агат">Агат</option>
                            <option value="Меги">Меги</option>
                        </select>
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