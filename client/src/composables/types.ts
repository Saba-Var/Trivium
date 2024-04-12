import type { Difficulty, OrderBy } from '@/types/global'

export type QuizzesRequestParams = {
  pageSize?: number
  filters?: {
    difficulty?: Difficulty
    completed?: boolean
    categories?: (number | null)[]
  }
  sortOptions?: {
    created_at?: OrderBy
    title?: OrderBy
    most_popular?: boolean
  }
}
