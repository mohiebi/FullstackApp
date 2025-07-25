<template>
    <form method="POST" :action="route('realtor.listing.image.store', { listing: listing.id })">
        <input type="file" multiple name="files" />
        <button type="submit">Send</button>
    </form>
</template>

<script setup>
import MainLayout from '@/layouts/MainLayout.vue';

defineProps({ listing: Object })
</script>

<script>
export default {
    layout: MainLayout
}
</script>