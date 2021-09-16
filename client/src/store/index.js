import Vue from 'vue'
import Vuex from 'vuex'
import user from '@/store/modules/user.js'
import item from '@/store/modules/item.js'
import stock from '@/store/modules/stock.js'
import box from '@/store/modules/box.js'
import category from '@/store/modules/category.js'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: { user, item, stock, box, category },
})
