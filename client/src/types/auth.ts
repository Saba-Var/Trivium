export type LogInRequestData = {
  email: string
  password: string
  remember?: boolean
}

export type SignUpRequestData = {
  username: string
  password_confirmation: string
} & Omit<LogInRequestData, 'remember'>
