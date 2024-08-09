<template>
        <div v-for="(edu, index) in modelValue" :key="'edu-' + index" class="border p-4 rounded-lg mb-4">
            <h3 class="text-lg font-medium mb-2">Escolaridade {{ index + 1 }}</h3>
            <EducationItem :education="edu" :index="index" :errors="errors" />
            <button type="button" @click="removeEducation(index)" class="mt-2 text-red-500 hover:text-red-700">
                Remover Escolaridade
            </button>
        </div>
        <button type="button" @click="addEducation"
                class="block p-2 bg-blue-500 text-white rounded hover:bg-blue-600">Adicionar Escolaridade
        </button>
</template>

<script setup>
import EducationItem from '@/components/forms/items/EducationItem.vue';

const props = defineProps({
    modelValue: Array,
    errors: Object,
});

const emit = defineEmits(['update:modelValue']);

function addEducation() {
    const emptyEducation = {
        escola: '',
        tipo: '',
        periodo_inicio: '',
        periodo_fim: '',
        estudando_atualmente: false,
        local: '',
        descricao: ''
    }
    if (!props.modelValue)
        return emit('update:modelValue', [emptyEducation]);
    props.modelValue.push(emptyEducation);
}

const removeEducation = (index) => {
    const updated = [...props.modelValue];
    updated.splice(index, 1);
    emit('update:modelValue', updated);
};
</script>
