<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { ref } from "vue";

const props = defineProps({
    types: Object,
});

const form = useForm({
    name: null,
    weight: null,
    height:null,
    attack: null,
    life: null,
    type_id: null,
    type_id2: null,
    image: null,
});

// message pour montrer si le formulaire est bien passé

const successMessage = ref('');
const submitForm = async () => {
    await form.post(route('pokemon.create'), {
        onSuccess: () => {
            successMessage.value = 'Pokemon enregistré avec succès';
        },
        onError: () => {
            successMessage.value = 'Pokemon non enregistré, veuillez réessayer';
        }
    });
};

</script>
<template>
    <Head title="Index" />
    <AuthenticatedLayout>
        <form
            @submit.prevent="submitForm"
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
                    type="number"
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
                <label for="vie" class="block text-sm font-medium text-gray-700"
                    >PV</label
                >
                <input
                    type="number"
                    id="life"
                    v-model="form.life"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Entrez le poids"
                />
                <p class="mt-2 text-sm text-red-600" v-if="form.errors.life">
                    {{ form.errors.life }}
                </p>
            </div>
            <div>
                <label
                    for="image"
                    class="block text-sm font-medium text-gray-700"
                    >Type(s)</label
                >

            <select
                id="type_id"
                name="type_id"
                v-model="form.type_id"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            >
                <option disabled value="">Selectionner un type</option>
                <option v-for="type in types" :key="type.id" :value="type.id">
                    {{ type.name }}
                </option>
            </select>
            </div>
            <div>
                <label
                    for="image"
                    class="block text-sm font-medium text-gray-700"
                    >Type(s)</label
                >

            <select
                id="type_id2"
                name="type_id2"
                v-model="form.type_id2"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            >
                <option disabled value="">Selectionner un type</option>
                <option v-for="type in types" :key="type.id" :value="type.id">
                    {{ type.name }}
                </option>
            </select>
            </div>
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
                id="submit"
                :disabled="form.processing"
                name="submit"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
            >
                Créer
            </button>
            <p class="mt-4 text-sm text-green-600" v-if="successMessage">{{ successMessage }}</p>
        </form>
    </AuthenticatedLayout>
</template>
