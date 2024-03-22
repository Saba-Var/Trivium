import { getAllCategories } from '@/services/requests/categories'
import { CATEGORIES_QUERY_KEY } from '@/config/queryKeys'
import { useQuery } from '@tanstack/vue-query'

export const useCategories = () => {
  const response = useQuery({
    queryKey: [CATEGORIES_QUERY_KEY],
    queryFn: getAllCategories
  })

  return response
}
