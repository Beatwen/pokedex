<script setup>
import { ref } from 'vue';
import NavLink from '@/Components/NavLink.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link, useForm } from "@inertiajs/vue3";
const form = useForm({});

</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
                <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16">
                        <div class="flex w-full">
                            <!-- Logo -->
                            <div class="flex items-center space-x-10">
                                <Link :href="route('index')">
                                    <ApplicationLogo
                                        class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200"
                                    />
                                </Link>
                            </div>
                            <div class="flex justify-between items-center space-x-8 sm:space-x-10 w-full">
                                <div class="flex m-6 space-x-8 sm:space-x-10">
                                    <NavLink :href="route('pokemon.index')" :active="route().current('pokemon.index')">
                                        Pokémon
                                    </NavLink>
                                    <NavLink :href="route('types.index')" :active="route().current('types.index')">
                                        Types
                                    </NavLink>
                                    <NavLink :href="route('attaques.index')" :active="route().current('attaques.index')">
                                        Attaques
                                    </NavLink>
                                </div>
                                <form @submit.prevent="form.post(route('logout'))" method="POST" class="flex items-center justify-end mt-1">
                                    <button
                                        type="submit"
                                        class="text-gray-500 flex justify-end hover:text-gray-700 focus:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300 dark:focus:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:border-gray-300 dark:focus:border-gray-700 border-b-2 border-transparent text-sm font-medium leading-5 transition duration-150 ease-in-out">
                                        Log out
                                    </button>
                                </form>
                            </div>
                        </div>



                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button
                                @click="showingNavigationDropdown = !showingNavigationDropdown"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out"
                            >
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex': !showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex': showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white dark:bg-gray-800 shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>

