import InternalServerError from '@/views/InternalServerError.vue'
import ForgotPasswordView from '@/views/ForgotPasswordView.vue'
import ResetPasswordView from '@/views/ResetPasswordView.vue'
import { createRouter, createWebHistory } from 'vue-router'
import GeneralLayout from '@/layouts/GeneralLayout.vue'
import AuthLayout from '@/layouts/AuthLayout.vue'
import LogInView from '@/views/LogInView.vue'
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
        },
        {
          path: 'log-in',
          name: 'LogIn',
          component: LogInView
        },
        {
          path: 'forgot-password',
          name: 'ForgotPassword',
          component: ForgotPasswordView
        },
        {
          path: 'reset-password',
          name: 'ResetPassword',
          component: ResetPasswordView
        }
      ]
    }
  ]
})

export default router
