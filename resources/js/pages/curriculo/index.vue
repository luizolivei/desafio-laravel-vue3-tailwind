<template>
    <div>
        <h1>{{ isEditMode ? 'Editar Currículo' : 'Cadastrar Currículo' }}</h1>
        <form @submit.prevent="submitForm">
            <div v-for="(value, key) in form" :key="key" v-if="!['experiencia_profissional', 'escolaridade', 'cursos'].includes(key)">
                <label :for="key">{{ key }}</label>
                <input
                    v-if="key !== 'id'"
                    :type="inputType(key)"
                    :id="key"
                    v-model="form[key]"
                    :required="isRequired(key)"
                />
                <span v-if="errors[key]" class="error">{{ errors[key][0] }}</span>
            </div>

            <!-- Formulário para Experiência Profissional -->
            <div v-for="(exp, index) in form.experiencia_profissional" :key="'exp-' + index">
                <h3>Experiência Profissional {{ index + 1 }}</h3>
                <label>Empresa</label>
                <input type="text" v-model="exp.empresa" />
                <label>Data Início</label>
                <input type="date" v-model="exp.data_inicio" />
                <label>Emprego Atual</label>
                <input type="checkbox" v-model="exp.emprego_atual" />
                <label v-if="!exp.emprego_atual">Data Fim</label>
                <input type="date" v-if="!exp.emprego_atual" v-model="exp.data_fim" />
                <label>Localização</label>
                <input type="text" v-model="exp.localizacao" />
                <label>Tipo</label>
                <select v-model="exp.tipo">
                    <option value="presencial">Presencial</option>
                    <option value="remoto">Remoto</option>
                    <option value="hibrido">Híbrido</option>
                </select>
                <label>Descrição</label>
                <textarea v-model="exp.descricao"></textarea>
            </div>
            <button type="button" @click="addExperiencia">Adicionar Experiência</button>

            <!-- Formulário para Escolaridade -->
            <div v-for="(edu, index) in form.escolaridade" :key="'edu-' + index">
                <h3>Escolaridade {{ index + 1 }}</h3>
                <label>Escola</label>
                <input type="text" v-model="edu.escola" />
                <label>Tipo</label>
                <input type="text" v-model="edu.tipo" />
                <label>Período Início</label>
                <input type="date" v-model="edu.periodo_inicio" />
                <label>Estudando Atualmente</label>
                <input type="checkbox" v-model="edu.estudando_atualmente" />
                <label v-if="!edu.estudando_atualmente">Período Fim</label>
                <input type="date" v-if="!edu.estudando_atualmente" v-model="edu.periodo_fim" />
                <label>Local</label>
                <input type="text" v-model="edu.local" />
                <label>Descrição</label>
                <textarea v-model="edu.descricao"></textarea>
            </div>
            <button type="button" @click="addEscolaridade">Adicionar Escolaridade</button>

            <!-- Formulário para Cursos -->
            <div v-for="(curso, index) in form.cursos" :key="'curso-' + index">
                <h3>Curso {{ index + 1 }}</h3>
                <label>Nome</label>
                <input type="text" v-model="curso.nome" />
                <label>Local</label>
                <input type="text" v-model="curso.local" />
                <label>Carga Horária</label>
                <input type="number" v-model="curso.carga_horaria" />
                <label>Descrição</label>
                <textarea v-model="curso.descricao"></textarea>
            </div>
            <button type="button" @click="addCurso">Adicionar Curso</button>

            <button type="submit">{{ isEditMode ? 'Atualizar' : 'Cadastrar' }}</button>
            <div v-if="errors.message" class="error">{{ errors.message }}</div>
        </form>
    </div>
</template>

<script>
import { ref, onMounted, computed } from 'vue';
import axios from 'axios';
import { useStore } from 'vuex';

export default {
    props: {
        curriculoId: {
            type: Number,
            default: null,
        },
    },
    setup(props) {
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
        const isEditMode = computed(() => !!props.curriculoId);

        const submitForm = async () => {
            const config = {
                headers: {
                    Authorization: `Bearer ${store.getters.getToken}`,
                },
            };
            try {
                if (isEditMode.value) {
                    await axios.put(`/api/curriculos/${props.curriculoId}`, form.value, config);
                    alert('Currículo atualizado com sucesso!');
                } else {
                    await axios.post('/api/curriculos', form.value, config);
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

        const inputType = (key) => {
            if (key === 'email') return 'email';
            if (key === 'data_nascimento') return 'date';
            if (key === 'pretencao_salarial') return 'number';
            return 'text';
        };

        const isRequired = (key) => {
            const requiredFields = ['nome', 'email', 'cpf', 'data_nascimento', 'sexo', 'estado_civil'];
            return requiredFields.includes(key);
        };

        const addExperiencia = () => {
            form.value.experiencia_profissional.push({
                empresa: '',
                data_inicio: '',
                data_fim: '',
                emprego_atual: false,
                localizacao: '',
                tipo: 'presencial',
                descricao: ''
            });
        };

        const addEscolaridade = () => {
            form.value.escolaridade.push({
                escola: '',
                tipo: '',
                periodo_inicio: '',
                periodo_fim: '',
                estudando_atualmente: false,
                local: '',
                descricao: ''
            });
        };

        const addCurso = () => {
            form.value.cursos.push({
                nome: '',
                local: '',
                carga_horaria: 0,
                descricao: ''
            });
        };

        onMounted(async () => {
            if (props.curriculoId) {
                try {
                    const config = {
                        headers: {
                            Authorization: `Bearer ${store.getters.getToken}`,
                        },
                    };
                    const response = await axios.get(`/api/curriculos/${props.curriculoId}`, config);
                    form.value = response.data;
                } catch (error) {
                    console.error(error);
                    alert('Ocorreu um erro ao carregar o currículo.');
                }
            }
        });

        return {
            form,
            errors,
            isEditMode,
            submitForm,
            inputType,
            isRequired,
            addExperiencia,
            addEscolaridade,
            addCurso,
        };
    },
};
</script>

<style scoped>
.error {
    color: red;
}

input {
    border: 1px solid red
}
</style>
