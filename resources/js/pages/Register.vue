<template>
    <div>
        <h1>Registrar</h1>
        <form @submit.prevent="register">
            <input v-model="name" placeholder="Nome" />
            <input v-model="email" placeholder="Email" type="email" />
            <input v-model="password" placeholder="Senha" type="password" />
            <input v-model="password_confirmation" placeholder="Confirme a Senha" type="password" />
            <button type="submit">Registrar</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            name: '',
            email: '',
            password: '',
            password_confirmation: ''
        };
    },
    methods: {
        register() {
            axios.post('/api/register', {
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation
            })
                .then(response => {
                    alert('Usuário registrado com sucesso!');
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
};
</script>
