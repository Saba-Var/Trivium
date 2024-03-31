export type Passwords = {
  password: string
  password_confirmation: string
}

export type LogInRequestData = {
  email: string
} & Passwords

export type SignUpRequestData = {
  username: string
} & Passwords &
  Omit<LogInRequestData, 'remember'>

export type ForgotPasswordRequestData = {
  email: string
}
