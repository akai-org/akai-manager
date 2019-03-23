/*eslint-disable*/
import Vue from 'vue'
import Router from 'vue-router'
import Dashboard from '../components/sites/Dashboard'
import Members from '../components/sites/Members/Members'
import Projects from '../components/sites/Projects/Projects'
import Meetings from '../components/sites/Meetings/Meetings'
import Companies from '../components/sites/Companies/Companies'
import Events from '../components/sites/Events/Events'
import Login from '../components/sites/Login'
import MeetingCreate from '../components/sites/Meetings/MeetingCreate'
import MeetingShow from '../components/sites/Meetings/MeetingShow';

Vue.use(Router)

export default new Router({
  routes: [
      {
          path: '/',
          name: 'Dashboard',
          meta: {layout: "dashboard"},
          component: Dashboard
      },
      {
          path: '/members',
          name: 'Members',
          meta: {layout: "dashboard"},
          component: Members
      },
      {
          path: '/projects',
          name: 'Projects',
          meta: {layout: "dashboard"},
          component: Projects
      },
      {
          path: '/meetings',
          name: 'Meetings',
          meta: {layout: "dashboard"},
          component: Meetings
      },
      {
          path: '/meetings/create',
          name: 'MeetingCreate',
          meta: {layout: "dashboard"},
          component: MeetingCreate
      },
      {
          path: '/meetings/:id',
          name: 'MeetingShow',
          meta: {layout: "dashboard"},
          component: MeetingShow,
          props: true
      },
      {
          path: '/companies',
          name: 'Companies',
          meta: {layout: "dashboard"},
          component: Companies
      },
      {
          path: '/events',
          name: 'Events',
          meta: {layout: "dashboard"},
          component: Events
      },
      {
          path: '/login',
          name: 'Login',
          meta: {layout: "login"},
          component: Login
      },
  ]
})
