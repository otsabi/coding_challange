<template>
	<div>
        <b-container fluid="sm">
            <b-row class="m-2">
                <b-col>
                        <b-form-select
                            v-model="selectedCategory"
                            :options="categorys"
                            value-field="id"
                            text-field="name"
                        ></b-form-select>

                </b-col>
                <b-col>
                    <b-button
                        variant="primary"
                    >
                        <span class="text-nowrap" @click="setShow">Add Product</span>
                    </b-button>
                </b-col>
                <b-col>
                    <b-button
                        variant="danger"
                    >
                        <span class="text-nowrap" @click="reset">reset Filter</span>
                    </b-button>
                </b-col>
            </b-row>
            <b-row>
                <b-col>
                    <b-table striped hover
                             :items="filterProducts"
                             :fields="fields">
                    </b-table>

                </b-col>
            </b-row>
        </b-container>
	</div>
</template>

<script>
import { BContainer,BRow,BCol } from 'bootstrap-vue'

export default {
    props: ["products", "categorys"],
    components: {
        BContainer,
        BRow,
        BCol,
    },
	data () {
		return {
            selectedCategory: null,
            fields: [
            { key: 'id', sortable: true },
            { key: 'name', sortable: true },
            { key: 'description' },
            { key: 'price', sortable: true },
            { key: 'image', },
            { key: 'category.name', label:'category'},
            ],
            }
	},
    mounted(){
        console.log(this.products)
    },
    computed: {
        filterProducts() {
            if(this.selectedCategory){

                const Products = this.products.filter( product => product.category_id === (this.selectedCategory || product.category_id ))

                return Products
            }
            else{
                return this.products
            }


        }
    },
    methods: {
        setShow()
        {
            this.$emit('setShow', 'add')
        },
        reset(){
            this.selectedCategory = null
        }
    },
    // watch: {
    //     "selectedCategory": function (val, oldValue) {

    //         this.products = this.products.filter( product => product.category_id === val)

    //     }
    // }

}
</script>
