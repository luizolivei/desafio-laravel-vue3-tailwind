<template>
    <div class="md:grid grid-cols-2 gap-4">
        <div class="flex flex-col">
            <label>Empresa</label>
            <input type="text" v-model="experience.empresa"
                   class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"/>
        </div>
        <div class="flex flex-col">
            <label>Localização</label>
            <input type="text" v-model="experience.localizacao"
                   class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"/>
        </div>
        <div class="flex flex-col">
            <label>Data Início</label>
            <input type="date" v-model="experience.data_inicio"
                   class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"/>
        </div>
        <div class="flex flex-col">
            <div class="flex items-center">
                <label class="mr-2">Data Fim</label>
                <input type="checkbox" v-model="experience.emprego_atual" :id="'emprego_atual' + index" class="h-4 w-4"/>
                <label :for="'emprego_atual' + index" class="font-medium">Emprego Atual</label>
            </div>
            <input type="date" v-model="experience.data_fim" :disabled="experience.emprego_atual"
                   class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"/>
        </div>
        <div class="flex flex-col">
            <label>Tipo</label>
            <select v-model="experience.tipo"
                    class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                <option v-for="option in tipoOptions" :key="option.value" :value="option.value">
                    {{ option.text }}
                </option>
            </select>
        </div>
        <div class="flex flex-col col-span-2">
            <label>Descrição</label>
            <textarea v-model="experience.descricao"
                      class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"></textarea>
        </div>
    </div>
    <div v-if="filteredErrors.length" class="text-red-500 text-sm mt-4">
        <div v-for="error in filteredErrors" :key="error">{{ error }}</div>
    </div>
</template>

<script setup>
import {computed} from "vue";

const props = defineProps({
    experience: {
        type: Object,
        required: true,
    },
    errors: {
        type: Object,
        default: () => ({}),
    },
    index: {
        type: Number,
        required: true,
    },
});

const tipoOptions = [
    {value: 'presencial', text: 'Presencial'},
    {value: 'remoto', text: 'Remoto'},
    {value: 'hibrido', text: 'Híbrido'},
];

const filteredErrors = computed(() => {
    const errors = props.errors;
    const prefix = `experiencia_profissional.${props.index}.`;
    return Object.keys(errors).filter(key => key.startsWith(prefix)).map(key => errors[key]).flat();
});
</script>
