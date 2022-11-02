<script>
export default {
    props: {
        message: String,
    }    
}
</script>

<template>
    <div>
         <div  class="alert alert-danger  my-2" role="alert">{{ message }}</div>
    </div>
</template>