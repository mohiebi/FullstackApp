<template>
    <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="text-lg font-medium">
                    <Link :href="route('listing.index')">Listings</Link>
                </div>
                <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold text-center">
                    <Link :href="route('listing.index')">Larevel + Vue</Link>
                </div>
                <div v-if="user" class="flex gap-4 items-center">
                     <div class="text-gray-500 relative pr-2 py-2 text-lg">
                        🔔
                        <div class="absolute right-0 top-0 w-5 h-5 bg-red-700 dark:bg-red-400 text-white font-medium border border-white dark:border-gray-900 rounded-full text-xs text-center">
                        {{ notificationCount }}
                        </div>
                    </div>
                    <Link :href="route('realtor.listing.index')">
                        {{ user.name }}
                    </Link>
                    <Link :href="route('realtor.listing.create')" class="btn-primary">+ New Listing</Link>
                    <div>
                        <Link :href="route('logout')" method="POST"> Logout </Link>
                    </div>
                </div>
                <div v-else class=" flex items-center gap-3">
                    <Link :href="route('login')"> Login </Link>
                    <Link :href="route('register')"> Register </Link>
                </div>
            </nav>
        </div>
    </header>

    <main class="container mx-auto p-4 ">
        <div v-if="flashSuccess"
            class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">
            {{ flashSuccess }}
        </div>
        <slot />
    </main>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue'

const page = usePage()
const flashSuccess = computed(() =>
    page.props?.flash?.success ?? null
);
const user = computed(() =>
    page.props?.auth?.user ?? null
);
const notificationCount = computed(
    () => Math.min(page.props?.auth?.user?.notificationCount ?? null , +9)
);
</script>