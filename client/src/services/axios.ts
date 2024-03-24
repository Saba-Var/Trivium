import { axiosConfig } from '@/config/axiosConfig'
import router from '@/router'
import Axios from 'axios'

const axios = Axios.create(axiosConfig)

axios.interceptors.response.use(
  async (response) => {
    return response
  },

  async (error) => {
    if (error?.response?.status === 500) {
      router.push({ name: 'InternalServerError' })
    }

    return Promise.reject(error)
  }
)

export { axios }
