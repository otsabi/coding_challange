<template>

	<div>
        <listproduct-component
        @SetShow="SetShow"
        :products.sync="products"
        :categorys.sync="categorys"
        v-if="show == 'listing'"
        />
        <addproduct-component
        @SetShow="SetShow"
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
            categorys:null,
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
        SetShow(value)
        {
            this.show = value
        }
    }

}
</script>
