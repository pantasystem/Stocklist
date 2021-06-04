import Vue from 'vue'
import Vuex from 'vuex'
import user from '@/store/modules/user.js'
import item from '@/store/modules/item.js'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: { user, item },
})
