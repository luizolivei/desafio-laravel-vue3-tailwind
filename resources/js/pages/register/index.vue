<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-md w-full bg-white shadow-md rounded px-8 py-6">
            <h1 class="text-2xl font-bold mb-6 text-center">Registrar</h1>
            <form @submit.prevent="register">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nome</label>
                    <input
                        v-model="name"
                        placeholder="Nome"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    />
                    <p v-if="errors.name" class="text-red-500 text-xs italic mt-2">{{ errors.name[0] }}</p>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input
                        v-model="email"
                        placeholder="Email"
                        type="email"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    />
                    <p v-if="errors.email" class="text-red-500 text-xs italic mt-2">{{ errors.email[0] }}</p>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Senha</label>
                    <input
                        v-model="password"
                        placeholder="Senha"
                        type="password"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    />
                    <p v-if="errors.password" class="text-red-500 text-xs italic mt-2">{{ errors.password[0] }}</p>
                </div>
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirme a Senha</label>
                    <input
                        v-model="password_confirmation"
                        placeholder="Confirme a Senha"
                        type="password"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    />
                    <p v-if="errors.password_confirmation" class="text-red-500 text-xs italic mt-2">{{ errors.password_confirmation[0] }}</p>
                </div>
                <div class="flex items-center justify-between">
                    <button
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    >
                        Registrar
                    </button>
                    <button
                        type="button"
                        @click="goToLogin"
                        class="text-blue-500 hover:text-blue-700 font-bold py-2 px-4 focus:outline-none focus:shadow-outline"
                    >
                        Já tem uma conta?
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';
import Swal from "sweetalert2";

export default {
    setup() {
        const name = ref('');
        const email = ref('');
        const password = ref('');
        const password_confirmation = ref('');
        const errors = ref({});
        const router = useRouter();

        const register = async () => {
            try {
                await axios.post('/api/register', {
                    name: name.value,
                    email: email.value,
                    password: password.value,
                    password_confirmation: password_confirmation.value
                });
                await Swal.fire({
                    title: 'Usuário registrado com sucesso!',
                    text: 'Agora você pode fazer login.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                router.push({ name: 'Login' });
            } catch (error) {
                if (error.response && error.response.data.errors) {
                    errors.value = error.response.data.errors;
                } else {
                    console.error(error);
                }
            }
        };

        const goToLogin = () => {
            router.push({ name: 'Login' });
        };

        return {
            name,
            email,
            password,
            password_confirmation,
            errors,
            register,
            goToLogin
        };
    }
};
</script>
