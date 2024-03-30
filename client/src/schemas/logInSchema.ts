import * as yup from 'yup'

export const logInSchema = yup.object({
  email: yup.string().email('Enter valid email address').required('Email is required'),
  password: yup.string().required('Password is required').min(1)
})
