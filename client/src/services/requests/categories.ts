import { axios } from '@/services/axios'

export const getAllCategories = async () => {
  return axios.get('/api/categories')
}
