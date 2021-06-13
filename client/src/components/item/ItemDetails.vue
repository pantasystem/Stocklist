<template>
    <v-app>
        
        <v-container class="my-auto">

            <v-row justify="center">
                <v-col cols="6">
                    <v-card>
                        <div class="img-card">
                            <img :src="item.image_url">
                        </div>
                    </v-card>
                </v-col>
                <v-col cols="5" class="my-auto">
                    <v-card class="mb-5">
                        <v-card-title>名前：{{item.name}}</v-card-title>
                    </v-card>
                </v-col>
            </v-row>
            
        </v-container>
        {{item}}
        
    </v-app>
</template>

<script>
export default {
    name: 'ItemDetails',
    computed: {
        item(){
            var item;
            for( const i in this.$store.state.item.items ){

                var items = this.$store.state.item.items[i];

                if(items.id == this.$route.params.id){
                    item = items;
                }

            }
            return item
        }
    },
    }
</script>

<style scoped>

.img-card{
    height: 400px;
}

</style>