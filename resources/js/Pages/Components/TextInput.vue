<script setup>
    const model = defineModel({
        type: null,
        required: true
    });

    defineProps({
        name: {
            type: String,
            required: true
        },
        type: {
            type: String,
            default: 'text'
        },
        message: String
    })
</script>

<template>
    <label class="input input-bordered mt-3 flex items-center gap-2" :class="{'input-error' : message}">
        <input :type="type" :placeholder="name" v-model="model" />
    </label>
    <small class="text-red-600" v-if="message">{{ message }}</small>
</template>
