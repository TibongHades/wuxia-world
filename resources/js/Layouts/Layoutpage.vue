<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
    <div class="flex">
        <div class="navbar fixed h-full w-[200px] bg-yellow-800 text-white overflow-y-auto">
            <img src='https://play-lh.googleusercontent.com/Psus0r8X-mk_aCNbTpm3B6Y5YcDD-WTIXVJHV49_895YNsHuB2ZGQErzilVLXsT6Ww' alt="">
            <nav class="item-center">
                <h1 class="text-center mt-[25px] text-2xl">Wuxia World</h1>
                <Link href="/" class="about bg-black py-2 px-5 text-center rounded mt-3">Home</Link>
                <Link href="/book-list" class="about bg-black py-2 px-5 text-center rounded mt-3">Book List</Link>
                <Link href="/qrbooks" class="about bg-black py-2 px-5 text-center rounded">QR Books</Link>
                <Link href="/qrscanner" class="about bg-black py-2 px-5 text-center rounded">QR Scanner</Link>
                <Link href="/upload-csv-form" class="about bg-black py-2 px-5 text-center rounded">Add Book w/CSV</Link>
            </nav>
        </div>
        <div class="content flex-grow overflow-y-auto pl-[200px]">
            <Transition name="page-trans" mode="out-in"> 
                <slot />
            </Transition>
        </div>   
    </div>
</template>

<style scoped>
img {
    margin-top: 15px;
    height: 100px;
    width: 100px;
    border-radius: 50%;
    margin-left: 50px; 
}
.about{
    margin-left: 20px; 
    margin-bottom: 20px;
    width: 150px;
}
.about:hover{
    background-color: rgb(22, 22, 22);
}
h1 {
    text-shadow: 
        0 0 5px #4a4a4a, 
        0 0 10px #4a4a4a,
        0 0 15px #4a4a4a,
        0 0 20px #4a4a4a,
        0 0 25px #4a4a4a,
        0 0 30px #4a4a4a,
        0 0 35px #4a4a4a;
}

.navbar {
    width: 200px;
}

.navbar nav {
    display: flex;
    flex-direction: column;
}

.navbar a {
    text-decoration: none;
    color: inherit;
}

.navbar a:hover {
    background-color: #4a4a4a;
}

.content {
    flex-grow: 1;
    padding-left: 200px;
}
</style>
