<template>
        <div v-for="(exp, index) in modelValue" :key="'exp-' + index" class="border p-4 rounded-lg mb-4">
            <h3 class="text-lg font-medium mb-2">Experiência Profissional {{ index + 1 }}</h3>
            <ExperienceItem :experience="exp" :index="index" :errors="errors" />
            <button type="button" @click="removeExperience(index)" class="mt-2 text-red-500 hover:text-red-700">
                Remover Experiência
            </button>
        </div>
        <button type="button" @click="addExperience"
                class="block p-2 bg-blue-500 text-white rounded hover:bg-blue-600">Adicionar Experiência
        </button>
</template>

<script setup>
import ExperienceItem from '@/components/forms/items/ExperienceItem.vue';

const props = defineProps({
    modelValue: Array,
    errors: Object,
});

const emit = defineEmits(['update:modelValue']);

function addExperience() {
    const emptyExperienci = {
        empresa: '',
        data_inicio: '',
        data_fim: '',
        emprego_atual: false,
        localizacao: '',
        tipo: 'efetivo',
        descricao: ''
    }
    if (!props.modelValue)
        return emit('update:modelValue', [emptyExperienci]);
    props.modelValue.push(emptyExperienci);
}

const removeExperience = (index) => {
    const updated = [...props.modelValue];
    updated.splice(index, 1);
    emit('update:modelValue', updated);
};
</script>
