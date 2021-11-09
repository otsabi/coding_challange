<template>

	<div>
        <listproduct-component
        @setShow="setShow"
        :products.sync="products"
        :categorys.sync="categorys"
        v-if="show == 'listing'"
        />
        <addproduct-component
        @setShow="setShow"
        :categorys.sync="categorys"
        v-if="show == 'add'"
        />
	</div>
</template>

<script>
import ListproductComponent from './ListproductComponent.vue'
import AddproductComponent from './AddproductComponent.vue'

export default {
    components: {
        ListproductComponent,
        AddproductComponent,
    },
	data () {
		return {
            products: null,
            categorys: null,
			show: "listing",
		}
	},
    mounted() {
        axios
        .get("http://127.0.0.1:8000/api/products/")
        .then((r) => {
          this.products  = r.data.products
          this.categorys = r.data.categorys

        })
        .catch((e) => {
          console.log(e);
        });
    },
    methods: {
        setShow(value)
        {
            this.show = value
        }
    }

}
</script>
