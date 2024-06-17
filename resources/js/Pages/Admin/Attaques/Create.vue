<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
    types: Object,
});

const form = useForm({
    name: null,
    power: null,
    category: null,
    accuracy: null,
    type_id: null,
    pp: null,
    probability: null,
    description: null,
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
            @submit.prevent="form.post(route('attaques.create'))"
            class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md"
        >
            <!-- Nom de l'attaque -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nom de l'attaque</label>
                <input
                    type="text"
                    id="name"
                    v-model="form.name"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Entrez le nom de l'attaque"
                />
                <p class="mt-2 text-sm text-red-600" v-if="form.errors.name">{{ form.errors.name }}</p>
            </div>

            <!-- Puissance -->
            <div class="mb-4">
                <label for="power" class="block text-sm font-medium text-gray-700">Puissance</label>
                <input
                    type="number"
                    id="power"
                    v-model="form.power"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Entrez la puissance de l'attaque"
                />
                <p class="mt-2 text-sm text-red-600" v-if="form.errors.power">{{ form.errors.power }}</p>
            </div>

            <!-- Catégorie -->
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">Catégorie</label>
                <input
                    type="text"
                    id="category"
                    v-model="form.category"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Entrez la catégorie"
                />
                <p class="mt-2 text-sm text-red-600" v-if="form.errors.category">{{ form.errors.category }}</p>
            </div>

            <!-- Précision -->
            <div class="mb-4">
                <label for="accuracy" class="block text-sm font-medium text-gray-700">Précision</label>
                <input
                    type="number"
                    id="accuracy"
                    v-model="form.accuracy"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Entrez la précision"
                />
                <p class="mt-2 text-sm text-red-600" v-if="form.errors.accuracy">{{ form.errors.accuracy }}</p>
            </div>

            <!-- PP (Points de pouvoir) -->
            <div class="mb-4">
                <label for="pp" class="block text-sm font-medium text-gray-700">PP</label>
                <input
                    type="number"
                    id="pp"
                    v-model="form.pp"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Entrez le nombre de PP"
                />
                <p class="mt-2 text-sm text-red-600" v-if="form.errors.pp">{{ form.errors.pp }}</p>
            </div>

            <!-- Type -->
            <div class="mb-4">
                <label for="type_id" class="block text-sm font-medium text-gray-700">Type</label>
                <select
                    id="type_id"
                    v-model="form.type_id"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                >
                    <option disabled value="">Sélectionnez un type</option>
                    <option v-for="type in props.types" :key="type.id" :value="type.id">
                        {{ type.name }}
                    </option>
                </select>
                <p class="mt-2 text-sm text-red-600" v-if="form.errors.type_id">{{ form.errors.type_id }}</p>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea
                    id="description"
                    v-model="form.description"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Entrez une description"
                ></textarea>
                <p class="mt-2 text-sm text-red-600" v-if="form.errors.description">{{ form.errors.description }}</p>
            </div>

            <!-- Probabilité -->
            <div class="mb-4">
                <label for="accuracy" class="block text-sm font-medium text-gray-700">Probabilité</label>
                <input
                    type="number"
                    id="accuracy"
                    v-model="form.probability"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Entrez la probabilité de l'attaque"
                />
                <p class="mt-2 text-sm text-red-600" v-if="form.errors.accuracy">{{ form.errors.accuracy }}</p>
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

