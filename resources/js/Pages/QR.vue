<script setup>
import Layoutpage from '@/Layouts/Layoutpage.vue';
defineOptions({
    layout: Layoutpage
})
</script>

<template>
    <main id="page-trans">
        <h1>QR Code Scanner</h1>
    </main>
</template>

<style scoped>
img {
    height: 500px;
    width: 500px;
    border-radius: 50%;
}
</style>