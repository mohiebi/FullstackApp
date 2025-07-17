<template>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <Box v-for="listing in listings" :key="listing.id">
            <Link :href="route('listing.show', listing.id)">
                <ListingSpace :listing="listing" class="text-lg" />
                <ListingAddress :listing="listing" class="text-gray-500" />
            </Link>
            <div>
                <Link :href="route('listing.edit', listing.id)">Edit</Link>
            </div>
            <div>
                <Link :href="route('listing.destroy', listing.id)" method="delete" as="button">Delete</Link>
            </div>
        </Box>
    </div>
</template>

<script setup>
import ListingAddress from '@/components/ui/Listings/ListingAddress.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    listings: Array,
});

</script>

<script>
import MainLayout from '@/layouts/MainLayout.vue';
import Box from '@/components/ui/Listings/Box.vue';
import ListingSpace from '@/components/ui/Listings/ListingSpace.vue';

export default {
    layout: MainLayout
}
</script>