<template>
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        <!-- Campo Nome -->
        <div class="flex flex-col">
            <label for="nome" class="font-semibold">Nome</label>
            <input
                type="text"
                id="nome"
                v-model="modelValue.nome"
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
                v-model="modelValue.email"
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
                v-model="modelValue.cpf"
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
                v-model="modelValue.data_nascimento"
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
            <select v-model="modelValue.sexo"
                    id="sexo"
                    required
                    class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                <option value="masculino">Masculino</option>
                <option value="feminino">Feminino</option>
                <option value="outro">Outro</option>
            </select>
            <span v-if="errors.sexo" class="text-red-500 text-sm">
                        {{ errors.sexo[0] }}
                    </span>
        </div>

        <!-- Campo Estado Civil -->
        <div class="flex flex-col">
            <label for="estado_civil" class="font-semibold">Estado Civil</label>
            <select v-model="modelValue.estado_civil"
                    id="estado_civil"
                    required
                    class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                <option value="solteiro">Solteiro</option>
                <option value="casado">Casado</option>
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
                v-model="modelValue.pretencao_salarial"
                class="mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
            />
            <span v-if="errors.pretencao_salarial" class="text-red-500 text-sm">
                        {{ errors.pretencao_salarial[0] }}
                    </span>
        </div>
    </div>
</template>

<script setup>
import {onMounted, ref} from "vue";
import Inputmask from "inputmask";

//ref to mask
const cpfInput = ref(null);
onMounted(() => {
    if (cpfInput.value) {
        Inputmask("999.999.999-99").mask(cpfInput.value);
    }
})

const props = defineProps({
    modelValue: Object,
    errors: Object,
});

const sexoOptions = [
    {value: 'masculino', text: 'Masculino'},
    {value: 'feminino', text: 'Feminino'},
    {value: 'nc', text: 'Prefiro não informar'}
];

const estadoCivilOptions = [
    {value: 'solteiro', text: 'Solteiro'},
    {value: 'casado', text: 'Casado'},
    {value: 'divorciado', text: 'Divorciado'},
    {value: 'viuvo', text: 'Viúvo'},
];
</script>
