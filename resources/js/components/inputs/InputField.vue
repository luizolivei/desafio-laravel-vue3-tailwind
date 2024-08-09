<template>
    <div class="flex flex-col">
        <label :for="label" class="font-semibold">{{ label }}</label>
        <input
            :type="type"
            :id="label"
            :value="modelValue"
            @change="emit('update:modelValue', $event.target.value)"
            :required="required"
            class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
        />
        <span v-if="error" class="text-red-500 text-sm">
            {{ error[0] }}
        </span>
    </div>
</template>

<script setup>
const props = defineProps({
    label: String,
    modelValue: [String, Number],
    type: {
        type: String,
        default: 'text',
    },
    required: {
        type: Boolean,
        default: false,
    },
    error: Object,
});

const emit = defineEmits(['update:modelValue']);
</script>
