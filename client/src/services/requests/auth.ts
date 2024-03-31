import type { AxiosPromiseResult } from '@/types/global'
import { axios } from '@/services/axios'
import type {
  ForgotPasswordRequestData,
  SignUpRequestData,
  LogInRequestData,
  Passwords
} from '@/types/auth'

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

export const resetPasswordRequest = (data: Passwords): AxiosPromiseResult => {
  return axios.post('/api/auth/reset-password', data)
}
