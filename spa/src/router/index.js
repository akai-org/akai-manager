import Vue from 'vue'
import Router from 'vue-router'
import Dashboard from '../components/sites/Dashboard'
import Members from '../components/sites/Members'
import Projects from '../components/sites/Projects'

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
      }
  ]
})
