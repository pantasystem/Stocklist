<template>
    <div>

        <!-- 検索表示 -->
        <transition>
            <input v-if="this.search" class="search-block" type="text" v-model="key" @input="keyword" />
        </transition>
        <!-- 物一覧画面 -->
        <v-btn @click="searchChange" icon v-if="this.$route.path === '/item'">
            <v-icon>mdi-magnify</v-icon>
        </v-btn>
        <v-btn icon v-if="this.$route.path === '/item'">
            <v-icon>{{sorticon[0]}}</v-icon>
        </v-btn>
        
        <v-btn icon>
            <v-icon>mdi-dots-vertical</v-icon>
        </v-btn>

    </div>
</template>

<script>
export default {
    name: 'Header',
    data () {
        return {
            //検索用キーワード
            key: null,
            search: false,
            //ソートアイコン
            sorticon:[
                'mdi-sort-clock-ascending',
                'mdi-sort-clock-descending',
                'mdi-sort-numeric-ascending',
                'mdi-sort-numeri-descending',
            ],
        }
    },
    methods:{
        searchChange(){
            this.search = !this.search
        },
        keyword(){
            this.$store.state.item.keyword = this.key;
        }
    }
}
</script>

<style scoped>

.search-block{
    font-size: auto;
    border-radius: 3px; /*ボックス角の丸み*/
    border: 2px solid #000; /*枠線*/
}

/* 検索表示アニメーション */
.v-enter {
  opacity: 0;
}
.v-enter-to {
  opacity: 1;
}
.v-enter-active {
  transition: all 500ms;
}

</style>