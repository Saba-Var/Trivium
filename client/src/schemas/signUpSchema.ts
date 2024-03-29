import * as yup from 'yup'

export const signUpSchema = yup.object({
  email: yup.string().email().required('Email is required'),
  username: yup.string().trim().required('Username is required').min(3).max(20),
  password: yup.string().required('Password is required').min(4).max(20),
  password_confirmation: yup
    .string()
    .required('Password confirmation is required')
    .oneOf([yup.ref('password'), null!], 'Passwords must match')
})
