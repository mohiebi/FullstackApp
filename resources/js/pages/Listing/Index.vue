<template>
    <div v-for="listing in listings" :key="listing.id">
        <Link :href="route('listing.show', listing.id)">
            <ListingAddress :listing="listing" />
        </Link>
        <div>
            <Link :href="route('listing.edit', listing.id)">Edit</Link>
        </div>
        <div>
            <Link :href="route('listing.destroy', listing.id)" method="delete" as="button">Delete</Link>
        </div>
    </div>
</template>

<script setup>
import ListingAddress from '@/components/ListingAddress.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    listings: Array,
});

</script>

<script>
import MainLayout from '@/layouts/MainLayout.vue';

export default {
    layout: MainLayout
}
</script>