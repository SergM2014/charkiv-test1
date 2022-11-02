<script setup>

defineProps ({
    results: Object
})

</script>

<template>
<h2>Hello, this is result block!!!</h2>
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
            <tbody  >
               <tr v-for="res in results">
                <th></th>
                <td>{{res.name}}</td>
                <td>{{res.price}}</td>
                <td>{{res.bedrooms}}</td>
                <td>{{res.bathrooms}}</td>
                <td>{{res.storeys}}</td>
                <td>{{res.garages}}</td>
                </tr>
            </tbody>
        </table>

</template>