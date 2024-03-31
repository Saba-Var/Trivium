import type { LogInRequestData, SignUpRequestData, ForgotPasswordRequestData } from '@/types/auth'
import type { AxiosPromiseResult } from '@/types/global'
import { axios } from '@/services/axios'

export const signUpRequest = (data: SignUpRequestData): AxiosPromiseResult => {
  return axios.post('/api/auth/sign-up', data)
}

export const logInRequest = (data: LogInRequestData): AxiosPromiseResult => {
  return axios.post('/api/auth/log-in', data)
}

export const verifyEmailRequest = (verificationUrl: string): AxiosPromiseResult => {
  return axios.get(`/api/auth/email/verify${verificationUrl}`)
}

export const forgotPasswordRequest = (data: ForgotPasswordRequestData): AxiosPromiseResult => {
  return axios.post('/api/auth/forgot-password', data)
}
