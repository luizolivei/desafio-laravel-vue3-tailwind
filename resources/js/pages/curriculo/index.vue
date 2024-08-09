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
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <!-- Campo Nome -->
                <div class="flex flex-col">
                    <label for="nome" class="font-semibold">Nome</label>
                    <input
                        type="text"
                        id="nome"
                        v-model="form.nome"
                        required
                        class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                    />
                    <span v-if="errors.nome" class="text-red-500 text-sm">
                        {{ errors.nome[0] }}
                    </span>
                </div>

                <!-- Campo Email -->
                <div class="flex flex-col">
                    <label for="email" class="font-semibold">Email</label>
                    <input
                        type="email"
                        id="email"
                        v-model="form.email"
                        required
                        class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                    />
                    <span v-if="errors.email" class="text-red-500 text-sm">
                        {{ errors.email[0] }}
                    </span>
                </div>

                <!-- Campo CPF -->
                <div class="flex flex-col">
                    <label for="cpf" class="font-semibold">CPF</label>
                    <input
                        type="text"
                        id="cpf"
                        ref="cpfInput"
                        v-model="form.cpf"
                        required
                        class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                    />
                    <span v-if="errors.cpf" class="text-red-500 text-sm">
                        {{ errors.cpf[0] }}
                    </span>
                </div>

                <!-- Campo Data de Nascimento -->
                <div class="flex flex-col">
                    <label for="data_nascimento" class="font-semibold">Data de Nascimento</label>
                    <input
                        type="date"
                        id="data_nascimento"
                        v-model="form.data_nascimento"
                        required
                        class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                    />
                    <span v-if="errors.data_nascimento" class="text-red-500 text-sm">
                        {{ errors.data_nascimento[0] }}
                    </span>
                </div>

                <!-- Campo Sexo -->
                <div class="flex flex-col">
                    <label for="sexo" class="font-semibold">Sexo</label>
                    <select v-model="form.sexo"
                            id="sexo"
                            required
                            class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                        <option value="nc">Prefiro não informar</option>
                    </select>
                    <span v-if="errors.sexo" class="text-red-500 text-sm">
                        {{ errors.sexo[0] }}
                    </span>
                </div>

                <!-- Campo Estado Civil -->
                <div class="flex flex-col">
                    <label for="estado_civil" class="font-semibold">Estado Civil</label>
                    <select v-model="form.estado_civil"
                            id="estado_civil"
                            required
                            class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                        <option value="solteiro">Solteiro</option>
                        <option value="casado">Casado</option>
                        <option value="separado">Separado</option>
                        <option value="divorciado">Divorciado</option>
                        <option value="viuvo">Viúvo</option>
                    </select>
                    <span v-if="errors.estado_civil" class="text-red-500 text-sm">
                        {{ errors.estado_civil[0] }}
                    </span>
                </div>

                <!-- Campo Pretensão Salarial -->
                <div class="flex flex-col">
                    <label for="pretencao_salarial" class="font-semibold">Pretensão Salarial</label>
                    <input
                        type="number"
                        id="pretencao_salarial"
                        step="100"
                        v-model="form.pretencao_salarial"
                        class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                    />
                    <span v-if="errors.pretencao_salarial" class="text-red-500 text-sm">
                        {{ errors.pretencao_salarial[0] }}
                    </span>
                </div>
            </div>

            <Separator/>
            <!-- Formulário para Experiência Profissional -->
            <div v-for="(exp, index) in form.experiencia_profissional" :key="'exp-' + index"
                 class="border p-4 rounded-lg">
                <h3 class="text-lg font-medium mb-2">Experiência Profissional {{ index + 1 }}</h3>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div class="flex flex-col">
                        <label>Empresa</label>
                        <input type="text" v-model="exp.empresa"
                               class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"/>
                    </div>
                    <div class="flex flex-col">
                        <label>Data Início</label>
                        <input type="date" v-model="exp.data_inicio"
                               class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"/>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" v-model="exp.emprego_atual" id="emprego_atual" class="h-4 w-4"/>
                        <label for="emprego_atual" class="font-medium">Emprego Atual</label>
                    </div>
                    <div class="flex flex-col" v-if="!exp.emprego_atual">
                        <label>Data Fim</label>
                        <input type="date" v-model="exp.data_fim"
                               class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"/>
                    </div>
                    <div class="flex flex-col">
                        <label>Localização</label>
                        <input type="text" v-model="exp.localizacao"
                               class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"/>
                    </div>
                    <div class="flex flex-col">
                        <label>Tipo</label>
                        <select v-model="exp.tipo"
                                class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                            <option value="presencial">Presencial</option>
                            <option value="remoto">Remoto</option>
                            <option value="hibrido">Híbrido</option>
                        </select>
                    </div>
                    <div class="flex flex-col col-span-2">
                        <label>Descrição</label>
                        <textarea v-model="exp.descricao"
                                  class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"></textarea>
                    </div>
                </div>
                <button type="button" @click="removeExperiencia(index)" class="mt-2 text-red-500 hover:text-red-700">
                    Remover Experiência
                </button>
            </div>
            <button type="button" @click="addExperiencia"
                    class="block mt-4 p-2 bg-blue-500 text-white rounded hover:bg-blue-600">Adicionar Experiência
            </button>

            <Separator/>
            <!-- Formulário para Escolaridade -->
            <div v-for="(edu, index) in form.escolaridade" :key="'edu-' + index" class="border p-4 rounded-lg">
                <h3 class="text-lg font-medium mb-2">Escolaridade {{ index + 1 }}</h3>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div class="flex flex-col">
                        <label>Escola</label>
                        <input type="text" v-model="edu.escola"
                               class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"/>
                    </div>
                    <div class="flex flex-col">
                        <label>Tipo</label>
                        <input type="text" v-model="edu.tipo"
                               class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"/>
                    </div>
                    <div class="flex flex-col">
                        <label>Período Início</label>
                        <input type="date" v-model="edu.periodo_inicio"
                               class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"/>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" v-model="edu.estudando_atualmente" id="estudando_atualmente"
                               class="h-4 w-4"/>
                        <label for="estudando_atualmente" class="font-medium">Estudando Atualmente</label>
                    </div>
                    <div class="flex flex-col" v-if="!edu.estudando_atualmente">
                        <label>Período Fim</label>
                        <input type="date" v-model="edu.periodo_fim"
                               class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"/>
                    </div>
                    <div class="flex flex-col">
                        <label>Local</label>
                        <input type="text" v-model="edu.local"
                               class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"/>
                    </div>
                    <div class="flex flex-col col-span-2">
                        <label>Descrição</label>
                        <textarea v-model="edu.descricao"
                                  class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"></textarea>
                    </div>
                </div>
                <button type="button" @click="removeEscolaridade(index)" class="mt-2 text-red-500 hover:text-red-700">
                    Remover Escolaridade
                </button>
            </div>
            <button type="button" @click="addEscolaridade"
                    class="block mt-4 p-2 bg-blue-500 text-white rounded hover:bg-blue-600">Adicionar Escolaridade
            </button>

            <Separator/>
            <!-- Formulário para Cursos -->
            <div v-for="(curso, index) in form.cursos" :key="'curso-' + index" class="border p-4 rounded-lg">
                <h3 class="text-lg font-medium mb-2">Curso {{ index + 1 }}</h3>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div class="flex flex-col">
                        <label>Nome</label>
                        <input type="text" v-model="curso.nome"
                               class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"/>
                    </div>
                    <div class="flex flex-col">
                        <label>Local</label>
                        <input type="text" v-model="curso.local"
                               class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"/>
                    </div>
                    <div class="flex flex-col">
                        <label>Carga Horária</label>
                        <input type="number" v-model="curso.carga_horaria"
                               class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"/>
                    </div>
                    <div class="flex flex-col col-span-2">
                        <label>Descrição</label>
                        <textarea v-model="curso.descricao"
                                  class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"></textarea>
                    </div>
                </div>
                <button type="button" @click="removeCurso(index)" class="mt-2 text-red-500 hover:text-red-700">Remover
                    Curso
                </button>
            </div>
            <button type="button" @click="addCurso"
                    class="block mt-4 p-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Adicionar Curso
            </button>

            <button type="submit" class="w-full p-2 bg-green-500 text-white rounded hover:bg-green-600">
                {{ isEditMode ? 'Atualizar' : 'Cadastrar' }}
            </button>
            <button v-if="isEditMode" @click="deleteCurriculum" type="button"
                    class="w-full p-2 bg-red-500 text-white rounded hover:bg-red-600">
                Apagar curriculo
            </button>
            <div v-if="errors.message" class="text-red-500 text-sm mt-4">{{ errors.message }}</div>
        </form>
    </Container>
