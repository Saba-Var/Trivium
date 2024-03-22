import { getAllQuizzes } from '@/services/requests/quizzes'
import { QUIZZES_QUERY_KEY } from '@/config/queryKeys'
import { useQuery } from '@tanstack/vue-query'

export const useQuizzes = () => {
  const response = useQuery({
    queryKey: [QUIZZES_QUERY_KEY],
    queryFn: getAllQuizzes
  })

  return response
}
