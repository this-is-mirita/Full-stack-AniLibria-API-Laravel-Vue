<script setup>

import AnimeSeasonComponent from "@/components/StartPage/AnimeSeasonComponent.vue";
</script>

<template>
    <!-- Контент -->
    <main class="flex-1">
        <section class="bg-white p-4 rounded shadow mb-4">
            <anime-season-component></anime-season-component>
        </section>

        <!-- Список карточек аниме -->
        <section>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-white rounded shadow p-4" >
                    <div class="flex justify-between mb-2">
                        <h3 class="text-lg font-semibold">title</h3>
                        <span class="text-sm font-bold">rating</span>
                    </div>
                    <p class="text-sm text-gray-700">description</p>
                </div>
            </div>
        </section>
    </main>
</template>

<style scoped>

</style>
