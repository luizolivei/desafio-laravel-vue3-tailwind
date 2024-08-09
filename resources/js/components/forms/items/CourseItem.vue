<template>
    <div class="md:grid grid-cols-2 gap-4">
        <div class="flex flex-col">
            <label>Nome</label>
            <input type="text" v-model="course.nome"
                   class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"/>
        </div>
        <div class="flex flex-col">
            <label>Local</label>
            <input type="text" v-model="course.local"
                   class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"/>
        </div>
        <div class="flex flex-col">
            <label>Carga Horária</label>
            <input type="number" v-model="course.carga_horaria"
                   class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"/>
        </div>
        <div class="flex flex-col col-span-2">
            <label>Descrição</label>
            <textarea v-model="course.descricao"
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
    course: {
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
    }
});

const filteredErrors = computed(() => {
    const errors = props.errors;
    const prefix = `cursos.${props.index}.`;
    return Object.keys(errors).filter(key => key.startsWith(prefix)).map(key => errors[key]).flat();
});
</script>
