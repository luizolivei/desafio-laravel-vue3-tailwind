<template>
    <div class="md:grid grid-cols-2 gap-4">
        <div class="flex flex-col">
            <label>Escola</label>
            <input type="text" v-model="education.escola"
                   class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"/>
        </div>
        <div class="flex flex-col">
            <label>Tipo</label>
<!--            <input type="text" v-model="education.tipo"-->
<!--                   class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"/>-->
            <select v-model="education.tipo"
                    class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                <option v-for="option in tipoOptions" :key="option.value" :value="option.value">
                    {{ option.text }}
                </option>
            </select>
        </div>
        <div class="flex flex-col">
            <label>Período Início</label>
            <input type="date" v-model="education.periodo_inicio"
                   class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"/>
        </div>
        <div class="flex flex-col">
            <div class="flex items-center">
                <label class="mr-2">Período Fim</label>
                <input type="checkbox" v-model="education.estudando_atualmente" :id="'estudando_atualmente' + index"
                       class="h-4 w-4"/>
                <label :for="'estudando_atualmente' + index" class="font-medium">Estudando Atualmente</label>
            </div>
            <input type="date" v-model="education.periodo_fim" :disabled="education.estudando_atualmente"
                   class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"/>
        </div>
        <div class="flex flex-col">
            <label>Local</label>
            <input type="text" v-model="education.local"
                   class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"/>
        </div>
        <div class="flex flex-col col-span-2">
            <label>Descrição</label>
            <textarea v-model="education.descricao"
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
    education: {
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
    {value: 'online', text: 'Online'},
];

const filteredErrors = computed(() => {
    const errors = props.errors;
    const prefix = `escolaridade.${props.index}.`;
    return Object.keys(errors).filter(key => key.startsWith(prefix)).map(key => errors[key]).flat();
});
</script>
