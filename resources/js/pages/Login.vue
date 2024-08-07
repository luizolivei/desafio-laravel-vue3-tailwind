<template>
    <div>
        <h1>Login</h1>
        <form @submit.prevent="login">
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
        async login() {
            try {
                await this.login({ email: this.email, password: this.password });
                this.$router.push({ name: 'Home' });
            } catch (error) {
                console.error(error);
            }
        }
    }
};
</script>
