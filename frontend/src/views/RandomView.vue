<script setup>
import axios from 'axios'
import { ref, onMounted, watch } from 'vue'
import Hls from 'hls.js'

const videoRef = ref(null)
const selectedURL = ref('')
const BASE_URL = 'https://api.anilibria.tv'

const randomAnime = ref([])
const playerAnime = ref([])

const getFullPoster = (url) =>
    url ? `https://anilibria.tv${url}` : 'https://via.placeholder.com/300x450?text=Нет+постера'

// Загружаем случайное аниме и список эпизодов
onMounted(async () => {
    try {
        const response = await axios.get(`${BASE_URL}/v3/title/random`)
        randomAnime.value = [response.data]
        const episodes = response.data.player
        playerAnime.value = Object.values(episodes.list)
        console.log(response.data.player)
        // Автоматически запустить первый эпизод
        if (playerAnime.value.length > 0) {
            playEpisode(playerAnime.value[0])
        }
    } catch (error) {
        console.error(error)
    }
})

// Функция воспроизведения серии
const playEpisode = (ep) => {
    // Собираем полный URL для HLS
    const partialUrl = ep.hls?.hd || ep.hls?.sd
    if (partialUrl) {
        // Добавляем домен, если ссылка начинается с /
        const fullUrl = partialUrl.startsWith('http')
            ? partialUrl
            : 'https://vk.anilib.moe' + partialUrl
        selectedURL.value = fullUrl
        console.log(selectedURL.value)
    } else {
        console.warn('Нет HLS ссылки для этой серии', ep)
    }
}

// Следим за изменением URL и запускаем плеер
watch(
    selectedURL,
    (newUrl) => {
        const video = videoRef.value
        if (!video || !newUrl) return

        if (Hls.isSupported()) {
            const hls = new Hls()
            hls.loadSource(newUrl)
            hls.attachMedia(video)
            hls.on(Hls.Events.MANIFEST_PARSED, () => {
                video.play()
            })
        } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
            video.src = newUrl
            video.play()
        }
    },
    { immediate: true }
)

</script>

<template>
    <div
        v-for="anime in randomAnime"
        :key="anime.id"
        class="position-relative text-white"
        :style="`background-image: url('${getFullPoster(anime.posters.original.url)}'); background-size: cover; background-position: center; min-height: 100vh;`"
    >
        <div
            class="position-absolute top-0 start-0 w-100 h-100"
            style="background: rgba(0,0,0,0.6); backdrop-filter: blur(5px); z-index: 1;"
        ></div>

        <div class="container py-5 position-relative" style="z-index: 2;">
            <div class="row align-items-center">
                <div class="col-md-4 mb-3 text-center">
                    <img
                        :src="getFullPoster(anime.posters.medium.url)"
                        :alt="anime.names.ru || 'Постер'"
                        class="img-fluid rounded shadow"
                    />
                </div>

                <div class="col-md-8">
                    <h2>
                        {{ anime.names.ru }}
                        <small class="text-muted">({{ anime.names.en }})</small>
                    </h2>
                    <p><strong>Альтернативное название:</strong> {{ anime.names.alternative }}</p>
                    <p><strong>Описание:</strong> {{ anime.description }}</p>
                    <p><strong>Жанры:</strong> {{ anime.genres.join(', ') }}</p>
                    <p><strong>Статус:</strong> {{ anime.status.string }}</p>
                    <p><strong>Сезон:</strong> {{ anime.season.string }} - {{ anime.season.year }}</p>
                    <p><strong>Тип:</strong> {{ anime.type.full_string }}</p>
                    <p><strong>В избранном у:</strong> {{ anime.in_favorites }} пользователей</p>
                </div>
            </div>

            <div class="mb-3">
                <button
                    v-for="ep in playerAnime"
                    :key="ep.uuid"
                    class="btn btn-outline-light m-1"
                    @click="playEpisode(ep)"
                >
                    Серия {{ ep.episode }}
                </button>
            </div>

            <div>
                <video ref="videoRef" controls style="width: 100%; max-height: 500px;"></video>
            </div>
        </div>
    </div>
</template>
