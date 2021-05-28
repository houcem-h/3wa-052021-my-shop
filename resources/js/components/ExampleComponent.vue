<template>
    <div class="container">
        <ProductsListComponent :products="products"></ProductsListComponent>
    </div>
</template>
<script>
import ProductsListComponent from './ProductsListComponent.vue';
    export default {
        components: {
            ProductsListComponent
        },
        mounted() {
            this.loadAllProducts();
        },
        data: function() {
            return {
                products: []
            }
        },
        methods: {
            loadAllProducts: function() {
                //1st solution : Axios
                // axios.get('/api/products')
                // .then(response => {
                    //     this.products = response.data
                // })
                // .catch(error => console.log(error));
                //2nd solution : Fetch
                fetch('/api/products')
                .then(response => {
                    response.json().then(data => {
                        data.forEach(element => {
                            this.products.push(element);
                        });
                    })
                })
                .catch(error => console.log(error));
            }
        }
    }
</script>
