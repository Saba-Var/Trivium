import type { AxiosPromiseResult, PaginatedResult } from '@/types/global'
import type { Quiz } from '@/types/backend'
import { axios } from '@/services/axios'

export const getAllQuizzes = (): AxiosPromiseResult<PaginatedResult<Quiz>> => {
  return axios.get('/api/quizzes')
}
