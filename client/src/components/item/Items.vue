<template>
    <v-app>
        <v-container>
            <!-- 物表示 -->
            <v-row dense>

                <v-col xs="6" sm="4" md="3" lg="2" xl="1" v-for="item in items" :key="item.id">

                    <v-card class="card ml-3 mb-2" :to="'/item/item-details/' + item.id">

                        <!--画像だよ-->
                        <v-img class="img" :src="item.image_path"></v-img>

                        <!--タイトルだよ-->
                        <v-card-title> <span class="card-text"> {{item.name}} </span> </v-card-title>

                        <!--サブタイトルだよ-->
                        <v-card-subtitle class="card-text"> {{item.item_quantity}} </v-card-subtitle>

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
    </v-app>
</template>

<script>

export default {
    name: 'Item',
    data: () => {
        return {
            items:[
                {name: 'test-1name', item_quantity: 'test-item_quantity'},
                {name: 'test-2name', item_quantity: 'test-item_quantity'},
                {name: 'test-3name', item_quantity: 'test-item_quantity'},
            ],
        }
    },
    computed: {
        //物検索
        search_items(){
            return this.$store.state.item.items.filter(items => {
                return items.name.includes(this.$store.state.item.keyword)
            })
        }
    },
    created() {
        //物取得API
        this.$store.dispatch('item/getItems')
    },
}
</script>
<style scoped>

.search-block{
    width: 80%;
    position: absolute;
    z-index: 10;
}

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

</style>