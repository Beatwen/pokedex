<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import PokemonCard from '@/Components/PokemonCard.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
const props = defineProps({
    pokemons: Array,
});

const allTypes = computed(() => {
    const typesSet = new Set();
    props.pokemons.forEach(pokemon => {
        pokemon.type.forEach(type => {
            typesSet.add(type.name);
        });
    });
    return Array.from(typesSet);
});

const search = ref('');
const selectedType = ref('');

const filteredPokemons = computed(() => {
    return props.pokemons.filter(pokemon => {
        return pokemon.name.toLowerCase().includes(search.value.toLowerCase()) &&
               (!selectedType.value || pokemon.type[0]?.name.includes(selectedType.value) || pokemon.type[1]?.name.includes(selectedType.value));
    });
});


</script>
<template>
    <Head title="Index" />
    <GuestLayout>
        <div class="bg-gray-50 text-black/50">
            <div
                class="relative min-h-screen flex justify-center selection:bg-[#FF2D20] selection:text-white"
            >
                <div class="">
                    <div class="py-4 flex justify-center">
                        <input type="text" v-model="search" placeholder="Recherche..." class="w-auto border p-2 mr-2">
                        <select name="search_type" id="search_type" v-model="selectedType" class="w-52 border p-2">
                            <option value="">Tous</option>
                            <option v-for="type in allTypes" :key="type.id">{{ type }}</option>
                        </select>
                    </div>
                    <main class="flex w-full">
                        <div class="flex w-full">
                            <ul class="grid sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-8 w-full">
                                <li v-for="poke in filteredPokemons" :key="poke.id">
                                    <PokemonCard :pokemon="poke"></PokemonCard>
                                </li>
                            </ul>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
