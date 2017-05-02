import Vue from 'vue'
import Router from 'vue-router'
import moive from '@/components/moive'
import discovery from '@/components/discovery'
import home from '@/components/home'
import cinema from '@/components/cinema'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      component: moive
    },
    {
      path: '/moive',
      component: moive
    },
    {
      path: '/discovery',
      component: discovery
    },
    {
      path: '/home',
      component: home
    },
    {
      path: '/cinema',
      component: cinema
    }
  ]
})
