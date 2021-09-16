<template>
    <div>

        <v-list>

            <!-- <v-subheader>router</v-subheader> -->

            <v-list-item-group color="primary">

                <v-list-item v-for="(router, i) in routers" :key="i" :to="router.router">

                    <v-list-item-icon>
                        <v-icon>{{ router.icon }}</v-icon>
                    </v-list-item-icon>

                    <v-list-item-content>
                            <v-list-item-title v-text="router.text"></v-list-item-title>
                    </v-list-item-content>

                </v-list-item>

            </v-list-item-group>

        </v-list>

    </div>
</template>

<script>
export default {
    name: 'Navigation',
    data: () => ({
        routers: [
            // { text: 'ホーム', router: '/', icon: 'mdi-home' },
            { text: '物一覧', router: '/item', icon: 'mdi-briefcase' },
            { text: '収納一覧', router: '/box', icon: 'mdi-archive' },
            { text: 'ログアウト', router: '/login', icon: 'mdi-account-arrow-right' }, //一時的ログイン画面
        ],
    }),
}
</script>