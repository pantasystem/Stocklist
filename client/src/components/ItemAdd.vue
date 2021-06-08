<template>
    <v-app>

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

                    <!-- 'name' => ['required', 'string', 'max:20'],
                    'is_disposable' => ['required', Rule::in(['true', 'false'])],
                    'image' => ['required','image'],
                    'description' => ['max:255', 'string'],
                    'category_id' => [
                        Rule::exists('categories', 'id')->where(function($query) use ($homeId) {
                            $query->where('home_id', '=', $homeId);
                        }),
                    ] -->

                    <v-card-text>
                        <v-container grid-list-md>
                            <div v-if="this.img">
                                <v-flex>
                                    <img :src="this.img">
                                </v-flex>
                            </div>
                            <v-flex xs12>
                                <v-file-input show-size label="画像" prepend-icon="mdi-image" />
                            </v-flex>
                            <v-flex xs12>
                                <v-text-field label="名前" prepend-icon="mdi-briefcase" />
                            </v-flex>
                            <v-row justify="center">
                                <v-flex xs5 class="mx-auto">
                                    <v-switch label="使い捨て" />
                                </v-flex>
                                <v-flex xs5 class="mx-auto">
                                    <v-select label="カテゴリー" />
                                </v-flex>
                            </v-row>
                            <v-flex xs12 class="mt-5">
                                <v-textarea filled label="説明" />
                            </v-flex>
                        </v-container>
                    </v-card-text>

                    <v-card-actions>
                        <v-container>
                            <v-btn block dark>追加</v-btn>
                        </v-container>
                    </v-card-actions>

                </form>
            </v-card>
        </v-dialog>

        <!-- フローティングアクションボタン表示 -->
        <v-fab-transition>
            <v-btn @click="dialog = true" fab large dark bottom right class="fab">
                <v-icon>mdi-plus</v-icon>
            </v-btn>
        </v-fab-transition>
        
    </v-app>
</template>

<script>
    export default {
        name: 'ItemAdd',
        data:()=>{
            return{
                //モーダルウィンドウ用
                dialog: false,
                //POST用
                img: null,
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

</style>