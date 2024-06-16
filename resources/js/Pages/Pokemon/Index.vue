<script setup>
import { Head } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import PokemonCard from "@/Components/PokemonCard.vue";
const props = defineProps({
    pokemon: Object,
});
console.log(props.pokemon);

function handleImageError() {
    document.getElementById("screenshot-container")?.classList.add("!hidden");
    document.getElementById("docs-card")?.classList.add("!row-span-1");
    document.getElementById("docs-card-content")?.classList.add("!flex-row");
    document.getElementById("background")?.classList.add("!hidden");
}
</script>
<template>
    <GuestLayout>
        <div class="flex flex-col items-center w-full mt-8">
            <h1 class="text-4xl font-bold mb-4">{{ pokemon.name }}</h1>
            <!-- Responsive grid setup -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-full px-10">
                <!-- Empty column only on medium screens and above -->
                <div class="hidden md:block"></div>
                <!-- Pokemon card and description center on small screens -->
                <div class="flex flex-col items-center order-2 md:order-none">
                    <PokemonCard :pokemon="pokemon" />
                    <p class="italic text-lg mt-4 w-full mx-auto">“{{ pokemon.description }}”</p>
                </div>
                <!-- Table moves below on small screens, to the right on medium screens -->
                <div class="order-3 md:order-none">
                    <table class="w-full">
                        <tbody>
                            <tr>
                                <th class="text-left font-bold p-2 border-b-2 align-top">Nom</th>
                                <td class="p-2 border-b align-top">{{ pokemon.name }}</td>
                            </tr>
                            <tr>
                                <th class="text-left font-bold p-2 border-b-2 align-top">Vie</th>
                                <td class="p-2 border-b align-top">{{ pokemon.life }}</td>
                            </tr>
                            <tr>
                                <th class="text-left font-bold p-2 border-b-2 align-top">Poids</th>
                                <td class="p-2 border-b align-top">{{ pokemon.weight }}</td>
                            </tr>
                            <tr>
                                <th class="text-left font-bold p-2 border-b-2 align-top">Attaques</th>
                                <td class="p-2 border-b align-top">
                                    <ul class="list-disc list-inside">
                                        <li v-for="attaque in pokemon.attaque" :key="attaque.id">{{ attaque.name }}</li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>



