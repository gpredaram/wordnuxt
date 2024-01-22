<script setup>
import { ref } from 'vue'

const route = useRoute()

const slug = ref('')

if(route.params.slug) {
    let lastIndex = route.params.slug.length - 1
    if(!route.params.slug[lastIndex]) {
        slug.value = route.params.slug[lastIndex - 1]
    } else {
        slug.value = route.params.slug[lastIndex]
    }
} else {
    slug.value = 'home'
}

const { data, pending, error, refresh } = await useFetch('https://wordnuxt.test/wp-json/wp/v2/pages', {
    query: { slug: slug.value }
});

</script>



<template>
    <div>
        <Nav />
        <template v-for="layout in data[0].acf.flexible">    
            <Flexible :layout="layout" />    
        </template>
        {{ data[0].acf }}
    </div>
</template>