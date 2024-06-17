<script setup>
import { ref } from 'vue';
import NavLink from '@/Components/NavLink.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link, useForm } from "@inertiajs/vue3";
const form = useForm({});

</script>

<template>
    <div>
        <div class=" bg-gray-100 dark:bg-gray-900 flex flex-col min-h-screen">
            <nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
                <div class="px-4 sm:px-6 lg:px-8">
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
            <main class="flex-grow">
                <slot />
            </main>
            <footer class="bg-gray-800 p-4">
                <div class="container mx-auto flex items-center justify-between">
                    <div class="text-white text-lg">
                        A really cool website for Pokémon creators!
                    </div>
                    <a href="https://github.com/beatwen" class="flex items-center text-white hover:text-gray-300">
                        <svg class="w-6 h-6 mr-2 fill-current" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 0C5.373 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.085 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.332-5.467-5.93 0-1.311.469-2.381 1.236-3.221-.124-.303-.536-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.655 1.652.243 2.873.119 3.176.77.84 1.234 1.91 1.234 3.221 0 4.61-2.807 5.624-5.479 5.92.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.565 21.795 24 17.298 24 12c0-6.627-5.373-12-12-12z"/>
                        </svg>
                        Visit on GitHub
                    </a>
                </div>
            </footer>

        </div>
    </div>
</template>

