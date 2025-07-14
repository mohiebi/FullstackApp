<template>
    <span>
        {{ listing?.street }} {{ listing?.city }}, for {{ listing?.price }}
    </span>
</template>

<script setup lang="ts">
    defineProps({
        listing: Object,
    })
</script>