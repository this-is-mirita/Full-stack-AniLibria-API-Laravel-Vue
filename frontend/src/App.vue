<script setup>
import { RouterLink, RouterView } from 'vue-router'
import { ref, onMounted } from 'vue'
import axios from 'axios'
import Hls from 'hls.js'
import HomeView from "@/views/HomeView.vue";
// const video = ref(null)
//
// onMounted(async () => {
//   try {
//     const res = await axios.get('https://api.anilibria.tv/v3/title?id=9000')
//     const player = res.data.player
//
//     if (player && player.list && player.list["1"] && player.list["1"].hls) {
//       const videoSrc = 'https://cache.libria.fun' + player.list["1"].hls.hd
//
//       if (Hls.isSupported()) {
//         const hls = new Hls()
//         hls.loadSource(videoSrc)
//         hls.attachMedia(video.value)
//       } else if (video.value.canPlayType('application/vnd.apple.mpegurl')) {
//         video.value.src = videoSrc
//       } else {
//         console.error('HLS не поддерживается в этом браузере')
//       }
//     } else {
//       console.error('Видео с HLS не найдено в ответе')
//     }
//   } catch (err) {
//     console.error('Ошибка запроса', err)
//   }
// })

</script>

<template>
  <home-view></home-view>
</template>
