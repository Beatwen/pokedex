<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import { formatDistance } from 'date-fns';
import Modal from '@/Components/Modal.vue';
import { fr } from 'date-fns/locale';
const diffForHumans = (date) => {
    return formatDistance(new Date(date), new Date(), { addSuffix: true, locale: fr});
}
const form = useForm({});
const isModalOpen = ref(false);
const currentObject = ref(null);


const props = defineProps({
    propsObject: Object,
    objectName: String,
});

const openModal = (propsObject) => {
    currentObject.value = propsObject;
    isModalOpen.value = true;
    console.log(currentObject.value);
};
const confirmDelete = () => {
    form.delete(route(`${props.objectName}.delete`, currentObject.value));
    isModalOpen.value = false;
};

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
                            :href="route(`${objectName}.edit`, propsObject)"
                            class="text-blue-500 hover:text-blue-700"
                        >
                            <i class="ri-edit-line"></i>
                        </a>
                        <button
                            @click="openModal(propsObject)"
                            class="text-red-500 hover:text-red-700"
                            :disabled="form.processing"
                        >
                            <i class="ri-delete-bin-2-line"></i>
                        </button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>


    <Modal :show="isModalOpen" @close="isModalOpen = false">
        <template #default>
            <div class="p-4">
                <h2 class="text-lg font-bold">Confirmer</h2>
                <p>Es-tu sur de vouloir supprimer cet item ?</p>
                <div class="flex justify-end space-x-4">
                    <button @click="isModalOpen = false" class="px-4 py-2 rounded text-gray-700">Revenir</button>
                    <button @click="confirmDelete" class="px-4 py-2 bg-red-600 text-white rounded">Supprimer</button>
                </div>
            </div>
        </template>
    </Modal>
</template>
