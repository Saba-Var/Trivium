import './index.css'

import { VueQueryPlugin } from '@tanstack/vue-query'
import { toastOptions } from '@/config/toastConfig'
import 'vue-toastification/dist/index.css'
import Toast from 'vue-toastification'
import { createApp } from 'vue'
import router from './router'
import App from './App.vue'

const app = createApp(App)

app.use(router)
app.use(VueQueryPlugin)
app.use(Toast, toastOptions)

app.mount('#app')
