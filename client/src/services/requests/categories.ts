import { axios } from '@/services/axios'

export const getAllCategories = () => {
  return axios.get('/api/categories')
}
