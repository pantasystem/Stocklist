<template>
    <v-app>
        <v-container>
            <!-- 物表示 -->
            <v-row dense class="mt-2">

                <v-col class="card-col" cols="6" xs="6" sm="4" md="3" lg="2" xl="1" v-for="item in searchItems" :key="item.id">

                    <v-card class="card" :to="'/item/item-details/' + item.id">

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
    data:()=>{
        return {
            rowCount:0,
        }
    },
    computed: {
        //物検索
        searchItems(){
            let items = this.$store.state.item.items.filter(items => {
                return items.name.includes(this.$store.state.item.keyword)
            })
            switch(this.$store.state.item.sort){
                case 0:
                    return items
                case 1:
                    return items.reverse()
                case 2:
                    return items.sort((a, b)=>{return a.item_quantity - b.item_quantity});
                case 3:
                    return items.sort((a, b)=>{return a.item_quantity - b.item_quantity}).reverse();
                default:
                    return ''
            }
        },
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

.card-col{
    display: flex;
    justify-content: center;
}

.card{
    width: 150px;
    height: 200px;
    text-align: left;
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