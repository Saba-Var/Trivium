import type { AxiosPromiseResult } from '@/types/global'
import type { Category } from '@/types/backend'
import { axios } from '@/services/axios'

export const getAllCategories = (): AxiosPromiseResult<Category[]> => {
  return axios.get('/api/categories')
}
