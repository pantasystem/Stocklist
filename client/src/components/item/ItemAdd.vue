<template>
    <v-app class="modal-window">

        <!-- 追加画面 表示 -->
        <v-dialog v-model="dialog" max-width="600px">
            <v-card>

                <v-card-title>
                    <span class="headline">追加</span>
                    <v-spacer></v-spacer>
                    <v-btn icon @click="dialog = false">
                    <v-icon>mdi-close</v-icon>
                    </v-btn>
                </v-card-title>

                <form>

                    <v-card-text>
                        <v-container>
                            
                            <div v-if="this.imgUrl">
                                <v-flex class="d-flex justify-center">
                                    <img height="100%" width="100%" :src="this.imgUrl">
                                </v-flex>
                            </div>

                            <v-flex>
                                <v-file-input show-size label="画像" prepend-icon="mdi-image" v-model="image" @change="img" accept="image/*" />
                            </v-flex>

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
                            <v-btn @click="itemAdd" block dark>追加</v-btn>
                        </v-container>
                    </v-card-actions>

                </form>

            </v-card>
        </v-dialog>

        <!-- フローティングアクションボタン表示 -->
        <v-fab-transition>
            <v-btn @click="dialog = true" fab large dark bottom right class="fab">
                <v-icon>mdi-briefcase-plus</v-icon>
            </v-btn>
        </v-fab-transition>
        
    </v-app>
</template>

<script>
import axios from 'axios';

export default {
    name: 'ItemAdd',
    data:()=>{
        return{
            //モーダルウィンドウ用
            dialog: false,
            //POST用
            name: '',
            description: '',
            disposable: false,
            categoryId: null,
            image: null,
            //imgプレビュー用
            imgUrl: '',
        }
    },
    methods:{
        itemAdd() {
            let data = new FormData();
            data.append("image", this.image);
            data.append("name", this.name);
            data.append("is_disposable", this.disposable);
            data.append("description", this.description);
            data.append("category_id", this.categoryId);

            axios
            .post("/api/items", data)
            .then(() => {
                this.$store.dispatch('item/getItems')
                this.dialog = false;
            })
            .catch(error => {
                console.log(error);
            });
        },
        img(file) {
            if (file) {
                const fr = new FileReader()
                fr.readAsDataURL(file)
                fr.addEventListener('load', () => {
                    this.imgUrl = fr.result
                })
            } else {
                this.imgUrl = ''
            }
        }
    },
}
</script>

<style scoped>

.fab{
    bottom: 0;
    right: 0;
    position: absolute;
    margin: 0 32px 32px 0;
    position: fixed;
}

.modal-window{
    position:fixed;
}

</style>