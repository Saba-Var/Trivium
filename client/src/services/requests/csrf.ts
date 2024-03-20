import { axios } from '@/services/axios'

export const getCsrfToken = async () => {
  return axios.get('/sanctum/csrf-cookie')
}
