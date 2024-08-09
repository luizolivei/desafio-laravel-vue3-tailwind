<template>
    <div>
        <div v-for="(curso, index) in modelValue" :key="'curso-' + index" class="border p-4 rounded-lg mb-4">
            <h3 class="text-lg font-medium mb-2">Curso {{ index + 1 }}</h3>
            <CourseItemForm :course="curso" :index="index" :errors="errors"/>
            <button type="button" @click="removeCourse(index)" class="mt-2 text-red-500 hover:text-red-700">Remover
                Curso
            </button>
        </div>
        <button type="button" @click="addCourse"
                class="block p-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            Adicionar Curso
        </button>
    </div>
</template>

<script setup>
import CourseItemForm from '@/components/forms/items/CourseItem.vue';

const props = defineProps({
    modelValue: Array,
    errors: Object,
});

const emit = defineEmits(['update:modelValue']);

function addCourse() {
    const emptyCourse = {
        nome: '',
        local: '',
        carga_horaria: 0,
        descricao: ''
    }
    if (!props.modelValue)
        return emit('update:modelValue', [emptyCourse]);
    props.modelValue.push(emptyCourse);
}

const removeCourse = (index) => {
    const updated = [...props.modelValue];
    updated.splice(index, 1);
    emit('update:modelValue', updated);
};
</script>
