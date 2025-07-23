<template>
    <Filters :filters="filters" />
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <Listing v-for="listing in listings.data" :key="listing.id" :listing="listing" />
    </div>
    <div v-if="listings.data.length" class="w-full flex justify-center mt-4 mb-4">
        <Pagination :links="listings.links" />
    </div>
</template>

<script setup>
import Pagination from '@/components/ui/Pagination.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import Listing from '@/pages/Listing/Components/Listing.vue';
import Filters from '@/pages/Listing/Components/Filters.vue';


defineProps({
    listings: {
        type: Object,
        required: true,
    },
    filters: Object,
});
</script>

<script>
export default {
    layout: MainLayout
}
</script>