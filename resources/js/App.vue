<template>
    <TopBar />
    <router-view v-slot="{ Component, route }">
        <div :key="route.name">
            <Component :is="Component" />
        </div>
    </router-view>
    <Footer/>
</template>

<script setup>
import TopBar from "@/components/layout/TopBar.vue";
import Footer from "@/components/layout/Footer.vue";
</script>
