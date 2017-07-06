import Vue from 'vue'
import Router from 'vue-router'
import Home from './components/Home.vue'
import Login from './components/Login.vue'
import Dashboard from './components/Dashboard.vue'
import Settings from './components/Settings.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      component: Home
      // meta: {isLoggedIn: true}
    },
    {
      path: '/dashboard',
      component: Dashboard
      // meta: {isLoggedIn: true}
    }
  ]
})
