<template>
    <div v-if="flashSuccessMessage" class="success">
        {{ flashSuccessMessage }}
    </div>
    <div v-for="listing in listings" :key="listing.id">
        <Link :href="`/listing/${listing.id}`">
            <ListingAddress :listing="listing" />
        </Link>
        <div>
            <Link :href="`/listing/${listing.id}/edit`">Edit</Link>
        </div>
    </div>
</template>

<script setup>
import ListingAddress from '@/components/ListingAddress.vue';
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

defineProps({
    listings: Array,
});

const page = usePage();

const flashSuccessMessage = computed(() => page.props.flash?.success);
</script>

<style scoped>
    .success {
        background-color: green;
        color: white;
    }
</style>
