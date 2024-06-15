<script setup>
import { useForm } from '@inertiajs/vue3';
import { formatDistance } from 'date-fns';
import { fr } from 'date-fns/locale';
const diffForHumans = (date) => {
    return formatDistance(new Date(date), new Date(), { addSuffix: true, locale: fr});
}
const form = useForm({});
const props = defineProps({
    propsObject: Object,
});
console.log(props.propsObject);
</script>

<template>
    <table class="w-full text-sm text-gray-700">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left font-medium border-b-2">Nom</th>
                <th class="px-6 py-3 text-left font-medium border-b-2">
                    Images associées
                </th>
                <th class="px-6 py-3 text-left font-medium border-b-2">
                    Date de création
                </th>
                <th class="px-6 py-3 text-left font-medium border-b-2">
                    Date de modification
                </th>
                <th class="px-6 py-3 text-left font-medium border-b-2">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            <tr
                v-for="propsObject in props.propsObject"
                :key="props.propsObject.id"
                class="border-b hover:bg-gray-50"
            >
                <td class="px-6 py-4">{{ propsObject.name }}</td>
                <td class="px-6 py-4">{{ propsObject.image }}</td>
                <td class="px-6 py-4">{{ diffForHumans(propsObject.created_at) }}</td>
                <td class="px-6 py-4">{{ diffForHumans(propsObject.updated_at) }}</td>
                <td class="px-6 py-4">
                    <div class="flex space-x-3">
                        <a
                            :href="route('types.edit', propsObject)"
                            class="text-blue-500 hover:text-blue-700"
                        >
                            <i class="ri-edit-line"></i>
                        </a>
                        <form
                            @submit.prevent="
                                form.delete(route('types.delete', propsObject))
                            "
                        >
                            <button
                                propsObject="submit"
                                class="text-red-500 hover:text-red-700"
                                :disabled="form.processing"
                            >
                                <i class="ri-delete-bin-2-line"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>
