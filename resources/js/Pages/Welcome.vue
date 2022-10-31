<script>
import { Head, useForm } from '@inertiajs/inertia-vue3';

export default {

components: { Head, useForm },
data() {
    return{
            modal: false,
            results: false,
            form: useForm({
                name: '',
                minPrice: '',
                maxPrice: '',
                bedrooms: '',
                bathrooms: '',
                storeys: '',
                garages:''
            })
        }
    },
    methods: {
        submit(){
            this.form.post('/api/search', this.form)
        }
    }
}
</script>

<template>
    <Head title="Welcome" />

    <div id="app" class="container">
        <form id="searchForm" class="row g-3" @submit.prevent="submit">
           
            <div class="col-12">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="Name"  name="name" >
                <div  class="form-text">Put a name</div>
            </div>

            <div class="col-6">
                <label for="minPrice" class="form-label">min Price</label>
                <input type="text" class="form-control" id="minPrice" name="minPrice">
                <div  class="form-text">Put min Price</div>
            </div>
            <div class="col-6">
                <label for="maxPrice" class="form-label">maxPrice</label>
                <input type="text" class="form-control" id="maxPrice" name="maxPrice">
                <div  class="form-text">Put max Price</div>
            </div>

            <div class="col-12">
                <label for="bedrooms" class="form-label">Bedrooms</label>
                <input type="text" class="form-control" id="bedrooms" name="bedrooms">
                <div  class="form-text">Put a number of bedrooms</div>
            </div>

            <div class="col-12">
                <label for="bathrooms" class="form-label">Bathrooms</label>
                <input type="text" class="form-control" id="bathrooms" name="bathrooms" >
                <div  class="form-text">Put a number of bathrooms</div>
            </div>

            <div class="col-12">
                <label for="storeys" class="form-label">Storeys</label>
                <input type="text" class="form-control" id="storeys" name="storeys" >
                <div  class="form-text">Put a number of Storeys</div>
            </div>

            <div class="col-12">
                <label for="garages" class="form-label">Garages</label>
                <input type="text" class="form-control" id="garages" name="garages" >
                <div  class="form-text">Put a number of Garages</div>
            </div>

            <button type="submit" :disabled="form.processing" class="btn btn-primary">Submit</button>
        </form>

        <div id="results" v-show="modal">

            <div id="resultsMessage" class="alert  my-2" role="alert"></div>

        </div>

        <table id="resultsTable" v-show="results" class="table table-striped ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Bedrooms</th>
                <th scope="col">Bathrooms</th>
                <th scope="col">Storeys</th>
                <th scope="col">Garages</th>
            </tr>
            </thead>
            <tbody id="resultsOutput">
            </tbody>
        </table>

    </div>
   
</template>