</template>

<script setup>
import {ref, onMounted} from 'vue';
import axios from 'axios';
import {useStore} from 'vuex';
import Container from "@/components/layout/Container.vue";
import Inputmask from "inputmask";
import Separator from "@/components/Separator.vue";

//ref to mask
const cpfInput = ref(null);


const store = useStore();
const form = ref({
    id: null,
    nome: '',
    email: '',
    cpf: '',
    data_nascimento: '',
    sexo: '',
    estado_civil: '',
    escolaridade: [{
        escola: '',
        tipo: '',
        periodo_inicio: '',
        periodo_fim: '',
        estudando_atualmente: false,
        local: '',
        descricao: ''
    }],
    experiencia_profissional: [{
        empresa: '',
        data_inicio: '',
        data_fim: '',
        emprego_atual: false,
        localizacao: '',
        tipo: 'presencial',
        descricao: ''
    }],
    cursos: [{
        nome: '',
        local: '',
        carga_horaria: 0,
        descricao: ''
    }],
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
        if (error.response && error.response.data.message) {
            errors.value = error.response.data.message;
        } else {
            console.error(error);
            alert('Ocorreu um erro ao salvar o currículo.');
        }
    }
};

function addExperiencia() {
    const emptyExperienci = {
        empresa: '',
        data_inicio: '',
        data_fim: '',
        emprego_atual: false,
        localizacao: '',
        tipo: 'presencial',
        descricao: ''
    }
    if (!form.value.experiencia_profissional)
        return form.value.experiencia_profissional = [emptyExperienci];
    form.value.experiencia_profissional.push(emptyExperienci);
}

