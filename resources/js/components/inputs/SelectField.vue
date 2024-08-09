<template>
    <div class="flex flex-col">
        <label :for="label" class="font-semibold">{{ label }}</label>
        <select
            :id="label"
            :value="modelValue"
            :required="required"
            class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
        >
            <option v-for="option in options" :key="option.value" :value="option.value">
                {{ option.text }}
            </option>
        </select>
        <span v-if="error" class="text-red-500 text-sm">
            {{ error[0] }}
        </span>
    </div>
</template>

<script setup>
const props = defineProps({
    label: String,
    modelValue: [String, Number],
    options: {
        type: Array,
        required: true,
    },
    required: {
        type: Boolean,
        default: false,
    },
    error: Object,
});

const emit = defineEmits(['update:modelValue']);
</script>
