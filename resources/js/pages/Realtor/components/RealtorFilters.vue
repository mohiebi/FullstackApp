<template>
    <form>
        <div class="mb-4 mt-4 flex flex-wrap gap-4">
            <div class="flex flex-nowrap items-center gap-2">
                <input id="deleted" v-model="filterForm.deleted" type="checkbox"
                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                <label for="deleted">Deleted</label>
            </div>

            <div>
                <select v-model="filterForm.by" class="input-filter-l w-24">
                    <option value="created_at">Added</option>
                    <option value="price">Price</option>
                    <option value="beds">beds</option>
                    <option value="baths">baths</option>
                </select>
                <select v-model="filterForm.order" class="input-filter-r w-32">
                    <option v-for="option in sortOptions" :key="option.value" :value="option.value">
                        {{ option.label }}
                    </option>
                </select>
            </div>
        </div>
    </form>
</template>

<script setup>
import { router } from '@inertiajs/vue3'
import { debounce } from 'lodash'
import { computed, reactive, watch } from 'vue'

const props = defineProps({
    listings: Array,
    filters: Object,
});

const sortLabels = {
    created_at: [
        {
            label: 'Latest',
            value: 'desc',
        },
        {
            label: 'Oldest',
            value: 'asc',
        },
    ],
    price: [
        {
            label: 'Pricey',
            value: 'desc',
        },
        {
            label: 'Cheapest',
            value: 'asc',
        },
    ],
    beds: [
        {
            label: 'Most',
            value: 'desc',
        },
        {
            label: 'Least',
            value: 'asc',
        },
    ],
    baths: [
        {
            label: 'Most',
            value: 'desc',
        },
        {
            label: 'Least',
            value: 'asc',
        },
    ],
}

const sortOptions = computed(() => sortLabels[filterForm.by])
const filterForm = reactive({
    deleted: props.filters.deleted ?? false,
    by: props.filters?.by ?? 'created_at',
    order: props.filters?.order ?? 'desc',
})
watch(
    filterForm, debounce(() => router.get(
        route('realtor.listing.index'),
        filterForm,
        { preserveState: true, preserveScroll: true },
    ), 1000),
)
</script>