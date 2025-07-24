<template>
    <h1 class="text-3xl mb-4">Your Listings</h1>
    <section class="mb-8">
        <RealtorFilters :filters="filters" />
    </section>
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
        <Box v-for="listing in listings" :key="listing.id">
            <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
                <div>
                    <div class="xl:flex items-center gap-2">
                        <Price :price="listing.price" class="text-2xl font-medium" />
                        <ListingSpace :listing="listing" />
                    </div>

                    <ListingAddress :listing="listing" />
                </div>
                <div class="flex items-center gap-1 text-gray-600 dark:text-gray-300">
                    <Link class="btn-outline text-xs font-medium">Preview</Link>
                    <Link class="btn-outline text-xs font-medium">Edit</Link>
                    <Link class="btn-outline text-xs font-medium" :href="route('realtor.listing.destroy', listing)"
                        as="button" method="delete">Delete</Link>
                </div>
            </div>
        </Box>
    </section>
</template>

<script setup>
import Box from '@/components/ui/Listings/Box.vue';
import ListingAddress from '@/components/ui/Listings/ListingAddress.vue'
import ListingSpace from '@/components/ui/Listings/ListingSpace.vue';
import Price from '@/components/ui/Listings/Price.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import { Link } from '@inertiajs/vue3'
import RealtorFilters from './components/RealtorFilters.vue';
defineProps({
    listings: Array,
    filters: Object,
});
</script>

<script>
export default {
    layout: MainLayout
}
</script>