<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { ref } from "vue";
const form = useForm({
    name: null,
    image: null,
    color: null,
});

// message pour montrer si le formulaire est bien passé

const successMessage = ref('');
const submitForm = async () => {
    await form.post(route('types.create'), {
        onSuccess: () => {
            successMessage.value = 'Type enregistré avec succès';
        },
        onError: () => {
            successMessage.value = 'Type non enregistré, veuillez réessayer';
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
                    >Nom du type de pokémon</label
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
            <div class="mb-4">
                <label
                    for="name"
                    class="block text-sm font-medium text-gray-700"
                    >Couleur</label
                >
                <div>
                    <input type="color" v-model="form.color" />
                </div>
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
                type="submit"
                :disabled="form.processing"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
            >
                Créer
            </button>
            <p class="mt-4 text-sm text-green-600" v-if="successMessage">{{ successMessage }}</p>
        </form>
    </AuthenticatedLayout>
</template>
