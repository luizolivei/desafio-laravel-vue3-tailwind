import { createStore } from 'vuex';
import createPersistedState from 'vuex-persistedstate';

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
        async login({ commit }, data) {
            commit('setUser', data.user);
            commit('setToken', data.token);
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
        },
        getToken(state) {
            return state.token;
        },
        getUser(state) {
            return state.user;
        },
    },
    plugins: [createPersistedState()]
});
