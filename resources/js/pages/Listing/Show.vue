<template>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
        <Box class="md:col-span-7 flex items-center">
            <div class="w-full text-center font-medium text-gray-500">No images</div>
        </Box>
        <div class="md:col-span-5 flex flex-col gap-4">
            <Box>
                <template #header>
                    Basic info
                </template>
                <Price :price="listing.price" class="text-2xl font-bold" />
                <ListingSpace :listing="listing" class="text-lg" />
                <ListingAddress :listing="listing" class="text-gray-500" />
            </Box>

            <Box>
                <template #header>
                    Offer
                </template>
                Make an offer
            </Box>
        </div>
    </div>
</template>

<script setup>
import Box from '@/components/ui/Listings/Box.vue';
import ListingAddress from '@/components/ui/Listings/ListingAddress.vue';
import ListingSpace from '@/components/ui/Listings/ListingSpace.vue';
import Price from '@/components/ui/Listings/Price.vue';
import MainLayout from '@/layouts/MainLayout.vue';


defineProps({
    listing: Object,
})
</script>

<script>
export default {
    layout: MainLayout
}
</script>