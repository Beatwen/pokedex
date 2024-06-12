<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import PokemonCard from '@/Components/PokemonCard.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
const { pokemons } = usePage().props;

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}

</script>
<template>
    <Head title="Index" />
    <AuthenticatedLayout>
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div
                class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
            >
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

                    <main class="flex">
                        <div class="flex w-full">
                            <ul class="grid sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-8">
                            <li v-for="poke in pokemons" :key="poke.id">
                                <PokemonCard :pokemon="poke"></PokemonCard>
                            </li>
                            </ul>
                        </div>
                    </main>

                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Ceci est mon footer
                    </footer>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
