<script setup>
const props = defineProps({
    layout: Object
})
</script>

<template>
    <template v-if="layout.acf_fc_layout == 'header'">
        <Header :layout="layout" />
    </template>
    <template v-if="layout.acf_fc_layout == 'cta'">
        <Cta :layout="layout" />
    </template>
</template>