<template>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <Listing v-for="listing in listings.data" :key="listing.id" :listing="listing" />
    </div>
    <div v-if="listings.data.length" class="w-full flex justify-center mt-8 mb-8">
        <Pagination :links="listings.links" />
    </div>
</template>

<script setup>
import Pagination from '@/components/ui/Pagination.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import Listing from '@/pages/Listing/Components/Listing.vue';


defineProps({
    listings: {
        type: Object,
        required: true,
    }
});
</script>

<script>

export default {
    layout: MainLayout
}
</script>