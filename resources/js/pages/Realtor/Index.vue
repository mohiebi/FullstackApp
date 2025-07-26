<template>
    <h1 class="text-3xl mb-4">Your Listings</h1>
    <section>
        <RealtorFilters :filters="filters" />
    </section>
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
        <Box v-for="listing in listings.data" :key="listing.id" :class="{ 'border-dashed': listing.deleted_at }">
            <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
                <div :class="{ 'opacity-25': listing.deleted_at }">
                    <div class="xl:flex items-center gap-2">
                        <Price :price="listing.price" class="text-2xl font-medium" />
                        <ListingSpace :listing="listing" />
                    </div>

                    <ListingAddress :listing="listing" />
                </div>
                <section>
                    <div class="flex items-center gap-1 text-gray-600 dark:text-gray-300">
                        <a class="btn-outline text-xs font-medium"
                            :href="route('listing.show', { listing: listing.id })" target="_blank">Preview</a>
                        <Link class="btn-outline text-xs font-medium"
                            :href="route('realtor.listing.edit', { listing: listing.id })">
                        Edit
                        </Link>

                        <Link v-if="!listing.deleted_at" class="btn-outline text-xs font-medium"
                            :href="route('realtor.listing.destroy', { listing: listing.id })" as="button"
                            method="delete">
                        Delete
                        </Link>

                        <Link v-else class="btn-outline text-xs font-medium"
                            :href="route('realtor.listing.restore', listing)" as="button" method="put">
                        Restore
                        </Link>
                    </div>

                    <div class="mt-2">
                        <Link :href="route('realtor.listing.image.create', listing)"
                            class="block w-full btn-outline text-xs font-medium text-center">Images</Link>
                    </div>
                </section>
            </div>
        </Box>
    </section>
    <section v-if="listings.data.length" class="w-full flex justify-center mt-4 mb-4">
        <Pagination :links="listings.links" />
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
import Pagination from '@/components/ui/Pagination.vue';

defineOptions({ layout: MainLayout });

defineProps({
    listings: Object,
    filters: Object,
});
</script>
