import type { Difficulty } from '@/types/global'

export type TimeStamps = {
  created_at: string
  updated_at: string
}

export type PaginationMeta = {
  current_page: number
  from: number
  last_page: number
  links: {
    first: string
    last: string
    next: string
    prev: string | null
  }[]
  path: string
  per_page: number
  to: number
  total: number
}

export interface Category extends TimeStamps {
  id: number
  title: string
}

export interface Quiz extends TimeStamps {
  difficulty: Difficulty
  categories: Category[]
  description: string
  title: string
  time: number
  id: number
  users_count: number
  user_result?: UserResult | null
  image: string
}

export interface UserResult extends TimeStamps {
  id: number
  quiz_id: number
  user_id: number
  correct_answers: number
  mistakes: number
  total_points: number
  time: number
  created_at: string
  updated_at: string
}
