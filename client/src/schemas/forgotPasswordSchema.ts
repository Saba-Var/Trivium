import * as yup from 'yup'

export const forgotPasswordSchema = yup.object({
  email: yup.string().email('Enter valid email address').required('Email is required')
})
