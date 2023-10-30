<template>
    <v-app>
        <HeaderComponent />
        <transition name="slide-x" mode="out-in">
            <router-view class="h-100 w-100 d-flex justify-center align-center"></router-view>
        </transition>
    </v-app>
</template>
<script setup>
    import HeaderComponent from './components/Header.vue'
</script>
<style lang="scss">
    @import "../scss/app.scss";

    .slide-x-enter-active,
    .slide-x-leave-active {
        transition: transform .6s cubic-bezier(0.25, 0.8, 0.5, 1), opacity .8s;
        opacity: 1;
    }

    .slide-x-enter-from,
    .slide-x-leave-to {
        opacity: 0;
    }

    .slide-x-enter-from {
        transform: translateX(100px);
    }

    .slide-x-leave-to {
        transform: translateX(-100px);
    }
</style>
