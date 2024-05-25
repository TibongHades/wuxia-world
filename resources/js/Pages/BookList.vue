<template>
    <main id="page-trans">
        <div class="container">
            <div class="button-group">
                <a href="/pages/csv-all" target="_blank" class="csv-downloader btn btn-primary">Download CSV</a>
                <a href="/books/pdf" class="export-pdf btn btn-secondary">Export PDF</a>
            </div>
            <div class="search-bar">
                <input v-model="searchQuery" type="text" placeholder="Search by title..." class="search-input">
            </div>
            <h1 class="page-title">Books</h1>
            <div class="card-container">
                <div v-for="(book, index) in filteredBooks" :key="index" class="card">
                    <div class="card-content">
                        <img :src="book.book_cover" alt="Book Cover" class="book-cover">
                        <div class="card-text">
                            <h2 class="card-title">{{ book.title }}</h2>
                            <p class="card-description">
                                <strong>Description:</strong>
                                {{ truncatedDescription(book.description) }}
                                <span v-if="isTruncated(book.description)">
                                    <span v-if="!showMore[index]">...</span>
                                    <span v-else>{{ book.description.slice(maxDescriptionLength) }}</span>
                                    <button @click="toggleShowMore(index)">
                                        {{ showMore[index] ? 'See less' : 'See more' }}
                                    </button>
                                </span>
                            </p>
                        </div>
                        <div class="card-footer">
                            <p class="card-chapters"><strong>Chapters:</strong> {{ book.chapters }}</p>
                            <Link :href="`/books/${book.id}`" class="btn btn-primary">View Book</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script setup>
import Layoutpage from '@/Layouts/Layoutpage.vue';
import { ref, computed } from 'vue';
import { Link } from '@inertiajs/vue3'

defineOptions({
    layout: Layoutpage
})

const props = defineProps({
    books: Array 
})

const searchQuery = ref('');
const maxDescriptionLength = 150;
const showMore = ref([]);
const filteredBooks = computed(() => {
    return props.books.filter(book => 
        book.title.toLowerCase().includes(searchQuery.value.toLowerCase())
    );
});
const truncatedDescription = (description) => {
    if (isTruncated(description)) {
        return description.slice(0, maxDescriptionLength) + '...';
    }
    return description;
};
const isTruncated = (description) => {
    return description.length > maxDescriptionLength;
};
const toggleShowMore = (index) => {
    showMore[index] = !showMore[index];
};
</script>


<style scoped>
.container {
    margin: 15px;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
}

.button-group {
    margin-bottom: 20px;
    display: flex;
    gap: 10px;
}

.csv-downloader, .export-pdf {
    padding: 10px 20px;
    border-radius: 4px;
    text-decoration: none;
    color: #fff;
    transition: background-color 0.3s;
}

.csv-downloader {
    background-color: #4CAF50;
}

.csv-downloader:hover {
    background-color: #45a049;
}

.export-pdf {
    background-color: #f44336;
}

.export-pdf:hover {
    background-color: #e53935;
}

.search-bar {
    margin-bottom: 20px;
    text-align: right;
}

.search-input {
    padding: 10px;
    width: 100%;
    max-width: 300px;
    border: 1px solid #ccc;
    border-radius: 4px;
    transition: border-color 0.3s;
}

.search-input:focus {
    border-color: #4CAF50;
    outline: none;
}

.page-title {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 20px;
    color: #333;
}

.card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.card {
    flex: 1 1 calc(25% - 20px);
    max-width: calc(25% - 20px);
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.card-content {
    display: flex;
    flex-direction: column;
    height: 100%;
}

.book-cover {
    width: 100%;
    height: auto;
    object-fit: cover;
}

.card-text {
    flex-grow: 1;
    padding: 15px;
}

.card-title {
    font-size: 1.25rem;
    font-weight: bold;
    margin-bottom: 10px;
    color: #333;
}

.card-description {
    margin-bottom: 15px;
    color: #666;
}

.card-footer {
    padding: 15px;
    background-color: #f5f5f5;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-chapters {
    color: #666;
}

.btn {
    padding: 8px 16px;
    border-radius: 4px;
    color: #fff;
    text-decoration: none;
    transition: background-color 0.3s;
}

.btn-primary {
    background-color: #4CAF50;
}

.btn-primary:hover {
    background-color: #45a049;
}
</style>
