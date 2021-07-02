<template>
    <div class="container product-item-page">

        <div class="row">
            <div class="col-12 col-md-4">
                <div class="product-item-page-slider">
                    <div v-for="color in product.colors" :key="color.id" class="product-item-page-slider-item" v-bind:style="{ 'background-image': 'url(' + color.image + ')' }"></div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <h1 class="mt-0 mb-4">{{ product.title }}</h1>

                <div class="row product-info-buttons">
                    <div class="col-12 col-md-3">
                        <button>
                            <img src="/img/ico-location.svg">
                            <span>Где купить?</span>
                        </button>
                    </div>
                    <div class="col-12 col-md-3">
                        <button>
                            <img src="/img/ico-card.svg">
                            <span>Как оплатить?</span>
                        </button>
                    </div>
                    <div class="col-12 col-md-3">
                        <button>
                            <img src="/img/ico-size.svg">
                            <span>Заказать замер</span>
                        </button>
                    </div>
                    <div class="col-12 col-md-3">
                        <button>
                            <img src="/img/ico-alarm.svg">
                            <span>Обратный звонок</span>
                        </button>
                    </div>
                </div>

                <div class="row align-items-center mb-3">
                    <div class="col-12 col-md-2">
                        <strong>Тип двери</strong>
                    </div>
                    <div class="col-12 col-md-10">
                        <div class="types-box">
                            <template v-for="type in product.types">
                                <div class="form-group">
                                    <input type="radio" id="type1" name="type" value="1" data-price="" checked="">
                                    <label for="type1" style="border-color: #bea67c;">{{ type.name }}</label>
                                </div>
                            </template>
                            <template v-for="other_product in product.other_products">
                                <router-link :to="{name: 'Product', params: {id: other_product.id}}" style="display: inline-block; cursor: pointer; padding: 0px 15px; line-height: 34px; border: 2px solid #ddd; border-radius: 6px; user-select: none; margin: 0; color: #333;">
                                    <template v-for="op_type in other_product.types">
                                        {{ op_type.name }}
                                    </template>
                                </router-link>
                            </template>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center mb-3">
                    <div class="col-12 col-md-2">
                        <strong>Цвет</strong>
                    </div>
                    <div class="col-12 col-md-10">
                        <div class="colors-box">
                            <template v-for="color in product.colors">
                                <input type="radio" :id="'color_' + color.id" :value="color.id">
                                <label :for="'color_' + color.id">{{ color.name }}</label>
                            </template>
                        </div>
                    </div>
                </div>

                <div class="price my-4">{{ product.base_price }} ₽</div>

                <a class="btn-standard">В корзину</a>

                <div class="mt-4" style="color: #00c084;">В наличии</div>
            </div>
        </div>

        <div class="description mb-4">
            <div class="row">
                <div class="col-12">
                    {{ product.description }}
                </div>
            </div>
        </div>

        <div class="details-table mb-4">

            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>
                            <strong>Производитель</strong>
                        </td>
                        <td>
                            <template v-for="manufacturer in product.manufacturers">
                                {{ manufacturer.name }}
                            </template>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Стиль</strong>
                        </td>
                        <td>
                            <template v-for="style in product.styles">
                                {{ style.name }}
                            </template>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Тип</strong>
                        </td>
                        <td>
                            <template v-for="type in product.types">
                                {{ type.name }}
                            </template>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Конструкция</strong>
                        </td>
                        <td>
                            <template v-for="construct in product.constructs">
                                {{ construct.name }}
                            </template>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Покрытие</strong>
                        </td>
                        <td>
                            <template v-for="surface in product.surfaces">
                                {{ surface.name }}
                            </template>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                product: {},
            }
        },
        created() {
            axios
                .get(`/api/product/${this.$route.params.id}`)
                .then(response => (
                    this.product = response.data
                ));
        },
        methods: {
        },
        components: {
        }
    }
</script>