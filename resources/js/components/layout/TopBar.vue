<script setup>
import {computed, onBeforeUnmount, onMounted, ref} from 'vue';
import store from '../../store/index.js';
import Swal from "sweetalert2";

const dropdownOpen = ref(false);
const dropdownRef = ref(null);

const user = computed(() => {
    return store.getters.getUser
})

const toggleDropdown = () => {
    dropdownOpen.value = !dropdownOpen.value;
};

const handleClickOutside = (event) => {
    if (dropdownRef.value && !dropdownRef.value.contains(event.target)) {
        dropdownOpen.value = false;
    }
};

onMounted(() => {
    document.addEventListener('click', handleClickOutside);
});

onBeforeUnmount(() => {
    document.removeEventListener('click', handleClickOutside);
});

async function logout() {
    await store.dispatch('logout');
    await Swal.fire({
        title: 'Usuario desconectado.',
        confirmButtonText: 'OK'
    });
    location.reload();
}
</script>


<template>
    <nav class="border-b border-gray-200 py-1">
        <div class="container mx-auto px-2">
            <div class="flex flex-wrap items-center justify-between mx-auto">
                <a href="/" class="flex items-center p-2">
                    <img src="../../../images/logo.png" class="h-12 mr-1" alt="Company Logo">
                    <div class="flex flex-col">
                        <span class="self-center text-xl font-semibold whitespace-nowrap text-amber-500">Borcelle</span>
                        <span
                            class="self-center text-sm font-semibold whitespace-nowrap tracking-tighter">online store</span>
                    </div>
                </a>
                <div class="flex space-x-3">
                    <template v-if="!user">
                        <a href="/login"
                           class="whitespace-nowrap text-sm md:text-md px-2 md:px-4 py-2 flex justify-center items-center border border-gray-600 rounded-md">
                            Entrar
                        </a>
                        <a href="/register"
                           class="whitespace-nowrap text-sm md:text-md px-2 md:px-4 py-2 flex justify-center items-center border border-gray-600 rounded-md">
                            Cadastrar
                        </a>
                    </template>
                    <template v-else>
                        <div class="relative" ref="dropdownRef">
                            <img @click="toggleDropdown" src="../../../images/user.png"
                                 class="h-10 w-10 rounded-full cursor-pointer border" alt="Profile">
                            <div v-if="dropdownOpen"
                                 class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg">
                                <span class="block px-4 py-2 text-gray-800 border-b bg-gray-100">{{ user.name }}</span>
                                <a href="/curriculo"
                                   class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Currículo</a>
                                <button @click="logout"
                                        class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">Sair
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </nav>
</template>
