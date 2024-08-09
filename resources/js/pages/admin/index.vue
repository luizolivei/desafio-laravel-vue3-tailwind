<script setup>
import Container from "@/components/layout/Container.vue";
import { ref, onMounted, computed } from "vue";
import axios from "axios";
import { useStore } from "vuex";

const store = useStore();
const curriculos = ref([]);
const inputMediaSalarial = ref('');
const totalPretensaoSalarial = ref(0);
const mediaPretensaoSalarial = ref(0);

onMounted(async () => {
    try {
        const config = {
            headers: {
                Authorization: `Bearer ${store.getters.getToken}`,
            },
        };
        const response = await axios.get(`/api/all-curriculos`, config);
        if (response.data) {
            curriculos.value = response.data;
            calcularSalarios()
        }
    } catch (error) {
        console.error(error);
        alert('Ocorreu um erro ao carregar os currículos.');
    }
});

const getSalarioClass = (pretencaoSalarial) => {
    if (!inputMediaSalarial.value) return '';
    return parseFloat(pretencaoSalarial) < parseFloat(inputMediaSalarial.value) ? 'below-average' : 'above-average';
};

const calcularSalarios = () => {
    const total = curriculos.value.reduce((acc, curriculo) => acc + parseFloat(curriculo.pretencao_salarial), 0);
    totalPretensaoSalarial.value = total.toFixed(2);
    mediaPretensaoSalarial.value = (total / curriculos.value.length).toFixed(2);
};
</script>

<template>
    <Container>
        <h1 class="text-2xl font-bold mb-4">Lista de Currículos</h1>

        <div class="average-input">
            <label for="media-salarial">Digite a média salarial desejada:</label>
            <input
                id="media-salarial"
                type="number"
                v-model="inputMediaSalarial"
                placeholder="Insira a média salarial"
            />
        </div>

        <table>
            <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
                <th>Sexo</th>
                <th>Estado Civil</th>
                <th>Pretensão Salarial</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="curriculo in curriculos" :key="curriculo.id">
                <td>{{ curriculo.nome }}</td>
                <td>{{ curriculo.email }}</td>
                <td>{{ curriculo.cpf }}</td>
                <td>{{ curriculo.data_nascimento }}</td>
                <td>{{ curriculo.sexo }}</td>
                <td>{{ curriculo.estado_civil }}</td>
                <td :class="getSalarioClass(curriculo.pretencao_salarial)">
                    {{ curriculo.pretencao_salarial }}
                </td>
            </tr>
            </tbody>
        </table>

        <div class="info">
            <p>Total das pretensões salariais: {{ totalPretensaoSalarial }}</p>
            <p>Média das pretensões salariais: {{ mediaPretensaoSalarial }}</p>
        </div>
    </Container>
</template>

<style scoped>
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.below-average {
    background-color: green;
    color: white;
}

.above-average {
    background-color: blue;
    color: white;
}

.average-input {
    margin-bottom: 20px;
}

.average-input input {
    padding: 8px;
    margin-left: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.info {
    margin-top: 20px;
    font-weight: bold;
}
</style>
