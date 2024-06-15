<script setup>
import { Head, Link, usePage, useForm } from "@inertiajs/vue3";
import {} from "@inertiajs/vue3";
import TypeCard from "@/Components/TypeCard.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
const props = defineProps({
    types: Object,
});
console.log(props.types);
const form = useForm({
    name: props.types.name,
    color: props.types.color,
    image: props.types.image,
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
            @submit.prevent="form.post(route('types.update', types))"
            class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md"
        >
            <div class="mb-4">
                <label
                    for="name"
                    class="block text-sm font-medium text-gray-700"
                    >Nom du Type</label
                >
                <input
                    types="text"
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
                    for="color"
                    class="block text-sm font-medium text-gray-700"
                    >Couleur</label
                >
                <input
                    type="color"
                    id="color"
                    v-model="form.color"
                    class="block w-full px-3 py-10 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Entrez la couleur"
                />
                <p class="mt-2 text-sm text-red-600" v-if="form.errors.color">
                    {{ form.errors.color }}
                </p>
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
                types="submit"
                :disabled="form.processing"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
            >
                Modifier
            </button>
        </form>
        <div class="flex w-full justify-center">
            <TypeCard :types="types"></TypeCard>
        </div>
    </AuthenticatedLayout>
</template>
