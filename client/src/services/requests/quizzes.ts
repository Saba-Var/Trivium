import { axios } from '@/services/axios'

export const getAllQuizzes = () => {
  return axios.get('/api/quizzes')
}
