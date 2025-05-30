<script setup>
import axios from 'axios'
import { onMounted, ref } from 'vue'

const BASE_URL = 'http://localhost:8000'
const randomAnime = ref([])

onMounted(async () => {
    // try {
    //     const response = await axios.get(`${BASE_URL}/api/title/random`)
    //     randomAnime.value = response.data.original
    //     console.log(response.data.original.postersMedium)
    // } catch (error) {
    //     console.error('Ошибка при загрузке данных:', error)
    // }
    try {
        const response = await axios.get(`https://api.anilibria.tv/v3/title/random`)
        randomAnime.value = response
        console.log(response)
    } catch (error) {
        console.error('Ошибка при загрузке данных:', error)
    }
})

const getFullPoster = (path) => {
    return path ? BASE_URL + path : 'https://via.placeholder.com/300x450?text=No+Image'
}
</script>

<template>
<!--    <div class="container mt-4">-->
<!--        <div-->
<!--            v-for="anime in randomAnime"-->
<!--            :key="anime.id"-->
<!--            class="row mb-4 border rounded p-3 shadow-sm"-->
<!--        >-->
<!--            &lt;!&ndash;             Левая колонка: Постер&ndash;&gt;-->
<!--            <div class="col-md-4 text-center">-->
<!--                <img-->
<!--                    :src="getFullPoster(anime.posters?.medium?.url)"-->
<!--                    :alt="anime.names?.ru || 'Постер'"-->
<!--                    class="card-img-top"-->
<!--                />-->
<!--            </div>-->

<!--            <div class="col-md-4 text-center">-->
<!--                <img-->
<!--                    :src="BASE_URL + anime.posters?.medium?.url"-->
<!--                    :alt="anime.name_ru"-->
<!--                    class="img-fluid rounded"-->
<!--                />-->
<!--            </div>-->

<!--            &lt;!&ndash; Правая колонка: Информация &ndash;&gt;-->
<!--            <div class="col-md-8">-->
<!--                <h4>-->
<!--                    {{ anime.name_ru }} <small class="text-muted">({{ anime.name_en }})</small>-->
<!--                </h4>-->
<!--                <p><strong>Альтернативное название:</strong> {{ anime.name_alternative }}</p>-->
<!--                <p><strong>Описание:</strong> {{ anime.description }}</p>-->
<!--                <p>-->
<!--                    <strong>Жанры:</strong>-->
<!--                    &lt;!&ndash;                    <span&ndash;&gt;-->
<!--                    &lt;!&ndash;                        v-for="(value, key) in anime"&ndash;&gt;-->
<!--                    &lt;!&ndash;                        v-if="key.startsWith('genres_')"&ndash;&gt;-->
<!--                    &lt;!&ndash;                        :key="key"&ndash;&gt;-->
<!--                    &lt;!&ndash;                        class="badge bg-secondary me-1"&ndash;&gt;-->
<!--                    &lt;!&ndash;                    >&ndash;&gt;-->
<!--                    &lt;!&ndash;                        {{ value }}&ndash;&gt;-->
<!--                    &lt;!&ndash;                    </span>&ndash;&gt;-->
<!--                </p>-->
<!--                <p><strong>Статус:</strong> {{ anime.status }}</p>-->
<!--                <p><strong>Сезон:</strong> {{ anime.season }}</p>-->
<!--                <p>-->
<!--                    <strong>Тип:</strong> {{ anime.typeString }} — {{ anime.typeEpisodes }} эп. по-->
<!--                    {{ anime.typeLength }} мин.-->
<!--                </p>-->
<!--                <p><strong>В избранном у:</strong> {{ anime.in_favorites }} пользователей</p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</template>
