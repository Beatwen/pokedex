<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";


const props = defineProps({
    pokemon: Object,
});


const assetURL = computed(() => `/storage/${props.pokemon.image}`);
const assetBackgroundURL = computed(() => `/storage/images/background/${props.pokemon.type[0].name}.png`);

</script>

<template>
    <Link
        class="flex flex-col w-64 space-y-2 bg-[url('assetBackgroundURL')] rounded-md shadow-md p-4 m-4 hover:shadow-lg hover:scale-125 transition aspect-custom overflow-hidden"
        :style="{   backgroundImage: 'url(' + assetBackgroundURL + ')',
                    backgroundSize: 'cover',
         }"
        :href="route('pokemon.show', pokemon)
        "
    >
        <div
            class="font-custom font-bold text-gray-800 flex items-center text-l w-full mt-0.5"
        >
        <div class="font-custom ml-2 flex justify-start">{{ pokemon.name }}</div>
            <div class="font-custom ml-auto flex justify-end pr-8 text-shadow-subtle-outline text-red-600">{{ pokemon.life }}HP</div>
        </div>
        <div class="flex justify-center items-center pb-5">
            <img :src="assetURL" alt="{{pokemon.name}}" class="w-pokemon h-pokemon object-cover -mt-1.5">
        </div>
        <div class="flex flex-col justify-center items-center space-y-1">
            <div class="text-gray-800 font-bold text-xs">Poids : {{ pokemon.weight }}</div>
            <div class="text-gray-800 font-bold text-xs">Taille : {{ pokemon.height }}</div>
            <div class="flex text-gray-800 font-bold text-xs"> Type :
                <div v-for="(type, index) in pokemon.type" :key="type.id" class="text-gray-800 font-bold text-xs pl-2">
                     {{ type.name }}<span v-if="index < pokemon.type.length - 1">,</span>
                </div>
            </div>

        </div>
    </Link>
</template>
