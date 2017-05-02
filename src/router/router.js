import Vue from 'vue'
import Router from 'vue-router'
import moive from '@/components/moive/moive'
import discovery from '@/components/discovery/discovery'
import home from '@/components/home/home'
import cinema from '@/components/cinema/cinema'
import details from '@/components/moive/children/details'
import ticket from '@/components/moive/children/ticket'
import presell from '@/components/moive/children/presell'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '',
      component: moive,
    },
    {
      path: '/moive',
      component: moive,
      children: [
        {
          path: 'details',
          component: details
        },
        {
          path: 'ticket',
          component: ticket
        },
        {
          path: 'presell',
          component: presell
        }
      ]
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
