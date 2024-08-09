<template>
    <Container>
        <div class="flex justify-between">
            <h1 class="text-2xl font-bold mb-4">{{ isEditMode ? 'Editar Currículo' : 'Cadastrar Currículo' }}</h1>
            <router-link to="/"
                         class="text-md md:text-md lg:text-lg underline font-bold hidden md:flex">
                Voltar para o início
            </router-link>
        </div>
        <form @submit.prevent="submitForm" class="space-y-6">
            <PersonalDetailsForm v-model="form" :errors="errors"/>
            <Separator/>
            <ExperienceForm v-model="form.experiencia_profissional" :errors="errors"/>
            <Separator/>
            <EducationForm v-model="form.escolaridade" :errors="errors"/>
            <Separator/>
            <CourseForm v-model="form.cursos" :errors="errors"/>
            <div class="flex justify-center space-x-4 mt-4">
                <button type="submit"
                        class="text-md md:text-xl px-4 py-2 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600 transition duration-200 ease-in-out">
                    {{ isEditMode ? 'Atualizar' : 'Cadastrar' }}
                </button>
                <button v-if="isEditMode"
                        @click="deleteCurriculum"
                        type="button"
                        class="text-md md:text-xl px-4 py-2 bg-red-500 text-white rounded-lg shadow-md hover:bg-red-600 transition duration-200 ease-in-out">
                    Apagar currículo
                </button>
            </div>
            <div v-if="errors.message" class="text-red-500 text-sm mt-4">{{ errors.message }}</div>
        </form>
    </Container>
</template>

<script setup>
import {ref, onMounted} from 'vue';
import axios from 'axios';
import {useStore} from 'vuex';
import PersonalDetailsForm from "@/components/forms/PersonalDetailsForm.vue";
import Separator from "@/components/Separator.vue";
import ExperienceForm from "@/components/forms/ExperienceForm.vue";
import EducationForm from "@/components/forms/EducationForm.vue";
import CourseForm from "@/components/forms/CourseForm.vue";
import Container from "@/components/layout/Container.vue";
const store = useStore();

const form = ref({
    id: null,
    nome: '',
    email: '',
    cpf: '',
    data_nascimento: '',
    sexo: '',
    estado_civil: '',
    escolaridade: [],
    experiencia_profissional: [],
    cursos: [],
    pretencao_salarial: '',
});
const errors = ref({});
const isEditMode = ref(false);

const submitForm = async () => {
    const config = {
        headers: {
            Authorization: `Bearer ${store.getters.getToken}`,
        },
    };
    try {
        form.value.cpf = form.value.cpf.replace(/\D/g, '');
        if (isEditMode.value) {
            await axios.put(`/api/curriculos/${form.value.id}`, form.value, config);
            alert('Currículo atualizado com sucesso!');
        } else {
            const response = await axios.post('/api/curriculos', form.value, config);
            form.value.id = response.data.id;
            isEditMode.value = true
            alert('Currículo cadastrado com sucesso!');
        }
        errors.value = {};
    } catch (error) {
        console.log("caiu aq", error.response.data.message)
        if (error.response && error.response.data.message) {
            errors.value = error.response.data.message;
        } else {
            console.error(error);
            alert('Ocorreu um erro ao salvar o currículo.');
        }
    }
};

async function deleteCurriculum() {
    const config = {
        headers: {
            Authorization: `Bearer ${store.getters.getToken}`,
        },
    };
    try {
        await axios.delete(`/api/curriculos/${form.value.id}`, config);
        alert('Currículo apagado com sucesso!');
        location.reload();
    } catch (error) {
        console.error(error);
        alert('Ocorreu um erro ao apagar o currículo.');
    }
}

onMounted(async () => {
    try {
        const config = {
            headers: {
                Authorization: `Bearer ${store.getters.getToken}`,
            },
        };
        const response = await axios.get(`/api/curriculos`, config);
        if (response.data) {
            isEditMode.value = true;
            form.value = response.data;
        }
    } catch (error) {
        console.error(error);
        alert('Ocorreu um erro ao carregar o currículo.');
    }
});
</script>
