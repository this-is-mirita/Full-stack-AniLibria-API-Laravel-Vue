<script setup>

</script>

<template>
    <!-- Контент -->
    <main class="flex-1">
        <section class="bg-white p-4 rounded shadow mb-4">
            <h2 class="text-xl font-bold mb-2">Аниме сериалы</h2>
            <p class="text-sm text-gray-600">
                Аниме сериалы бывают умопомрачительно смешными (комедийные)...
            </p>
        </section>

        <!-- Список карточек аниме -->
        <section>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-white rounded shadow p-4" v-for="anime in animeList" :key="anime.id">
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
