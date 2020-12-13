<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>БашДвери</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flickity.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lightgallery.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/flickity.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/lightgallery.min.js') }}"></script>
</head>
<body>

@if(Request::is('/'))
<header class="header-absolute">
@else
<header>
@endif

            <div class="container">
            <div class="header">
                <div class="row align-items-center">
                    <div class="col-12 header-logo">
                        <a href="/">
                            <!--<img src="http://xn--80abehgs9c4c.xn--p1ai/wp-content/themes/woo/images/logo.svg" alt="БашДвери Уфа">-->
                            Логотип
                        </a>
                    </div>
                    <div class="col-12 header-nav">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
                                    <ul id="menu-top-menu" class="navbar-nav mr-auto">
                                        <li class="nav-item"><a href="/products/" class="nav-link">Каталог</a></li>
                                        <li class="nav-item"><a href="#" class="nav-link">Отзывы</a></li>
                                        <li class="nav-item"><a href="#" class="nav-link">Акции</a></li>
                                        <li class="nav-item"><a href="#" class="nav-link">Контакты</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="col-12 header-tel">
                        <a href="#">+7 347 123-45-67</a>
                        <a href="#">+7 347 123-45-67</a>
                                            </div>
                    <div class="col-12 header-button">
                        <button class="btn-standard">Бесплатный замер</button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')


    <footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-4">
                Каталог
            </div>
            <div class="col-12 col-sm-4">
                Страницы
            </div>
            <div class="col-12 col-sm-4">
                Соцсети и контакты
            </div>
        </div>
    </div>
</footer>


<div id="modal-product-1" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <p>Здесь будет информация где купить дверь.</p>
      </div>
    </div>
  </div>
</div>

<div id="modal-product-2" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <p>Здесь будет информация об оплате.</p>
      </div>
    </div>
  </div>
</div>

<div id="modal-product-3" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <p>Здесь будет форма для записи на замер.</p>
      </div>
    </div>
  </div>
</div>

<div id="modal-product-4" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <p>Здесь будет форма обратной связи.</p>
      </div>
    </div>
  </div>
</div>




<div id="modal-form" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p class="txt">Укажите контактные данные и мы сразу с вами свяжемся!</p>
                [contact-form-7 id="463" title="Связаться с нами"]                <p class="pol">
                    <small>
                        Нажимая кнопку "Отправить" вы даете согласие на обработку моих персональных данных
                    </small>
                </p>
                <p class="pol" style="margin-bottom:0;">
                    <small>
                        This site is protected by reCAPTCHA and the Google
                        <a href="https://policies.google.com/privacy">Privacy Policy</a> and
                        <a href="https://policies.google.com/terms">Terms of Service</a> apply.
                    </small>
                </p>
            </div>
        </div>
    </div>
</div>

  @yield('scripts')
</body>
</html>