<script setup>
import { Link } from '@inertiajs/vue3';
import Layoutpage from '@/Layouts/Layoutpage.vue';

defineOptions({
    layout: Layoutpage
})
</script>

<template>
    <main id="page-trans">
        <div class="info">
            <img src="https://m.media-amazon.com/images/I/51ojf-RNjfL.png" alt="Wuxia World Logo" class="logo">
            <h1 class="title">Wuxia World</h1>
            <p class="subtitle">(Books Collection)</p>
            <p class="description">Explore our collection of exciting Wuxia novels and immerse yourself in the world of martial arts and adventure.</p>
            <Link href="/book-list" class="route">View Books</Link>
        </div>
    </main>
</template>

<style scoped>
.info {
    background-color: rgb(204, 204, 204);
    color: black;
    padding: 40px 20px;
    text-align: center;
    border-radius: 10px;
    max-width: 800px;
    margin: 40px auto; /* Added top margin to lower the box */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.logo {
    height: 100px;
    width: 100px;
    border-radius: 50%;
    margin-bottom: 20px;
}

.title {
    font-size: 2.5rem;
    font-weight: bold;
    margin-top: 20px;
}

.subtitle {
    font-size: 1.2rem;
    margin-top: 10px;
    font-weight: bold;
}

.description {
    margin-top: 20px;
    font-size: 1rem;
    line-height: 1.5;
    max-width: 600px;
    margin: 20px auto;
}

.route {
    display: inline-block;
    margin-top: 30px;
    padding: 10px 20px;
    background-color: black;
    color: white;
    text-decoration: none;
    font-weight: bold;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.route:hover {
    background-color: rgb(103, 100, 100);
}
</style>
