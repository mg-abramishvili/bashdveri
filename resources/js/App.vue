<template>
    <div class="wrapper">
        <header>
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

        <router-view :key="$route.path"></router-view>
    </div>
</template>

<script>
    export default {
        data() {
            return {
            }
        },
        created() {
        },
        components: {
        }
    }
</script>