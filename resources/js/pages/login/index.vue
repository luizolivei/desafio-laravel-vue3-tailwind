<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-md w-full bg-white shadow-md rounded px-8 py-6">
            <h1 class="text-2xl font-bold mb-6 text-center">Login</h1>
            <form @submit.prevent="userLogin">
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input
                        type="email"
                        v-model="email"
                        placeholder="Email"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    />
                    <p v-if="errors.email" class="text-red-500 text-xs italic mt-2">{{ errors.email[0] }}</p>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Senha</label>
                    <input
                        type="password"
                        v-model="password"
                        placeholder="Senha"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    />
                    <p v-if="errors.password" class="text-red-500 text-xs italic mt-2">{{ errors.password[0] }}</p>
                </div>
                <div class="flex items-center justify-between">
                    <button
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    >
                        Entrar
                    </button>
                    <button
                        type="button"
                        @click="goToRegister"
                        class="text-blue-500 hover:text-blue-700 font-bold py-2 px-4 focus:outline-none focus:shadow-outline"
                    >
                        Não tem uma conta?
                    </button>
                </div>
                <span v-if="errors.user" class="text-red-500 text-xs italic mt-2">{{ errors.user[0] }}</span>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import store from '../../store/index.js';
import Swal from 'sweetalert2';
export default {
    data() {
        return {
            email: '',
            password: '',
            errors: {}
        };
    },
    methods: {
        async userLogin() {
            try {
                const response = await axios.post('/api/login', {
                    email: this.email,
                    password: this.password
                });
                const user = response.data.user;
                const token = response.data.token;
                await store.dispatch('login', {user, token});
                if (store.getters.userRole === 2)
                    return this.$router.push({name: 'Admin'});
                this.$router.push({name: 'Curriculo'});
            } catch (error) {
                if (error.response && error.response.data.errors) {
                    this.errors = error.response.data.errors;
                } else {
                    console.log(error);
                    await Swal.fire({
                        title: error.message,
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    });
                }
            }
        },
        goToRegister() {
            this.$router.push({name: 'Register'});
        }
    }
};
</script>
