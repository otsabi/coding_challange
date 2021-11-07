<template>
    <div>
        <product-component/>
    </div>
</template>
<script>
import productComponent from './products/productComponent.vue'
export default {
    components: {
        productComponent,
    },
	data () {
		return {
			message : "Bienvenue sur Vue 3"
		}
	}
}
</script>>
