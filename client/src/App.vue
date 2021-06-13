<template>
    <v-app>

        <v-touch v-on:swiperight="onSwipeRight">

            <v-navigation-drawer v-model="drawer" app>
                <Navigation />
            </v-navigation-drawer>

            <v-app-bar app>
                <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
                <v-toolbar-title @click="top">Stocklist</v-toolbar-title>
            </v-app-bar>

            <v-main>
                <router-view/>
            </v-main>

        </v-touch>

    </v-app>
</template>

<script>
import Navigation from '@/components/Navigation.vue'

export default {
    name: 'App',
    components: {
        Navigation
    },
    data () {
        return {
            drawer: null,
        }
    },
    methods:{
        onSwipeRight(){
            this.drawer = !this.drawer
        },
        top:()=>{
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }
    },
};
</script>
