import type { difficulties } from '@/config/difficulties'
import type { PaginationMeta } from './backend'
import type { AxiosResponse } from 'axios'

export type PaginatedResult<T> = {
  data: T[]
  meta: PaginationMeta
}

export type Difficulty = (typeof difficulties)[number]

export type AxiosPromiseResult<T = {}> = Promise<AxiosResponse<T>>

export type OrderBy = 'asc' | 'desc'
