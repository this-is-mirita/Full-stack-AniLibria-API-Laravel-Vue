<script setup>
import axios from "axios";
import {onMounted, ref} from "vue";

const BASE_URL = 'http://localhost:8000';
const random = ref([])
onMounted(async () => {
    try {
        const response = await axios.get(`${BASE_URL}/api/title/random`);
        console.log(response);
    } catch (error) {
        console.error("Ошибка при загрузке данных:", error);
    }
 });
</script>


<template>
    <div>
        <h2 class="text-xl font-bold mb-2">Аниме весеннего сезона</h2>
        <p class="text-sm text-gray-600">
            Аниме сериалы бывают умопомрачительно смешными (комедийные)...
        </p>
        <div>
            <p>{{ random.id}}</p>
<!--            <p>{{ random.description}}</p>-->
<!--            <p>{{ random.genres}}</p>-->
<!--            <p>{{ random.names}}</p>-->
<!--            <p>{{ random.posters}}</p>-->
<!--            <p>{{ random.season}}</p>-->
<!--            <p>{{ random.status}}</p>-->
        </div>
    </div>
</template>

<style scoped>

</style>
