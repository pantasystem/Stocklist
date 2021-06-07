import Vue from 'vue'
import VueRouter from 'vue-router'

//home
import Home from '../views/Home.vue'

//user
import Login from '../views/Login.vue'

//item
import Item from '../views/Item.vue'
import ItemDetail from '../views/ItemDetail.vue'

// import store from '../store/index'

Vue.use(VueRouter)


const routes = [
    //home
    {
        path: '/',
        name: 'Home',
        component: Home,
        meta: {
            requiresAuth: true,
        }
    },
    //user
    {
        path: '/login',
        name: 'Login',
        component: Login
    },
    //item
    {
        path: '/item',
        name: 'Item',
        component: Item,
        meta: {
            requiresAuth: true
        }
    },
    //詳細
    {
        path: '/item/item-details/:id',
        name: 'ItemDetail',
        component: ItemDetail,
    }
]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

router.beforeEach((to, from, next) => {
    // if(to.matched.some(record => record.meta.requiresAuth) && !store.state.user.login) {
    //     next('/login');
    // }else{
    //     next();
    // }
    next(); //いちいちログイン面倒
})

export default router
