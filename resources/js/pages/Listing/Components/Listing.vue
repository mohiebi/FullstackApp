<template>
    <Box>
        <div>
            <Link :href="route('listing.show', { listing: listing.id })">
            <div class="flex items-center gap-1">
                <Price :price="listing.price" class="text-2xl font-bold" />
                <div class="text-xs text-gray-500">
                    <Price :price="monthlyPayment" /> pm
                </div>
            </div>
            <ListingSpace :listing="listing" class="text-lg" />
            <ListingAddress :listing="listing" class="text-gray-500" />
            </Link>
        </div>
    </Box>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import ListingAddress from '@/components/ui/Listings/ListingAddress.vue'
import ListingSpace from '@/components/ui/Listings/ListingSpace.vue'
import Price from '@/components/ui/Listings/Price.vue'
import Box from '@/components/ui/Listings/Box.vue'
import { useMonthlyPayment } from '@/composables/useMonstlyPayment'

const props = defineProps({ listing: Object })
const { monthlyPayment } = useMonthlyPayment(props.listing.price, 2.5, 25,)
</script>