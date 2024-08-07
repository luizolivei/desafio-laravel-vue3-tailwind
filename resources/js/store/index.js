import { createStore } from 'vuex';
import axios from 'axios';

export default createStore({
    state: {
        user: null,
        token: null,
    },
    mutations: {
        setUser(state, user) {
            state.user = user;
        },
        setToken(state, token) {
            state.token = token;
        },
        logout(state) {
            state.user = null;
            state.token = null;
        }
    },
    actions: {
        async register({ commit }, userData) {
            const response = await axios.post('/register', userData);
            commit('setUser', response.data.user);
            commit('setToken', response.data.token);
        },
        async login({ commit }, credentials) {
            const response = await axios.post('/login', credentials);
            commit('setUser', response.data.user);
            commit('setToken', response.data.token);
        },
        logout({ commit }) {
            commit('logout');
        }
    },
    getters: {
        isAuthenticated(state) {
            return !!state.token;
        },
        userRole(state) {
            return state.user ? state.user.role : null;
        }
    }
});
