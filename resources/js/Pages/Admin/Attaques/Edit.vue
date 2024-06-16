<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
    attaques: Object,
    types: Array,
});
console.log(props.attaques);
const form = useForm({
    name: props.attaques.name,
    power: props.attaques.power,
    category: props.attaques.category,
    accuracy: props.attaques.accuracy,
    type_id: props.attaques.type_id,
    type_id2: props.attaques.type_id2,
    pp: props.attaques.pp,
    probability: props.attaques.probability,
    description: props.attaques.description,
});

function handleImageError() {
    document.getElementById("screenshot-container")?.classList.add("!hidden");
    document.getElementById("docs-card")?.classList.add("!row-span-1");
    document.getElementById("docs-card-content")?.classList.add("!flex-row");
    document.getElementById("background")?.classList.add("!hidden");
}
</script>

<template>
    <Head title="Edit Attack" />
    <AuthenticatedLayout>
        <form
            @submit.prevent="form.post(route('attaques.update', attaques.id))"
            class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md"
        >
            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                <input
                    type="text"
                    id="name"
                    v-model="form.name"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Enter attaques name"
                />
            </div>

            <!-- Power -->
            <div class="mb-4">
                <label for="power" class="block text-sm font-medium text-gray-700">Dégats</label>
                <input
                    type="number"
                    id="power"
                    v-model="form.power"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Enter power"
                />
            </div>

            <!-- Category -->
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">Categorie</label>
                <input
                    type="text"
                    id="category"
                    v-model="form.category"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Enter category"
                />
            </div>

            <!-- Accuracy -->
            <div class="mb-4">
                <label for="accuracy" class="block text-sm font-medium text-gray-700">Précision</label>
                <input
                    type="number"
                    id="accuracy"
                    v-model="form.accuracy"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Enter accuracy"
                />
            </div>

            <!-- Type ID -->
            <div class="mb-4">
                <label for="type_id" class="block text-sm font-medium text-gray-700">Type</label>
                <select
                    id="type_id"
                    v-model="form.type_id"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                >
                    <option disabled value="">Select a type</option>
                    <option v-for="type in types" :key="type.id" :value="type.id">{{ type.name }}</option>
                </select>
            </div>

            <!-- PP -->
            <div class="mb-4">
                <label for="pp" class="block text-sm font-medium text-gray-700">PP</label>
                <input
                    type="number"
                    id="pp"
                    v-model="form.pp"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Enter PP"
                />
            </div>

            <!-- Probability -->
            <div class="mb-4">
                <label for="probability" class="block text-sm font-medium text-gray-700">Probabilité</label>
                <input
                    type="number"
                    id="probability"
                    v-model="form.probability"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Enter probability"
                />
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea
                    id="description"
                    v-model="form.description"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Enter a description"
                ></textarea>
            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                :disabled="form.processing"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
            >
                Modifier
            </button>
        </form>
    </AuthenticatedLayout>
</template>


