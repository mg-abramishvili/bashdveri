<template>
    <div class="container">
        <h1>Catalog</h1>
        <div class="row">
            <div v-for="product in products" :key="product.id" class="col-12 col-md-3">
                <a class="product-list-page-item">
                    <div class="product-list-page-item-prices mt-3">
                        <p class="price_t mb-0">от {{ product.base_price }} ₽</p>
                    </div>
                    <h3 class="mt-2 mb-0">{{product.title}}</h3>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                products: [],
            }
        },
        created() {
            axios
                .get('/api/products')
                .then(response => (
                    this.products = response.data
                ));
        },
        methods: {
        },
        components: {
        }
    }
</script>