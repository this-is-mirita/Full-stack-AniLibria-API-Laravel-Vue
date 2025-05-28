<script setup>
import logo from '@/assets/logo.png'
import {ref} from "vue";
const search = ref()
</script>

<template>
    <!-- Шапка -->
    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mt-2 border-bottom">
        <a href="/" class="d-flex align-items-center link-body-emphasis text-decoration-none me-4">
            <img :src="logo" class="img-fluid" style="width: 50px" alt="">
            <span class="fs-4 ms-2">anime by meeymirita</span>
        </a>

        <!-- Поисковый input -->
        <div class="flex-grow-1 d-flex justify-content-center my-2 my-md-0">
            <input
                v-model="search"
                type="text"
                class="form-control rounded-pill w-75"
                placeholder="Поиск..."
                aria-label="Поиск"
            />
        </div>
        <!-- Навигация -->
        <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
            <router-link class="me-3 py-2 link-body-emphasis text-decoration-none" to="/">Аниме</router-link>
            <router-link class="me-3 py-2 link-body-emphasis text-decoration-none" to="/">Манга</router-link>
            <router-link class="me-3 py-2 link-body-emphasis text-decoration-none" to="/">Персонажи</router-link>
            <router-link class="me-3 py-2 link-body-emphasis text-decoration-none" to="/random">Случайное аниме</router-link>
            <router-link class="me-3 py-2 link-body-emphasis text-decoration-none" to="/">Войти</router-link>
        </nav>
    </div>
</template>
