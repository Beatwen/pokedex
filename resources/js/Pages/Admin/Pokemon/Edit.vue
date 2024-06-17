<script setup>
import { Head, Link, usePage, useForm } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { computed } from "vue";
import {} from "@inertiajs/vue3";
import PokemonCard from "@/Components/PokemonCard.vue";
const props = defineProps({
    pokemon: Object,
    types: Array,
    attaques: Array,
});

const availableAttaques = computed(() => {
    return props.attaques.filter(
        (attaque) =>
            !props.pokemon.attaque.some(
                (pokemonAttaque) => pokemonAttaque.id === attaque.id
            )
    );
});

const typePoke2 =
    props.pokemon.type.length > 1 ? props.pokemon.type[1].id : null;

const form = useForm({
    name: props.pokemon.name,
    life: props.pokemon.life,
    weight: props.pokemon.weight,
    height: props.pokemon.height,
    type_id: props.pokemon.type[0].id,
    type_id2: typePoke2,
    image: props.pokemon.image,
    description: props.pokemon.description,
});
const addAttaqueForm = useForm({
    attaque_id: null,
});

const removeAttaqueForm = useForm({
    attaque_id: null,
});

function addAttaque(attaqueId) {
    addAttaqueForm.attaque_id = attaqueId;
    addAttaqueForm.post(
        route("pokemon.addAttaque", { pokemon: props.pokemon.id })
    );
}

function removeAttaque(attaqueId) {
    removeAttaqueForm.attaque_id = attaqueId;
    removeAttaqueForm.delete(
        route("pokemon.removeAttaque", { pokemon: props.pokemon.id })
    );
}

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
        <div class="flex flex-col md:flex-row w-full items-center">
            <form
                @submit.prevent="form.post(route('pokemon.update', pokemon))"
                class="w-full md:w-1/3 mx-auto m-6 ml-6 p-6 bg-white rounded-lg shadow-md"
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
                    <p
                        class="mt-2 text-sm text-red-600"
                        v-if="form.errors.name"
                    >
                        {{ form.errors.name }}
                    </p>
                </div>
                <div class="mb-6">
                    <label
                        for="weight"
                        class="block text-sm font-medium text-gray-700"
                        >Point de vie</label
                    >
                    <input
                        type="text"
                        id="weight"
                        v-model="form.life"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="Entrez les point de vies"
                    />
                    <p
                        class="mt-2 text-sm text-red-600"
                        v-if="form.errors.life"
                    >
                        {{ form.errors.life }}
                    </p>
                </div>
                <div class="mb-6">
                <label
                    for="height"
                    class="block text-sm font-medium text-gray-700"
                    >Taille</label
                >
                <input
                    type="number"
                    id="height"
                    v-model="form.height"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Entrez la taille"
                />
                <p class="mt-2 text-sm text-red-600" v-if="form.errors.height">
                    {{ form.errors.height }}
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
                    <p
                        class="mt-2 text-sm text-red-600"
                        v-if="form.errors.weight"
                    >
                        {{ form.errors.weight }}
                    </p>
                </div>
                <div class="mb-6">
                    <label
                        for="image"
                        class="block text-sm font-medium text-gray-700"
                        >Type 1</label
                    >
                    <select
                        id="type_id"
                        v-model="form.type_id"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    >
                        <option disabled value="">Selectionner un type</option>
                        <option
                            v-for="type in types"
                            :key="type.id"
                            :value="type.id"
                        >
                            {{ type.name }}
                        </option>
                    </select>
                </div>

                <div class="mb-6">
                    <label
                        for="image"
                        class="block text-sm font-medium text-gray-700"
                        >Type 2</label
                    >

                    <select
                        id="type_id"
                        v-model="form.type_id2"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    >
                        <option disabled value="">Selectionner un type</option>
                        <option
                            v-for="type in types"
                            :key="type.id"
                            :value="type.id"
                        >
                            {{ type.name }}
                        </option>
                    </select>
                </div>

                <div class="mb-4">
                    <label
                        for="description"
                        class="block text-sm font-medium text-gray-700"
                        >Description</label
                    >
                    <textarea
                        id="description"
                        v-model="form.description"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="Enter a description"
                    ></textarea>
                </div>

                <div class="mb-6">
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
                    <p
                        class="mt-2 text-sm text-red-600"
                        v-if="form.errors.image"
                    >
                        {{ form.errors.image }}
                    </p>
                </div>
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                >
                    Modifier
                </button>
            </form>
            <div class="w-1/3 flex justify-center">
                <PokemonCard :pokemon="pokemon"></PokemonCard>
            </div>

            <div class="w-full md:w-1/3 mx-auto m-6 ml-6 p-6 bg-white rounded-lg shadow-md">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                    Modifier les attaques de {{ pokemon.name }}
                </h3>
                <div>
                    <div class="my-2 mb-4 block text-m font-medium text-gray-700">
                        <div class="mb-4 block text-m font-medium text-gray-700">Attaques actuelles:</div>
                        <ul>
                            <li
                                v-for="attaque in pokemon.attaque"
                                :key="attaque.id" class="flex justify-between items-center m-6"
                            >
                                {{ attaque.name }}
                                <button
                                    @click="removeAttaque(attaque.id)"
                                    class="ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded flex flex-row justify-end"
                                >
                                    Retirer
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="my-2 mb-4 block text-sm font-medium text-gray-700">
                        <div class="mb-4 block text-m font-medium text-gray-700">Ajouter une attaque:</div>
                        <div>
                            <button
                                v-for="attaque in availableAttaques"
                                :key="attaque.id"
                                @click="addAttaque(attaque.id)"
                                class="bg-green-500 hover:bg-green-700 py-1 px-2 rounded m-1 block text-sm font-medium text-gray-700"
                            >
                                {{ attaque.name }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
