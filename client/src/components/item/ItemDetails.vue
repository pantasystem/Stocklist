<template>
    <v-app>

        <ItemEdit />
        
        <v-container>

            <v-row>
                <v-col cols="12">
                    <v-card class="img-card">
                        <img :src="item.image_path">
                    </v-card>
                </v-col>
            </v-row>

            <v-row justify="center">
                <v-col cols="12" md="6">
                    <v-card class="details-card">
                        <v-card-title>名前：{{item.name}}</v-card-title>
                        <v-card-text>消耗品{{item.is_disposable ? "だよ" : "じゃないよ" }}</v-card-text>
                        <v-card-text>説明：{{item.description}}</v-card-text>
                    </v-card>
                </v-col>
                <v-col cols="12" md="6">
                    <v-card class="stock-card">
                        <v-card-title>Stock</v-card-title>
                        <!-- <v-card-text>場所：{{stock}}</v-card-text>
                        <v-card-text>個数：{{stock}}</v-card-text>
                        <v-card-text>名前：{{stock}}</v-card-text> -->
                    </v-card>
                </v-col>
            </v-row>
            
        </v-container>

    </v-app>
</template>

<script>
import ItemEdit from '@/components/item/ItemEdit.vue'

export default {
    name: 'ItemDetails',
    components:{
        ItemEdit
    },
    computed:{
        item(){
            var item
            for( const i in this.$store.state.item.items ){

                var items = this.$store.state.item.items[i];

                if(items.id == this.$route.query.id){
                    item = items;
                }
        
            }
            return item
        },
        stock(){
            var stock
            for( const i in this.$store.state.stock.stocks ){
    
                var stocks = this.$store.state.item.items[i];
    
                if(stocks.id == this.item.stock_ids){
                    stock = stocks;
                }
    
            }
            return stock
        }
    },
    created() {
        
        //取得
        this.$store.dispatch('item/getItems')
        this.$store.dispatch('stock/getStocks')

    },
}
</script>

<style scoped>

.img-card{
    height: 300px;
    display: flex;
    justify-content: center;
}

.stock-card{
    height: 300px;
}

.details-card{
    height: 300px;
}

</style>