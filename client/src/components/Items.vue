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

                    <v-card width="150px" height="220px" class="ml-3 mb-2" :to="'/item-details/' + item.id">

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
            
        </v-container>

        <v-fab-transition>
            <v-btn @click="top" fab large dark bottom right style="bottom: 80px; right: 0; position: absolute; margin: 0 32px 32px 0; position: fixed;">
                <v-icon>mdi-chevron-up</v-icon>
            </v-btn>
        </v-fab-transition>

        <v-fab-transition>
            <v-btn fab large dark bottom right style="bottom: 0; right: 0; position: absolute; margin: 0 32px 32px 0; position: fixed;">
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