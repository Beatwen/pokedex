<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";


const props = defineProps({
    types: Object,
});
const assetURL = computed(() => `/storage/${props.types.image}`);

</script>

<template>
    <div class="flex flex-col">
        <div
            class="font-custom font-bold text-gray-800 flex items-center text-l w-full mt-0.5"
        >
        <div class="font-custom ml-2 flex justify-start">Type : {{ types.name }}</div>
            <div class="font-custom ml-auto flex justify-end pr-8">Couleur : {{ types.color }}</div>
        </div>
        <div class="flex justify-center items-center pb-5">
            <img :src="assetURL" alt="{{type.image}}">
        </div>
    </div>
</template>
