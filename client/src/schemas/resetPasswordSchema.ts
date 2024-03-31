import * as yup from 'yup'

export const resetPasswordSchema = yup.object({
  password: yup.string().required('Password is required').min(4).max(20),
  password_confirmation: yup
    .string()
    .required('Password confirmation is required')
    .oneOf([yup.ref('password'), null!], 'Passwords must match')
})
