<template>
	<div>
        <b-container fluid="sm">
            <b-row class="m-2">
                <b-col>
                    <b-form-input v-model="name" placeholder="Enter product name"></b-form-input>
                </b-col>
                <b-col>
                    <b-form-input v-model="description" placeholder="Enter product description "></b-form-input>
                </b-col>
                <b-col>
                    <b-form-input v-model="price" placeholder="Enter price" type="number"></b-form-input>
                </b-col>
                <b-col>
                        <b-form-select
                            v-model="category_id"
                            :options="categorys"
                            value-field="id"
                            text-field="name"
                        >
                            <b-form-select-option :value="null">select category</b-form-select-option>
                        </b-form-select>
                </b-col>
                <b-col>
                    <b-form-file v-model="file" class="mt-3" accept=".jpg, .png, .gif" plain></b-form-file>
                </b-col>

                <b-col>
                    <b-button
                        variant="primary"
                    >
                        <span class="text-nowrap" @click="submit">Add Product</span>
                    </b-button>
                </b-col>

            </b-row>
        </b-container>
	</div>
</template>

<script>

export default {
    props:['categorys'],
	data () {
		return {
            name : null,
            description : null,
            price : null,
            category_id: null,
            file: null,
		}
	},
    methods: {
        submit(){
            const formData = new FormData()
            if (this.file !== null) {
                formData.append('file', this.file)
                formData.append('name', this.name)
                formData.append('description', this.description)
                formData.append('price', this.price)
                formData.append('category_id', this.category_id)
            }
                axios.post('http://127.0.0.1:8000/api/products/', formData, {
                'Content-Type': 'multipart/form-data',
            })
                .then(console.log('add product'))
                .catch(error => console.log(error))

                this.$emit('SetShow', 'listing')
        }
    }


}
</script>
