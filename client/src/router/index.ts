import { createRouter, createWebHistory } from 'vue-router'
import GeneralLayout from '@/layouts/GeneralLayout.vue'
import HomeView from '@/views/HomeView.vue'

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
        }
      ]
    }
  ]
})

export default router
