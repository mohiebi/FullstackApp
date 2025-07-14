<template>
    <div v-if="successMessage" class="success">
        {{ successMessage }}
    </div>
    <div v-for="listing in listings" :key="listing.id">
        <Link :href="`/listing/${listing.id}`">
            <ListingAddress :listing="listing" />
        </Link>
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

const successMessage = computed(() => page.props.flash?.success);
</script>

<style scoped>
    .success {
        background-color: green;
        color: white;
    }
</style>
