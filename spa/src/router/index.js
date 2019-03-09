import Vue from 'vue'
import Router from 'vue-router'
import Dashboard from '../components/sites/Dashboard'
import Members from '../components/sites/Members'
import Projects from '../components/sites/Projects'
import Meetings from '../components/sites/Meetings'
import Companies from '../components/sites/Companies'
import Events from '../components/sites/Events'

Vue.use(Router)

export default new Router({
  routes: [
      {
          path: '/',
          name: 'Dashboard',
          component: Dashboard
      },
      {
          path: '/members',
          name: 'Members',
          component: Members
      },
      {
          path: '/projects',
          name: 'Projects',
          component: Projects
      },
      {
          path: '/meetings',
          name: 'Meetings',
          component: Meetings
      },
      {
          path: '/companies',
          name: 'Companies',
          component: Companies
      },
      {
          path: '/events',
          name: 'Events',
          component: Events
      },
  ]
})
