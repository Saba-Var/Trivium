import type { LogInRequestData, SignUpRequestData } from '@/types/auth'
import type { AxiosPromiseResult } from '@/types/global'
import { axios } from '@/services/axios'

export const signUpRequest = (data: SignUpRequestData): AxiosPromiseResult => {
  return axios.post('/api/auth/sign-up', data)
}

export const logInRequest = (data: LogInRequestData): AxiosPromiseResult => {
  return axios.post('/api/auth/log-in', data)
}