function removeExperiencia(index) {
    form.value.experiencia_profissional.splice(index, 1);
}

function addEscolaridade() {
    const emptyEscolaridade = {
        escola: '',
        tipo: '',
        periodo_inicio: '',
        periodo_fim: '',
        estudando_atualmente: false,
        local: '',
        descricao: ''
    }
    if (!form.value.escolaridade)
        return form.value.escolaridade = [emptyEscolaridade];
    form.value.escolaridade.push(emptyEscolaridade);
}

function removeEscolaridade(index) {
    form.value.escolaridade.splice(index, 1);
}

function addCurso() {
    const emptyCurso = {
        nome: '',
        local: '',
        carga_horaria: 0,
        descricao: ''
    }
    if (!form.value.cursos)
        return form.value.cursos = [emptyCurso];
    form.value.cursos.push(emptyCurso);
}

function removeCurso(index) {
    form.value.cursos.splice(index, 1);
}

async function deleteCurriculum() {
    const config = {
        headers: {
            Authorization: `Bearer ${store.getters.getToken}`,
        },
    };
    try {
        await axios.delete(`/api/curriculos/${form.value.id}`, config);
        alert('Currículo apagado com sucesso!');
        location.reload()
    } catch (error) {
        console.error(error);
        alert('Ocorreu um erro ao apagar o currículo.');
    }
}

onMounted(async () => {
    if (cpfInput.value) {
        Inputmask("999.999.999-99").mask(cpfInput.value);
    }

    try {
        const config = {
            headers: {
                Authorization: `Bearer ${store.getters.getToken}`,
            },
        };
        const response = await axios.get(`/api/curriculos`, config);
        if (response.data) {
            isEditMode.value = true
            form.value = response.data;
        }
    } catch (error) {
        console.error(error);
        alert('Ocorreu um erro ao carregar o currículo.');
    }
})
</script>

<style scoped>
.error {
    color: red;
}
</style>
