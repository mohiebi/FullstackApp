<template>
    <div>
        <ListingAddress :listing="listing" />
    </div>
</template>

<script setup lang="ts">
import ListingAddress from '@/components/ListingAddress.vue';

    defineProps({
        listing: Object,
    })
</script>