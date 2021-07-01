<template>
    <v-app class="modal-window">

        <!-- 追加画面 表示 -->
        <v-dialog v-model="$store.state.item.itemEdit" max-width="600px">
            <v-card>

                <v-card-title>
                    <span class="headline">編集</span>
                    <v-spacer></v-spacer>
                    <v-btn icon @click="dialog = false">
                    <v-icon>mdi-close</v-icon>
                    </v-btn>
                </v-card-title>

                <form>

                    <v-card-text>
                        <v-container>
                            
                            <v-flex>
                                <v-text-field label="名前" prepend-icon="mdi-briefcase" v-model="name" />
                            </v-flex>

                            <v-row justify="center">
                                <v-flex xs5 class="mx-auto">
                                    <v-switch label="使い捨て" v-model="disposable" />
                                </v-flex>
                                <v-flex xs5 class="mx-auto">
                                    <v-select label="カテゴリー" v-model="categoryId" item-text="name" item-value="id" :items="this.$store.state.box.boxes" />
                                </v-flex>
                            </v-row>

                            <v-flex class="mt-5">
                                <v-textarea filled label="説明" v-model="description" />
                            </v-flex>

                        </v-container>
                    </v-card-text>

                    <v-card-actions>
                        <v-container>
                            <v-btn @click="itemAdd" block dark>保存</v-btn>
                        </v-container>
                    </v-card-actions>

                </form>

            </v-card>
        </v-dialog>
        
    </v-app>
</template>

<script>
import axios from 'axios';

export default {
    name: 'ItemAdd',
    data:()=>{
        return{
            //POST用
            name: '',
            description: '',
            disposable: false,
            categoryId: null,

            // 'name' => ['required', 'string', 'max:20'],
            // 'is_disposable' => ['required', 'boolean'],
            // 'description' => ['max:255'],
            // 'category_id' => [
            //     Rule::exists('categories', 'id')->where(function($query) use ($homeId) {
            //         $query->where('home_id', '=', $homeId);
            //     })
            // ]
            
        }
    },
    methods:{
        itemAdd() {
            axios
            .put("/api/items/" + this.$route.query.id, {
                "name": this.name,
                "is_disposable": this.disposable,
                "description": this.description,
                "category_id": this.categoryId,
            })
            .then(() => {
                this.$store.dispatch('item/getItems')
                this.$store.state.item.itemEdit = false;
            })
            .catch(error => {
                console.log(error);
            });
        },
    },
}
</script>

<style scoped>

.modal-window{
    position:fixed;
    z-index:999;
}

</style>