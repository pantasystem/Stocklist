<template>
    <v-app>

        <v-container>

            <v-row>
                <v-col class="mt-5" cols="12">
                    <v-text-field v-model="keyword" filled label="検索" :prepend-icon="searchIcon"></v-text-field>
                </v-col>
            </v-row>
            
            <v-row dense>

                <v-col xs="6" sm="5" md="3" lg="2" xl="1" v-for="item in search_items" :key="item.id">

                    <v-card width="150px" height="220px" class="ml-3 mb-2" :to="'/item/item-details/' + item.id">

                        <v-img :src="item.image_path" height="100px" ></v-img> <!--画像だよ-->

                        <v-card-title> {{item.name && item.name.length > 7 ? item.name.slice(0,7) + "..." :  item.name }} </v-card-title> <!--タイトルだよ-->

                        <v-card-subtitle> {{item.description && item.description.length > 5 ? item.description.slice(0,5) + "..." :  item.description }} </v-card-subtitle> <!--サブタイトルだよ-->

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

            <v-row>
                <v-overlay style="position: fixed;z-index: 999;" :absolute="absolute" :value="overlay">
                    <v-col clos="12">
                        <v-btn @click="overlay = false">戻る</v-btn>
                    </v-col>
                </v-overlay>
            </v-row>
            
        </v-container>

        <v-fab-transition>
            <v-btn @click="top" fab large dark bottom right style="bottom: 80px; right: 0; position: absolute; margin: 0 16px 16px 0; position: fixed;">
                <v-icon>mdi-chevron-up</v-icon>
            </v-btn>
        </v-fab-transition>

        <v-fab-transition>
            <v-btn @click="overlay = true" fab large dark bottom right style="bottom: 0; right: 0; position: absolute; margin: 0 16px 16px 0; position: fixed;">
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
            overlay: false, //オーバーレイ用
            absolute: true,
        }
    },
    methods:{
        top:()=>{
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
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