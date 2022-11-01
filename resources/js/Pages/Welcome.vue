<script setup>
import { Head} from '@inertiajs/inertia-vue3';
import { reactive, ref } from "vue";
import axios from 'axios';

let showModal =  ref(false);
let results = ref(false);
let modalMessage = ref('');
let form = reactive ({
    name: '',
    minPrice: '',
    maxPrice: '',
    bedrooms: '',
    bathrooms: '',
    storeys: '',
    garages:'' 
});

let submit = () => { 
   
    axios({
        method: 'post',
        url:'api/search',
        withCredentials:true,
        data: form
    })
    .then(response => console.log(response.data))
    .catch(errors => {let json = errors.response.data;
        modalMessage.value = json.utilities.message;
        showModal.value = true;
        console.log(showModal, modalMessage)
    })

        
};
    
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

        <div v-show="showModal">

            <div  class="alert  my-2" role="alert">{{ modalMessage}}</div>

        </div>

        <table  v-show="results" class="table table-striped ">
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
