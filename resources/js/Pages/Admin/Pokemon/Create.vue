<script setup>
import { Head, Link, usePage, useForm } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { ref } from "vue";
import {} from "@inertiajs/vue3";
import PokemonCard from "@/Components/PokemonCard.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
    types: Object,
});
console.log(props.types);

const form = useForm({
    name: null,
    weight: null,
    attack: null,
    life: null,
    type_id: null,
    image: null,
});

function handleImageError() {
    document.getElementById("screenshot-container")?.classList.add("!hidden");
    document.getElementById("docs-card")?.classList.add("!row-span-1");
    document.getElementById("docs-card-content")?.classList.add("!flex-row");
    document.getElementById("background")?.classList.add("!hidden");
}
</script>
<template>
    <Head title="Index" />
    <AuthenticatedLayout>
        <form
            @submit.prevent="form.post(route('pokemon.create', pokemon))"
            class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md"
        >
            <div class="mb-4">
                <label
                    for="name"
                    class="block text-sm font-medium text-gray-700"
                    >Nom du Pokémon</label
                >
                <input
                    type="text"
                    id="name"
                    v-model="form.name"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Entrez le nom"
                />
                <p class="mt-2 text-sm text-red-600" v-if="form.errors.name">
                    {{ form.errors.name }}
                </p>
            </div>

            <div class="mb-6">
                <label
                    for="weight"
                    class="block text-sm font-medium text-gray-700"
                    >Poids</label
                >
                <input
                    type="text"
                    id="weight"
                    v-model="form.weight"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Entrez le poids"
                />
                <p class="mt-2 text-sm text-red-600" v-if="form.errors.weight">
                    {{ form.errors.weight }}
                </p>
            </div>
            <div class="mb-6">
                <label for="vie" class="block text-sm font-medium text-gray-700"
                    >PV</label
                >
                <input
                    type="text"
                    id="life"
                    v-model="form.life"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Entrez le poids"
                />
                <p class="mt-2 text-sm text-red-600" v-if="form.errors.life">
                    {{ form.errors.life }}
                </p>
            </div>
            <select
                id="type_id"
                v-model="form.type_id"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            >
                <option disabled value="">Select a type</option>
                <option v-for="type in types" :key="type.id" :value="type.id">
                    {{ type.name }}
                </option>
            </select>

            <div>
                <label
                    for="image"
                    class="block text-sm font-medium text-gray-700"
                    >Image</label
                >
                <input
                    type="file"
                    id="image"
                    @input="form.image = $event.target.files[0]"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Entrez l'image"
                />
                <progress
                    v-if="form.progress"
                    :value="form.progress.percentage"
                    max="100"
                >
                    {{ form.progress.percentage }}%
                </progress>
                <p class="mt-2 text-sm text-red-600" v-if="form.errors.image">
                    {{ form.errors.image }}
                </p>
            </div>
            <button
                type="submit"
                :disabled="form.processing"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
            >
                Créer
            </button>
        </form>
    </AuthenticatedLayout>
</template>
