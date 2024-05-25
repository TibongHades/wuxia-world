<script setup>
import Layoutpage from '@/Layouts/Layoutpage.vue';
import { defineProps } from 'vue';

defineOptions({
    layout: Layoutpage
})

const props = defineProps({
    book: Object 
})
</script>

<template>
    <main id="page-trans">
        <div class="container">
            <h1 class="title">{{ book.title }}</h1>
            <div class="book-detail">
                <img :src="book.book_cover" alt="Book Cover" class="book-cover">
                <div class="book-info">
                    <p class="description"><strong>Description:</strong> {{ book.description }}</p>
                    <p class="chapters"><strong>Chapters:</strong> {{ book.chapters }}</p>
                    <p class="rating"><strong>Rating:</strong> {{ book.rating }}</p>
                </div>
            </div>
        </div>
    </main>
</template>

<style scoped>
.container {
    margin: 20px auto;
    max-width: 800px;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.title {
    font-size: 2rem;
    font-weight: bold;
    color: #1a202c;
    text-align: center;
    margin-bottom: 20px;
}

.book-detail {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
}

.book-cover {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.book-info {
    width: 100%;
    text-align: left;
}

.description, .chapters, .rating {
    font-size: 1rem;
    color: #333;
    margin-bottom: 10px;
}

.description strong, .chapters strong, .rating strong {
    color: #4CAF50;
}
</style>
