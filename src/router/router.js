import Vue from 'vue'
import Router from 'vue-router'
import moive from '@/components/moive/moive'
import discovery from '@/components/discovery/discovery'
import home from '@/components/home/home'
import cinema from '@/components/cinema/cinema'

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
