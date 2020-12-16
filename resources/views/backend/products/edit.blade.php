@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-12">
            <h1>{{$product->title}}</h1>
            <p style="color: #999">Изменение двери</p>
        </div>

        <div class="col-12 col-md-6">
            <div class="box">
            <form action="/backend/products/{{$product->id}}" method="post" enctype="multipart/form-data">@csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$product->id}}">

                <div class="row">
                    <div class="col-7">
                        <div class="form-group">
                            <label for="title" class="font-weight-bold">Название</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Название" value="{{ $product->title }}">
                            @if ($errors->has('title'))
                                <div class="alert alert-danger">
                                    <!--{{ $errors->first('title') }}-->
                                    Укажите название
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="base_price" class="font-weight-bold">Базовая стоимость</label>
                            <input type="text" class="form-control" id="base_price" name="base_price" placeholder="Базовая стоимость" value="{{ $product->base_price }}">
                            @if ($errors->has('base_price'))
                                <div class="alert alert-danger">
                                    <!--{{ $errors->first('base_price') }}-->
                                    Укажите базовую стоимость
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                <label for="style" class="font-weight-bold">Подкатегория</label>
                    <input type="text" class="form-control" id="style" name="style" placeholder="Подкатегория" value="{{ $product->style }}">
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
                            <label for="type" class="font-weight-bold">Тип двери</label>
                            <input type="text" class="form-control" id="type" name="type" placeholder="Тип двери" value="{{ $product->type }}">
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
                        <label for="construct_type" class="font-weight-bold">Конструкция</label>
                            <input type="text" class="form-control" id="construct_type" name="construct_type" placeholder="Конструкция" value="{{ $product->construct_type }}">
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
                            <input type="text" class="form-control" id="surface" name="surface" placeholder="Поверхность" value="{{ $product->surface }}">
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
                            <input type="text" class="form-control" id="manufacturer" name="manufacturer" placeholder="Производитель" value="{{ $product->manufacturer }}">
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
                    <label for="description" class="font-weight-bold">Описание</label>
                    <textarea rows="4" class="form-control" id="description" name="description" placeholder="Описание">{{$product->description}}</textarea>
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
        </div>

        <div class="col-12 col-md-6">
            <div class="box">
            <div class="row align-items-center mb-4">
                <div class="col-6">
                    <h3 class="m-0">Цвета</h3>
                </div>
                <div class="col-6 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-color">Добавить цвет</button>
                </div>
            </div>
            
        
            @foreach($product->colors as $color)
            <form action="{{ route('color.update', $color->id) }}" method="post" enctype="multipart/form-data">@csrf
                <input type="hidden" name="id" value="{{$color->id}}">
                <div class="row align-items-center">
                    <div class="col-3">
                        <input class="color_image{{$color->id}}" type="file" name="color_image" x-ref="color_image">
                    </div>
                    <div class="col-4">
                        <input type="text" name="color" value="{{ $color->color }}" class="form-control">
                    </div>
                    <div class="col-3">
                        <input type="text" name="color_price" value="{{ $color->color_price }}" class="form-control">
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-sm btn-success" style="width:100%;">OK</button>
                    </div>
                </div>
            </form>

            <script>
                FilePond.registerPlugin(FilePondPluginImagePreview);
                $('.color_image{{$color->id}}').filepond({
                    allowMultiple: false,
                    allowReorder: false,
                    imagePreviewHeight: 100,
                    labelIdle: 'Нажмите для загрузки файлов',
                    labelFileProcessing: 'Загрузка',
                    labelFileProcessingComplete: 'Загружено',
                    labelTapToCancel: '',
                    labelTapToUndo: '',

                    server: {
                        remove: (filename, load) => {
                            load('1');
                            return  ajax_delete('deletecolor_image{{$color->id}}');
                        },
                        process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                            const formData = new FormData();
                            formData.append(fieldName, file, file.name);
                            const request = new XMLHttpRequest();
                            request.open('POST', '/backend/add-color/file/upload');
                            request.upload.onprogress = (e) => {
                                progress(e.lengthComputable, e.loaded, e.total);
                            };
                            request.onload = function() {
                                if (request.status >= 200 && request.status < 300) {
                                    load(request.responseText);
                                }
                                else {
                                    error('oh no');
                                }
                            };
                            request.send(formData);
                            return {
                                abort: () => {
                                    request.abort();
                                    abort();
                                }
                            };
                        },
                        revert: (filename, load) => {
                            load(filename)
                        },
                        load: (source, load, error, progress, abort, headers) => {
                            var myRequest = new Request(source);
                            fetch(myRequest).then(function(response) {
                                response.blob().then(function(myBlob) {
                                    load(myBlob)
                                });
                            });
                        },
                    },

                    files: [
                        {
                            source: '{{ $color->color_image }}',
                            options: {
                                type: 'local',
                            }
                        }
                    ]

                });

                function ajax_delete(methos){
                    $.ajax({
                    url:'/backend/add-color/file/'+methos,
                        method:'POST'
                    });
                }
            </script>            
            @endforeach
            </div>

            <div class="modal" id="modal-color">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Добавить цвет</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('color.add', $product->id) }}" method="post" enctype="multipart/form-data">@csrf
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <input type="text" name="color" class="form-control mb-3">
                                <input type="text" name="color_price" class="form-control mb-3">
                                <input class="color_image" type="file" name="color_image" x-ref="color_image">
                                @if ($errors->has('color_image'))
                                    <div class="alert alert-danger">
                                        <!--{{ $errors->first('color_image') }}-->
                                        Укажите файл
                                    </div>
                                @endif
                                <button type="submit" class="btn btn-lg btn-success">Добавить цвет</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box mt-4 mb-4">
            <div class="row align-items-center mb-4">
                <div class="col-6">
                    <h3 class="m-0">Размеры</h3>
                </div>
                <div class="col-6 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-size">Добавить размер</button>
                </div>
            </div>

            @foreach($product->sizes as $size)
            <form action="{{ route('size.update', $size->id) }}" method="post" enctype="multipart/form-data" class="mb-3">@csrf
                <input type="hidden" name="id" value="{{$size->id}}">
                <div class="row align-items-center">
                    <div class="col-7">
                        <input type="text" name="size" value="{{ $size->size }}" class="form-control">
                    </div>
                    <div class="col-3">
                        <input type="text" name="size_price" value="{{ $size->size_price }}" class="form-control">
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-sm btn-success" style="width:100%;">OK</button>
                    </div>
                </div>
            </form>           
            @endforeach
            </div>

            <div class="modal" id="modal-size">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Добавить размер</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('size.add', $product->id) }}" method="post" enctype="multipart/form-data">@csrf
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <input type="text" name="size" class="form-control mb-3">
                                <input type="text" name="size_price" class="form-control mb-3">
                                <button type="submit" class="btn btn-lg btn-success">Добавить размер</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);

        $('.color_image').filepond({
            allowMultiple: false,
            allowReorder: false,
            imagePreviewHeight: 140,
            labelIdle: 'Картинка цвета',
            labelFileProcessing: 'Загрузка',
            labelFileProcessingComplete: 'Загружено',
            labelTapToCancel: '',
            labelTapToUndo: '',

            server: {
                remove: (filename, load) => {
                    load('1');
                    return  ajax_delete('deletecolor_image');

                },
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);
                    const request = new XMLHttpRequest();
                    request.open('POST', '/backend/add-color/file/upload');
                    request.upload.onprogress = (e) => {
                        progress(e.lengthComputable, e.loaded, e.total);
                    };
                    request.onload = function() {
                        if (request.status >= 200 && request.status < 300) {
                            load(request.responseText);
                        }
                        else {
                            error('oh no');
                        }
                    };
                    request.send(formData);
                    return {
                        abort: () => {
                            request.abort();
                            abort();
                        }
                    };
                },
                revert: (filename, load) => {
                    load(filename)
                },
                load: (source, load, error, progress, abort, headers) => {
                    var myRequest = new Request(source);
                    fetch(myRequest).then(function(response) {
                        response.blob().then(function(myBlob) {
                            load(myBlob)
                        });
                    });
                },
            },
        });

        function ajax_delete(methos){
            $.ajax({
                url:'/backend/add-color/file/'+methos,
                method:'POST'
            });
        }
    </script>

@endsection