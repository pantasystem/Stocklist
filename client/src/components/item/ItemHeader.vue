<template>
    <div>
        <!-- 検索表示 -->
        <transition>
            <input v-if="this.search" class="search-block" type="text" v-model="key" @input="keyword" />
        </transition>
        <!-- 物一覧画面 -->
        <v-btn @click="searchChange" icon>
            <v-icon>mdi-magnify</v-icon>
        </v-btn>
        <v-menu class="sortMenu" v-model="sort" transition="scroll-x-reverse-transition">
            <template v-slot:activator="{ on, attrs }">
                <v-btn icon v-bind="attrs" v-on="on">
                    <v-icon>{{sortIcon[sortNum]}}</v-icon>
                </v-btn>
            </template>
            <v-list>
                <v-list-item v-for="(list, i) in sortList" :key="i" @click="sortChange(i)" style="text-align: center;">
                    <v-list-item-title>{{list.title}}</v-list-item-title>
                </v-list-item>
            </v-list>
        </v-menu>
    </div>
</template>

<script>
export default {
    name: 'ItemAdd',
    data () {
        return {
            //検索用キーワード
            key: null,
            search: false,
            //ソート
            sort: false,
            sortNum: 0,
            sortIcon:[
                'mdi-sort-clock-ascending',
                'mdi-sort-clock-descending',
                'mdi-sort-numeric-ascending',
                'mdi-sort-numeric-descending',
            ],
            sortList:[
                {title: '物：降順'},
                {title: '物：昇順'},
                {title: '個数：降順'},
                {title: '個数：昇順'},
            ]
        }
    },
    methods:{
        searchChange(){
            this.search = !this.search
        },
        keyword(){
            this.$store.state.item.keyword = this.key;
        },
        sortChange(i){
            this.sortNum = i
            this.$store.state.item.sort = i
        }
    },
    created(){
        this.$store.state.item.keyword = '';
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