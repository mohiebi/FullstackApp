<template>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <Listing v-for="listing in listings" :key="listing.id" :listing="listing" />
    </div>
</template>

<script setup>
import MainLayout from '@/layouts/MainLayout.vue';
import Listing from '@/pages/Listing/Components/Listing.vue';


defineProps({
    listings: Array,
});

</script>

<script>

export default {
    layout: MainLayout
}
</script>