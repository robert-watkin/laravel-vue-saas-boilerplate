<script setup>
import { ref } from 'vue';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import { router } from '@inertiajs/vue3';

const logout = () => {
    router.post(route('logout'));
};

const isMobileMenuOpen = ref(false);

const toggleMobileMenu = () => {
    isMobileMenuOpen.value = !isMobileMenuOpen.value;
};
</script>

<template>
    <nav class="w-screen bg-base-100 z-10">
        <div class="navbar max-w-7xl mx-auto bg-base-100 flex justify-between items-center">
            <a href="/" class="btn btn-ghost normal-case text-xl">
                <div class="flex items-center">
                    <ApplicationMark class="block h-9 w-auto" />
                    <p class="text-xl ml-2">{{ $page.props.appName }}</p>
                </div>
            </a>
            <div class="hidden md:flex">
                <ul class="menu menu-horizontal px-1">
                    <li><a :href="route('welcome')">Home</a></li>
                    <li><a href="/#pricing">Pricing</a></li>
                    <li v-if="$page.props.user">
                        <details>
                            <summary>
                                Account
                            </summary>
                            <ul class="p-2 bg-base-100 rounded-t-none">
                                <li><a :href="route('dashboard')">Dashboard</a></li>
                                <li><a :href="route('profile.show')">Profile</a></li>
                                <li><a @click.prevent="logout">Logout</a></li>
                            </ul>
                        </details>
                    </li>
                    <li v-else>
                        <a :href="route('login')">Login</a>
                    </li>
                </ul>
            </div>
            <div class="md:hidden flex items-center">
                <button @click="toggleMobileMenu" class="btn btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
        <div v-if="isMobileMenuOpen" class="md:hidden">
            <ul class="menu menu-vertical px-2">
                <li><a :href="route('welcome')">Home</a></li>
                <li><a href="/#pricing">Pricing</a></li>
                <li v-if="$page.props.user">
                    <details>
                        <summary>
                            Account
                        </summary>
                        <ul class="p-2 bg-base-100 rounded-t-none">
                            <li><a :href="route('dashboard')">Dashboard</a></li>
                            <li><a :href="route('profile.show')">Profile</a></li>
                            <li><a @click.prevent="logout">Logout</a></li>
                        </ul>
                    </details>
                </li>
                <li v-else>
                    <a :href="route('login')">Login</a>
                </li>
            </ul>
        </div>
    </nav>
</template>
