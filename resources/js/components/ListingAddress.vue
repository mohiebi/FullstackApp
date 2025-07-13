<template>
    <span>
        {{ listing.street }} {{ listing.city }}, for {{ listing.price }}
    </span>
</template>

<script setup>
    defineProps({
        listing: Object,
    })
</script>