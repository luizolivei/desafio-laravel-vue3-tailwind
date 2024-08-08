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
import { mapActions } from 'vuex';

export default {
    data() {
        return {
            email: '',
            password: ''
        };
    },
    methods: {
        ...mapActions(['login']),
        async userLogin() {
            try {
                axios.post('/api/login', {
                    email: this.email,
                    password: this.password
                })
                    .then(async response => {
                        const user = response.data.user;
                        const token = response.data.token;
                        console.log("token ", token)
                        console.log("user ", user)
                        await this.login({user: user, token: token});
                        alert('Login bem-sucedido!');
                        this.$router.push({name: 'Home'});
                    })
                    .catch(error => {
                        console.error(error);
                    });


            } catch (error) {
                console.error(error);
            }
        }
    }
};
</script>
