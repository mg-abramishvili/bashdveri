<template>
    <div class="container product-item-page">

        <div class="row">
            <div class="col-12 col-md-4">
                <div class="product-item-page-slider">
                    <div v-for="color in product.colors" :key="color.id" class="product-item-page-slider-item" v-bind:style="{ 'background-image': 'url(' + color.image + ')' }"></div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <h1>{{ product.title }}</h1>

                <div class="price mb-4">{{ product.base_price }} ₽</div>

                <a class="btn-standard">В корзину</a>
            </div>
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