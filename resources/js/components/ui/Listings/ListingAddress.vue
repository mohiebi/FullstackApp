<template>
    <span>
        {{ listing.street }}, {{ listing.city }}
    </span>
</template>

<script setup>
    defineProps({
        listing: Object,
    })
</script>