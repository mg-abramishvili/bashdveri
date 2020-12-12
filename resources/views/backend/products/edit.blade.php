@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-12">
            <h1>{{$product->title}}</h1>
            <p style="color: #999">Изменение товара</p>
        </div>

        <div class="col-12 col-md-6">
            <form action="/backend/products/{{$product->id}}" method="post" enctype="multipart/form-data">@csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$product->id}}">

                <div class="form-group">
                    <input type="text" class="form-control" name="title" placeholder="Название" value="{{ $product->title }}">
                    @if ($errors->has('title'))
                        <div class="alert alert-danger">
                            <!--{{ $errors->first('title') }}-->
                            Укажите название
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <textarea rows="4" class="form-control" name="description" placeholder="Описание">{{$product->description}}</textarea>
                    @if ($errors->has('description'))
                        <div class="alert alert-danger">
                            <!--{{ $errors->first('description') }}-->
                            Укажите описание
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input class="image" type="file" name="image" x-ref="image">
                    @if ($errors->has('image'))
                        <div class="alert alert-danger">
                            <!--{{ $errors->first('image') }}-->
                            Укажите файл
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-lg btn-success">Сохранить</button>
            </form>
        </div>

        <div class="col-12 col-md-6">
            @foreach($product->colors as $color)
            <form action="{{ route('color.update', $color->id) }}" method="post" enctype="multipart/form-data">@csrf
                <input type="hidden" name="id" value="{{$color->id}}">
                <div class="row align-items-center">
                    <div class="col-3">
                        <input class="color_image{{$color->id}}" type="file" name="color_image" x-ref="color_image">
                    </div>
                    <div class="col-6">
                        <input type="text" name="color" value="{{ $color->color }}" class="form-control">
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-sm btn-success">Сохранить</button>
                    </div>
                </div>
            </form>

            <script>
                FilePond.registerPlugin(FilePondPluginImagePreview);
                $('.color_image{{$color->id}}').filepond({
                    allowMultiple: false,
                    allowReorder: false,
                    imagePreviewHeight: 70,
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

            <div class="p-4 bg-info mt-4">
                <h5>Добавить новый цвет</h5>
                <form action="{{ route('color.add', $product->id) }}" method="post" enctype="multipart/form-data">@csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="text" name="color" class="form-control mb-3">
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

    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        $('.image').filepond({
            allowMultiple: false,
            allowReorder: false,
            imagePreviewHeight: 140,
            labelIdle: 'Нажмите для загрузки файлов',
            labelFileProcessing: 'Загрузка',
            labelFileProcessingComplete: 'Загружено',
            labelTapToCancel: '',
            labelTapToUndo: '',

            server: {
                remove: (filename, load) => {
                    load('1');
                    return  ajax_delete('deleteimage');
                },
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);
                    const request = new XMLHttpRequest();
                    request.open('POST', '/backend/products/file/upload');
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
                    source: '{{ $product->image }}',
                    options: {
                        type: 'local',
                    }
                }
            ]

        });

        function ajax_delete(methos){
            $.ajax({
               url:'/backend/products/file/'+methos,
                method:'POST'
            });
        }
    </script>

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