<script setup>
import { Head, Link } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import PokemonCard from '@/Components/PokemonCard.vue';
const props = defineProps({
    pokemon: Object,
});





function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}

</script>

<template>
    <Head title="Index" />
    <GuestLayout>
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div
                class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
            >
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

                    <main class="flex">
                        <div class="flex w-full">
                                <PokemonCard :pokemon="poke"></PokemonCard>
                        </div>
                    </main>

                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Ceci est mon footer
                    </footer>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

