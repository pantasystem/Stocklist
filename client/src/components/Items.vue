<template>
    <v-app>

        <v-container>

            <v-row>
                <v-col xs="12" sm="12" md="6" lg="6" xl="8">
                    <v-text-field v-model="keyword" filled label="検索" :prepend-icon="searchIcon"></v-text-field>
                </v-col>
            </v-row>
            
            <v-row dense>

                <v-col xs="6" sm="5" md="3" lg="2" xl="1" v-for="item in search_items" :key="item.id">

                    <v-card width="150px" class="mx-auto mb-2" :to="'/item-details/' + item.id">

                        <v-img :src="item.image_path" height="100px" ></v-img> <!--画像だよ-->

                        <v-card-title> {{ item.name }} </v-card-title> <!--タイトルだよ-->

                        <v-card-subtitle> {{ item.description }} </v-card-subtitle> <!--サブタイトルだよ-->

                        <!-- プラマイボタン -->
                        <!-- <v-flex text-center>
                            <v-btn class="mr-8 mb-3" fab small color="primary">
                                <v-icon>mdi-plus</v-icon>
                            </v-btn>
                            <v-btn class="mb-3" fab small color="primary">
                                <v-icon>mdi-minus</v-icon>
                            </v-btn>
                        </v-flex> -->

                    </v-card>

                </v-col>

            </v-row>
            
        </v-container>

        <v-fab-transition>
            <v-btn fab large dark bottom right style="bottom: 0; right: 0; position: absolute; margin: 0 16px 16px 0; position: fixed;">
                <v-icon>mdi-plus</v-icon>
            </v-btn>
        </v-fab-transition>
            
    </v-app>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Item',
    data: () => {
        return {
            keyword: '', //検索用
            searchIcon: 'mdi-briefcase-search',
            items: [], //物用
        }
    },
    computed: {
        //物検索
        search_items(){
            return this.items.filter(item => {
                return item.name.includes(this.keyword)
            })
        }
    },
    created() {
        //物取得
        if(this.$store.state.user.login){
                axios.get('/api/items')
            .then( response =>{
                this.items = response.data;
            });
            this.$store.state.item.items = this.items;
        }
    },
}
</script>