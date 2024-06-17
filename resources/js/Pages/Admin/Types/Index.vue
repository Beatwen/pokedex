<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import AdminTables from '@/Components/AdminTables.vue';

const form = useForm({});
const props = defineProps({
    types: Object,
});
console.log(props.types);

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Index" />
    <AuthenticatedLayout>
        <main class="flex flex-col items-center w-full mt-8">
            <div class="w-full max-w-4xl px-4 py-3 bg-white shadow-md rounded-lg">
                <AdminTables :propsObject="props.types" objectName="types"></AdminTables>
                <form @submit.prevent="form.get(route('types.create'))" class="w-full max-w-4xl px-4 py-3 mt-4 bg-white shadow-md rounded-lg">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Créer un type de pokémon</button>
                </form>
            </div>
        </main>
    </AuthenticatedLayout>
</template >
