<template>
    <div>

        <v-list>

        <!-- <v-subheader>router</v-subheader> -->

        <v-list-item-group color="primary">

            <v-list-item v-for="(item, i) in items" :key="i" :to="item.router">

                <v-list-item-icon>
                    <v-icon>{{ item.icon }}</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                        <v-list-item-title v-text="item.text"></v-list-item-title>
                </v-list-item-content>

            </v-list-item>

        </v-list-item-group>

        </v-list>
        

    </div>
</template>

<script>

    export default {
        name: 'Header',
        data: () => ({
            items: [
                { text: 'ホーム', router: '/', icon: 'mdi-home' },
                { text: '物一覧', router: 'item', icon: 'mdi-briefcase' },
            ],
        }),
    }
</script>