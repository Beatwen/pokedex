<script setup>
import { Head, Link } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { usePage } from '@inertiajs/vue3';
const { pokemons } = usePage().props;
import { useForm } from '@inertiajs/vue3';
const form = useForm({});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Index" />
    <GuestLayout>
        <main class="flex flex-col items-center w-full mt-8">
            <div class="w-full max-w-4xl px-4 py-3 bg-white shadow-md rounded-lg">
                <table class="w-full text-sm text-gray-700">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left font-medium border-b-2">Nom</th>
                            <th class="px-6 py-3 text-left font-medium border-b-2">Dégats</th>
                            <th class="px-6 py-3 text-left font-medium border-b-2">Date de création</01></th>
                            <th class="px-6 py-3 text-left font-medium border-b-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="pokemon in pokemons" :key="pokemon.id"
                            class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4">{{ pokemon.name }}</td>
                            <td class="px-6 py-4">{{ pokemon.weight }}</td>
                            <td class="px-6 py-4">{{ pokemon.created_at }}</td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-3">
                                    <a :href="route('pokemon.edit', pokemon)" class="text-blue-500 hover:text-blue-700">
                                        <i class="ri-edit-line"></i>
                                    </a>
                                    <form @submit.prevent="form.delete(route('pokemon.delete', pokemon))">
                                        <button type="submit" class="text-red-500 hover:text-red-700" :disabled="form.processing">
                                            <i class="ri-delete-bin-2-line"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <form @submit.prevent="form.get(route('pokemon.create'))" class="w-full max-w-4xl px-4 py-3 mt-4 bg-white shadow-md rounded-lg">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Créer un Pokémon</button>
                </form>
            </div>

        </main>
        <footer class="py-16 text-center text-sm text-black dark:text-white/70">
            Ceci est mon footer
        </footer>
    </GuestLayout>
</template >
