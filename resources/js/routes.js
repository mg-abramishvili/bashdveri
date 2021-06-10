import Home from './components/home/Home.vue';
import Catalog from './components/catalog/Catalog.vue';
import Category from './components/catalog/Category.vue';
import Product from './components/catalog/Product.vue';

export const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/catalog',
        name: 'Catalog',
        component: Catalog
    },
    {
        path: '/catalog/:category',
        name: 'Category',
        component: Category
    },
    {
        path: '/product/:id',
        name: 'Product',
        component: Product
    },
];