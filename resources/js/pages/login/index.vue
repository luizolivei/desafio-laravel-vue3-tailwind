<template>
    <div>
        <h1>Login</h1>
        <form @submit.prevent="userLogin">
            <div>
                <label for="email">Email</label>
                <input type="email" v-model="email" placeholder="Email" />
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" v-model="password" placeholder="Password" />
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
import store from '../../store/index.js';

export default {
    data() {
        return {
            email: '',
            password: ''
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
                alert('Login bem-sucedido!');
                if (store.getters.userRole === 2)
                    this.$router.push({name: 'Admin'});
                this.$router.push({name: 'Home'});
            } catch (error) {
                console.error(error);
            }
        }
    }
};
</script>
