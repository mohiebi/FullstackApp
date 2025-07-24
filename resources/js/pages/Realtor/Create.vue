<template>
    <form @submit.prevent="create">
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-2">
                <Label class="label">Beds</Label>
                <Input v-model.number="form.beds" type="text" class="input" />
                <div v-if="form.errors.beds" class="input-error">
                    {{ form.errors.beds }}
                </div>
            </div>
            <div class="col-span-2">
                <Label class="label">Baths</Label>
                <Input v-model.number="form.baths" type="text" class="input" />
                <div v-if="form.errors.baths" class="input-error">
                    {{ form.errors.baths }}
                </div>
            </div>
            <div class="col-span-2">
                <Label class="label">Area</Label>
                <Input v-model.number="form.area" type="text" class="input" />
                <div v-if="form.errors.area" class="input-error">
                    {{ form.errors.area }}
                </div>
            </div>
            <div class="col-span-4">
                <Label class="label">City</Label>
                <Input v-model="form.city" type="text" class="input" />
                <div v-if="form.errors.city" class="input-error">
                    {{ form.errors.city }}
                </div>
            </div>
            <div class="col-span-2">
                <Label class="label">Post Code</Label>
                <Input v-model="form.code" type="text" class="input" />
                <div v-if="form.errors.code" class="input-error">
                    {{ form.errors.code }}
                </div>
            </div>
            <div class="col-span-4">
                <Label class="label">Street</Label>
                <Input v-model="form.street" type="text" class="input" />
                <div v-if="form.errors.street" class="input-error">
                    {{ form.errors.street }}
                </div>
            </div>
            <div class="col-span-6">
                <Label class="label">Price</Label>
                <Input v-model.number="form.price" type="text" class="input" />
                <div v-if="form.errors.price" class="input-error">
                    {{ form.errors.price }}
                </div>
            </div>
            <div class="col-span-6">
                <button type="submit" class="btn-primary">Create</button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import MainLayout from '@/layouts/MainLayout.vue';
import { useForm } from '@inertiajs/vue3';


const form = useForm({
    beds: 0,
    baths: 0,
    area: 0,
    city: null,
    street: null,
    code: null,
    street_nr: null,
    price: 0,
})
const create = () => form.post(route('realtor.listing.store'))
</script>

<script>
export default {
    layout: MainLayout
}
</script>