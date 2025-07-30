<template>
    <div class="mb-4">
        <Link :href="route('realtor.listing.index')">
        ← Go back to Listings
        </Link>
    </div>

    <section class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
        <Box v-if="!hasOffers" class="flex md:col-span-7 items-center">
            <div class="w-full text-center font-medium text-gray-500">
                No offers
            </div>
        </Box>

        <div v-else class="md:col-span-7 items-center">
            <Offer v-for="offer in listing.offers" :key="offer.id" class="mb-4" :offer="offer"
                :listing-price="listing.price" />
        </div>

        <Box class="md:col-span-5">
            <template #header>Basic Info</template>
            <Price :price="listing.price" class="text-2xl font-bold" />

            <ListingSpace :listing="listing" class="text-lg" />
            <ListingAddress :listing="listing" class="text-gray-500" />
        </Box>
    </section>
</template>

<script setup>

import Box from '@/components/ui/Listings/Box.vue'
import ListingAddress from '@/components/ui/Listings/ListingAddress.vue'
import ListingSpace from '@/components/ui/Listings/ListingSpace.vue'
import Price from '@/components/ui/Listings/Price.vue'
import MainLayout from '@/layouts/MainLayout.vue'
import { Link } from '@inertiajs/vue3'
import { computed } from 'vue'
import Offer from '@/pages/Realtor/components/Offer.vue'


const props = defineProps({
    listing: Object
})
defineOptions({ layout: MainLayout });

const hasOffers = computed(
    () => props.listing.offers.length,
)

</script>
