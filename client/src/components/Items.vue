<template>
    <v-app>

        <v-container>
            <v-row dense>

                <v-col xs="6" sm="4" md="3" lg="2" xl="1" v-for="item in items" :key="item.id" :to="item.router">

                    <v-card width="150px" class="mx-auto my-3">

                        <v-img :src="item.image_path" height="100px" ></v-img> <!--画像だよ-->

                        <v-card-title> {{ item.name }} </v-card-title> <!--タイトルだよ-->

                        <v-card-subtitle> {{ item.description }} </v-card-subtitle> <!--サブタイトルだよ-->

                        <v-flex text-center>
                            <v-btn class="mr-8 mb-3" fab small color="primary"> <!--プラスアイコンだよ-->
                                <v-icon>mdi-plus</v-icon>
                            </v-btn>
                            <v-btn class="mb-3" fab small color="primary"> <!--マイナスアイコンだよ-->
                                <v-icon>mdi-minus</v-icon>
                            </v-btn>
                        </v-flex>

                    </v-card>

                </v-col>

            </v-row>
        </v-container>

    </v-app>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Item',
    data: () => {
        return {
            items: [],
        }
    },
    created() {
        axios.get('/api/items')
        .then( response =>{
            this.items = response.data;
        });
        this.$store.state.item.items = this.items;
    },
}
</script>