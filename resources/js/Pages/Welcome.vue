<script setup>
import { Head} from '@inertiajs/inertia-vue3';
import { reactive, ref } from "vue";
import axios from 'axios';
import ResultBlock from '@/Pages/ResultBlock.vue';

let showModal =  ref(false);
let resultsOutput = reactive({});
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
    .then(response => {
        let resultsOutputblock = document.getElementById('resultsOutputblock')
    
        resultsOutput.value = response.data.data;

        // let data = response.data.data;
        
        // let counter=1;
        //     for(let item of data) {

        //         let rowElement = document.createElement('tr');

        //         rowElement.innerHTML =
        //             `<th scope="row">${counter++}</th>
        //     		 <td>${item.name}</td>
  		// 		       <td>${item.price}</td>
        // 				 <td>${item.bedrooms}</td>
        // 			  	<td>${item.bathrooms}</td>
        // 			  	<td>${item.storeys}</td>
        // 		  		<td>${item.garages}</td>`

        //         resultsOutputBlock.appendChild(rowElement);
            // }

       // resultsOutput.value = response.data.data;
    }
)
    // .catch(errors => {
    //     let json = errors.response.data;
    //     modalMessage.value = json.utilities.message;
    //     showModal.value = true;
    //     // showResults.value = false;
    // })

        
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
        
        <result-block 
            v-if="Object.keys(resultsOutput).length" 
            :results="resultsOutput.value" 
            
        >
    </result-block>
        

    </div>
   
</template>
