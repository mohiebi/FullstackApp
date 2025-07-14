<template>
    <div>
        <ListingAddress :listing="listing" />
    </div>
</template>

<script setup>
import ListingAddress from '@/components/ListingAddress.vue';

    defineProps({
        listing: Object,
    })
</script>