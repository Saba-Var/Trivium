export type LogInRequestData = {
  email: string
  password: string
}

export type SignUpRequestData = {
  username: string
  password_confirmation: string
} & LogInRequestData
