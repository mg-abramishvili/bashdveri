@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-12">
            <h1>{{$product->title}}</h1>
            <p style="color: #999">Редактирование</p>
        </div>

        <div class="col-12 col-md-5">
            <div class="box">
            <form action="/backend/product/{{$product->id}}" method="post" enctype="multipart/form-data">@csrf
                <input type="hidden" name="id" value="{{$product->id}}">

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="title" class="font-weight-bold">Название</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Название" value="{{ $product->title }}">
                            @if ($errors->has('title'))
                                <div class="alert alert-danger">
                                    Укажите название
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="base_price" class="font-weight-bold">Базовая цена</label>
                            <input type="text" class="form-control" id="base_price" name="base_price" placeholder="Базовая цена" value="{{ $product->base_price }}">
                            @if ($errors->has('base_price'))
                                <div class="alert alert-danger">
                                    Укажите базовую цену
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="old_price" class="font-weight-bold">Старая цена</label>
                            <input type="text" class="form-control" id="old_price" name="old_price" placeholder="Старая цена" value="{{ $product->old_price }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                        <label for="styles" class="font-weight-bold">Стиль</label>
                        <select id="styles" name="styles" class="form-control">
                            @foreach($styles as $style)
                                <option value="{{$style->id}}" @foreach($product->styles as $ps) @if($ps->id == $style->id) selected @endif @endforeach>{{$style->name}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('styles'))
                            <div class="alert alert-danger">
                                Укажите подкатегорию
                            </div>
                        @endif
                    </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                        <label for="constructs" class="font-weight-bold">Конструкция</label>
                            <select id="constructs" name="constructs" class="form-control">
                                @foreach($constructs as $construct)
                                    <option value="{{$construct->id}}" @foreach($product->constructs as $pc) @if($pc->id == $construct->id) selected @endif @endforeach>{{$construct->name}}</option>
                                @endforeach
                            </select>
                            
                            @if ($errors->has('constructs'))
                                <div class="alert alert-danger">
                                    Укажите конструкцию
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="types" class="font-weight-bold">Тип</label>
                            <select id="types" name="types" class="form-control">
                                <option disabled selected>Выберите</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}" @foreach($product->types as $t) @if($type->id == $t->id) selected @endif @endforeach>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="productions" class="font-weight-bold">Срок изготовления</label>
                            <select id="productions" name="productions" class="form-control">
                                <option disabled selected>Выберите</option>
                                @foreach($productions as $production)
                                    <option value="{{ $production->id }}" @foreach($product->productions as $p) @if($production->id == $p->id) selected @endif @endforeach>{{ $production->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="surfaces" class="font-weight-bold">Покрытие</label>
                            <select id="surfaces" name="surfaces" class="form-control">
                                @foreach($surfaces as $surface)
                                    <option value="{{$surface->id}}" @foreach($product->surfaces as $ps) @if($ps->id == $surface->id) selected @endif @endforeach>{{$surface->name}}</option>
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
                            <label for="manufacturers" class="font-weight-bold">Производитель</label>
                            <select id="manufacturers" name="manufacturers" class="form-control">
                                @foreach($manufacturers as $manufacturer)
                                    <option value="{{$manufacturer->id}}" @foreach($product->manufacturers as $pm) @if($pm->id == $manufacturer->id) selected @endif @endforeach>{{$manufacturer->name}}</option>
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
                    <label for="description" class="font-weight-bold">Описание</label>
                    <textarea rows="4" class="form-control" id="description" name="description" placeholder="Описание">{{$product->description}}</textarea>
                    @if ($errors->has('description'))
                        <div class="alert alert-danger">
                            Укажите описание
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Связка с другим типом двери</label>
                    <select name="other_products[]" class="custom-select" multiple>
                        @foreach($products as $pd)
                            @if($product->id != $pd->id)
                            <option value="{{$pd->id}}" @foreach($product->other_products as $ot) @if($pd->id == $ot->id) selected @endif @endforeach>{{$pd->title}} @foreach($pd->types as $pdt) - {{ $pdt->name }} @endforeach</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-lg btn-success">Сохранить</button>
            </form>
            </div>
        </div>

        <div class="col-12 col-md-7">
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
                        <input type="text" name="color_name" value="{{ $color->name }}" class="form-control">
                    </div>
                    <div class="col-3">
                        <input type="text" name="color_price" value="{{ $color->price }}" class="form-control">
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-sm btn-success" style="width:100%;">OK</button>
                        <a href="/backend/delete-color/{{$color->id}}" class="btn btn-sm btn-danger">Удалить</a>
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
                            source: '{{ $color->image }}',
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
                                <label>Цвет</label>
                                <input type="text" name="color_name" class="form-control mb-3">
                                <label>Цена</label>
                                <input type="text" name="color_price" class="form-control mb-3">
                                <input class="color_image" type="file" name="color_image" x-ref="color_image">
                                @if ($errors->has('color_image'))
                                    <div class="alert alert-danger">
                                        Укажите файл
                                    </div>
                                @endif
                                <button type="submit" class="btn btn-lg btn-success">Добавить цвет</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box mt-4">
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
                        <input type="text" name="size_name" value="{{ $size->name }}" class="form-control">
                    </div>
                    <div class="col-3">
                        <input type="text" name="size_price" value="{{ $size->price }}" class="form-control">
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
                                <label>Размер</label>
                                <select name="size_name" class="form-control mb-3">
                                    <option value="600&times;2000">600&times;2000</option>
                                    <option value="700&times;2000">700&times;2000</option>
                                    <option value="800&times;2000">800&times;2000</option>
                                    <option value="900&times;2000">900&times;2000</option>
                                    <option value="">нестандарт</option>
                                </select>
                                <label>Цена</label>
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