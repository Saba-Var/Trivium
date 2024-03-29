import type { AxiosPromiseResult } from '@/types/global'
import type { SignUpRequestData } from '@/types/auth'
import { axios } from '@/services/axios'

export const signUpRequest = (data: SignUpRequestData): AxiosPromiseResult => {
  return axios.post('/api/auth/sign-up', data)
}
