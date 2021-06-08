<template>
    <v-app>

        <v-container>

            <!-- 検索表示 -->
            <v-row>
                <v-col class="mt-5" cols="12">
                    <v-text-field v-model="keyword" filled label="検索" :prepend-icon="searchIcon"></v-text-field>
                </v-col>
            </v-row>
            
            <!-- 物表示 -->
            <v-row dense>

                <v-col xs="6" sm="4" md="3" lg="2" xl="1" v-for="item in search_items" :key="item.id">

                    <v-card class="card ml-3 mb-2" :to="'/item/item-details/' + item.id">

                        <v-img class="img" :src="item.image_path"></v-img> <!--画像だよ-->

                        <v-card-title> <span class="card-text"> {{item.name}} </span> </v-card-title> <!--タイトルだよ-->

                        <v-card-subtitle class="card-text"> {{item.item_quantity}} </v-card-subtitle> <!--サブタイトルだよ-->

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

            <!-- オーバーレイ表示 -->
            <v-row>
                <v-overlay class="overlay" style="z-index: 999;" :absolute="absolute" :value="overlay">
                    <v-col clos="12">
                        <v-btn @click="overlay = false">戻る</v-btn>
                    </v-col>
                </v-overlay>
            </v-row>
            
        </v-container>

        <!-- フローティングアクションボタン表示 -->
        <v-fab-transition>
            <v-btn @click="overlay = true" fab large dark bottom right class="fab">
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
            //検索用
            keyword: '',
            searchIcon: 'mdi-briefcase-search',
            //オーバーレイ用
            overlay: false,
            absolute: true,
        }
    },
    computed: {
        //物検索
        search_items(){
            return this.$store.state.item.items.filter(items => {
                return items.name.includes(this.keyword)
            })
        }
    },
    created() {
        //物取得API
        if(this.$store.state.user.login){
            axios.get('/api/items')
            .then( response =>{
                this.$store.state.item.items = response.data;
            });
        }
    },
}
</script>
<style scoped>

.card{
    width: 150px;
    height: 200px;
}

.card-text{
    font-size: 15px; 
    width: 100%;
    height: 40px;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
}

.img{
    width: 100%;
    height: 100px;
}

.fab{
    bottom: 0;
    right: 0;
    position: absolute;
    margin: 0 32px 32px 0;
    position: fixed;
}

.overlay{
    position: fixed;
}

</style>