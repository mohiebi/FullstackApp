<template>
    <form @submit.prevent="filter">
        <div class="mb-8 mt-4 flex flex-wrap gap-2">
            <div class="flex flex-nowrap items-center">
                <input type="text" placeholder="Price from" class="input-filter-l w-28"
                    v-model="filterForm.priceFrom" />
                <input type="text" placeholder="Price to" class="input-filter-r w-28" v-model="filterForm.priceTo" />
            </div>

            <div class="flex flex-nowrap items-center">
                <select class="input-filter-l w-28" v-model="filterForm.beds">
                    <option :value="null">Beds</option>
                    <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
                    <option value="6+">6+</option>
                </select>
                <select class="input-filter-r w-28" v-model="filterForm.baths">
                    <option :value="null">Baths</option>
                    <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
                    <option value="6+">6+</option>
                </select>
            </div>

            <div class="flex flex-nowrap items-center">
                <input type="text" placeholder="Area from" class="input-filter-l w-28" v-model="filterForm.areaFrom" />
                <input type="text" placeholder="Area to" class="input-filter-r w-28" v-model="filterForm.areaTo" />
            </div>

            <button type="submit" class="btn-normal">Filter</button>
            <button type="reset" @click="clear">Clear</button>
        </div>
    </form>
</template>

<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'
import { defineProps } from 'vue'

interface Filters {
    priceFrom?: string | number | null
    priceTo?: string | number | null
    beds?: string | number | null
    baths?: string | number | null
    areaFrom?: string | number | null
    areaTo?: string | number | null
}

const props = defineProps<{
    filters: Filters
}>()

const filterForm = useForm({
    priceFrom: props.filters.priceFrom ?? null,
    priceTo: props.filters.priceTo ?? null,
    beds: props.filters.beds ?? null,
    baths: props.filters.baths ?? null,
    areaFrom: props.filters.areaFrom ?? null,
    areaTo: props.filters.areaTo ?? null,
})

const filter = () => {
    filterForm.get(route('listing.index'), {
        preserveState: true,
        preserveScroll: true,
    })
}

const clear = () => {
    filterForm.priceFrom = null
    filterForm.priceTo = null
    filterForm.beds = null
    filterForm.baths = null
    filterForm.areaFrom = null
    filterForm.areaTo = null
    filter()
}
</script>
