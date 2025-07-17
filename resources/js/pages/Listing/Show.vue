<template>
    <div>
        <ListingAddress :listing="listing" />
    </div>
</template>

<script setup>
import ListingAddress from '@/components/ui/Listings/ListingAddress.vue';

    defineProps({
        listing: Object,
    })
</script>