<template>
    <div>
        <h1>Register</h1>
        <form @submit.prevent="register">
            <div>
                <label for="name">Name</label>
                <input type="text" v-model="name" placeholder="Name" />
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" v-model="email" placeholder="Email" />
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" v-model="password" placeholder="Password" />
            </div>
            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" v-model="password_confirmation" placeholder="Confirm Password" />
            </div>
            <button type="submit">Register</button>
        </form>
    </div>
</template>

<script>
import { ref } from 'vue';
import { useStore } from 'vuex';
import { useRouter } from 'vue-router';

export default {
    setup() {
        const name = ref('');
        const email = ref('');
        const password = ref('');
        const password_confirmation = ref('');
        const store = useStore();
        const router = useRouter();

        const register = async () => {
            try {
                await store.dispatch('register', {
                    name: name.value,
                    email: email.value,
                    password: password.value,
                    password_confirmation: password_confirmation.value,
                    role: 'user' // Role fixed as 'user' for registration
                });
                router.push({ name: 'Home' });
            } catch (error) {
                console.error(error);
            }
        };

        return {
            name,
            email,
            password,
            password_confirmation,
            register
        };
    }
};
</script>
