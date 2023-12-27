// Composables
import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    component: () => import('@/layouts/default/Default.vue'),
    children: [
      {
        path: '',
        name: 'Login',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () => import(/* webpackChunkName: "home" */ '@/views/Login.vue'),
      },
    ],
  },

  {
    path: '/NavBar',
    name: 'NavBar',
    component: () => import('@/components/NavBar.vue')
  },

  {
    path: '/InputFile',
    name: 'InputFile',
    component: () => import('@/views/InputFile.vue')
  },

  {
    path: '/sample',
    name: 'sample',
    component: () => import('@/views/sample.vue')
  },

  {
    path: '/PrintLayout',
    name: 'PrintLayout',
    component: () => import('@/views/PrintLayout.vue')
  },
  

  {
    path: '/QrCodeReader',
    name: 'QrCodeReader',
    component: () => import('@/views/QrCodeReader.vue')
  },

  {
    path: '/PersonnelDetails',
    name: 'PersonnelDetails',
    component: () => import('@/views/PersonnelDetails.vue')
  },



  {
    path: '/ListItem',
    name: 'ListItem',
    component: () => import('@/views/ListItem.vue')
  },


]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
})

export default router
