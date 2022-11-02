<script>
import { Head } from '@inertiajs/inertia-vue3';
import axios from 'axios';
import ResultBlock from '@/Pages/ResultBlock.vue';
import Modal from '@/Pages/Modal.vue';

export default {
    components: {Head,ResultBlock, Modal, axios},
    data() {
        return {
            showModal: false,
            resultsOutput: {},
            modalMessage: '',
            form :{
                name: '',
                minPrice: '',
                maxPrice: '',
                bedrooms: '',
                bathrooms: '',
                storeys: '',
                garages:'' 
            }
        }
    },
    methods: {
        submit(){ 
            axios({
                method: 'post',
                url:'api/search',
                withCredentials:true,
                data: this.form
            })
            .then(response => {
                this.resultsOutput = response.data.data;
                this.showModal = false;
            })
            .catch(errors => {
                let json = errors.response.data;
                this.modalMessage = json.utilities.message;
                this.showModal = true;
            })    
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
                <input type="text" class="form-control" v-model="form.name"  name="name" >
                <div  class="form-text">Put a name</div>
            </div>

            <div class="col-6">
                <label for="minPrice" class="form-label">min Price</label>
                <input type="text" class="form-control" v-model="minPrice" name="minPrice">
                <div  class="form-text">Put min Price</div>
            </div>
            <div class="col-6">
                <label for="maxPrice" class="form-label">maxPrice</label>
                <input type="text" class="form-control" v-model="maxPrice" name="maxPrice">
                <div  class="form-text">Put max Price</div>
            </div>

            <div class="col-12">
                <label for="bedrooms" class="form-label">Bedrooms</label>
                <input type="text" class="form-control" iv-model="bedrooms" name="bedrooms">
                <div  class="form-text">Put a number of bedrooms</div>
            </div>

            <div class="col-12">
                <label for="bathrooms" class="form-label">Bathrooms</label>
                <input type="text" class="form-control" v-model="bathrooms" name="bathrooms" >
                <div  class="form-text">Put a number of bathrooms</div>
            </div>

            <div class="col-12">
                <label for="storeys" class="form-label">Storeys</label>
                <input type="text" class="form-control" v-model="storeys" name="storeys" >
                <div  class="form-text">Put a number of Storeys</div>
            </div>

            <div class="col-12">
                <label for="garages" class="form-label">Garages</label>
                <input type="text" class="form-control" v-model="garages" name="garages" >
                <div  class="form-text">Put a number of Garages</div>
            </div>

            <button type="submit"  class="btn btn-primary">Submit</button>
        </form>

        <modal v-if="showModal" :message="modalMessage"></modal>
        
        <result-block v-if="Object.keys(resultsOutput).length" :results="resultsOutput" ></result-block>
        
    </div>
   
</template>
