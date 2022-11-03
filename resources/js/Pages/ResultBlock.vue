<script>
import Pagination from '@/Pages/Pagination.vue';
export default {
   components: {Pagination},
    props: {
        results: Object,
    }    
}
</script>

<template>
  
    <table   class="table table-striped ">
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
        <tbody>
            <tr  v-for="(item, index )  in results.data" :key="item.id" >
                <th>{{index+1}}</th>
                <td>{{item.name}}</td>
                <td>{{item.price}}</td>
                <td>{{item.bedrooms}}</td>
                <td>{{item.bathrooms}}</td>
                <td>{{item.storeys}}</td>
                <td>{{item.garages}}</td>
            </tr>    
        </tbody>
    </table>
    
    <pagination :links="results.meta.links"></pagination>
</template>