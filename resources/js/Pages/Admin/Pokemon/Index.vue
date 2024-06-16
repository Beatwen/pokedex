<script setup>
import { Head } from '@inertiajs/vue3';
import { usePage, useForm  } from '@inertiajs/vue3';
const { pokemons } = usePage().props;
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import AdminTables from '@/Components/AdminTables.vue';
const form = useForm({});

</script>

<template>
    <Head title="Index" />
    <AuthenticatedLayout>
        <main class="flex flex-col items-center w-full mt-8">
            <div class="w-full max-w-4xl px-4 py-3 bg-white shadow-md rounded-lg">
                <AdminTables :propsObject="pokemons" objectName="pokemon"></AdminTables>
                <form @submit.prevent="form.get(route('pokemon.create'))" class="w-full max-w-4xl px-4 py-3 mt-4 bg-white shadow-md rounded-lg">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Créer un Pokémon</button>
                </form>
            </div>

        </main>
        <footer class="py-16 text-center text-sm text-black dark:text-white/70">
            Ceci est mon footer
        </footer>
    </AuthenticatedLayout>
</template >
