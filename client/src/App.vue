<template>
    <v-app>
        <head>
            <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
        </head>

        <v-navigation-drawer
        v-model="drawer"
        app
        >
        <Header />
        </v-navigation-drawer>

        <v-app-bar app>
        <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

        <v-toolbar-title>Stocklist</v-toolbar-title>
        </v-app-bar>

        <v-main>
            <router-view/>
        </v-main>
    </v-app>
</template>

<script>
import Header from '@/components/Header.vue'

export default {
    name: 'App',
    components: {
        Header
    },
    data () {
        return {
            drawer: null,
        }
    },
};
</script>
