import { getAllQuizzes } from '@/services/requests/quizzes'
import { QUIZZES_QUERY_KEY } from '@/config/queryKeys'
import type { QuizzesRequestParams } from './types'
import { useQuery } from '@tanstack/vue-query'

export const useQuizzes = (data: QuizzesRequestParams = {}) => {
  const response = useQuery({
    queryKey: [QUIZZES_QUERY_KEY, data.filters, data.sortOptions, data.pageSize],
    queryFn: getAllQuizzes
  })

  return response
}
