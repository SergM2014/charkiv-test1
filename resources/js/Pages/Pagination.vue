<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {
    components:{ Link },
    props: {links: Array}
}
</script>

<template>
   
    <div>
        <Component 
            :is="link.url ? 'Link':'span'"
            v-for = "link in links"
            method="POST"
            
            :href = "link.url"
           
            :class= "{
                'text-gray': !link.url,
                'font-bold': link.active
            }"
            >{{link.label}}</Component>
    </div>
</template>