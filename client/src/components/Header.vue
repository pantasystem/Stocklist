<template>
<div>

    <router-link to="/">
        <v-list-item>
            ホーム
        </v-list-item>
    </router-link>

    <router-link to="/login">
        <v-list-item>
            ログイン
        </v-list-item>
    </router-link>

    <router-link to="/item">
        <v-list-item>
            物一覧
        </v-list-item>
    </router-link>

</div>
</template>

<script>
    export default {
        name: 'Header',
    }
</script>