import InternalServerError from '@/views/InternalServerError.vue'
import { createRouter, createWebHistory } from 'vue-router'
import GeneralLayout from '@/layouts/GeneralLayout.vue'
import AuthLayout from '@/layouts/AuthLayout.vue'
import SignUpView from '@/views/SignUpView.vue'
import HomeView from '@/views/HomeView.vue'
import NotFound from '@/views/NotFound.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      component: GeneralLayout,
      children: [
        {
          path: '',
          name: 'Home',
          component: HomeView
        },
        {
          path: '/internal-server-error',
          name: 'InternalServerError',
          component: InternalServerError
        },
        { path: '/:pathMatch(.*)*', name: 'NotFound', component: NotFound }
      ]
    },
    {
      path: '/auth',
      component: AuthLayout,
      children: [
        {
          path: 'sign-up',
          name: 'SignUp',
          component: SignUpView
        }
      ]
    }
  ]
})

export default router
