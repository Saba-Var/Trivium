<script setup lang="ts">
import { logInRequest, verifyEmailRequest } from '@/services/requests/auth'
import AuthSubmitButton from '@/components/shared/AuthSubmitButton.vue'
import TextInputField from '@/components/shared/TextInputField.vue'
import type { LogInRequestData } from '@/types/auth'
import { logInSchema } from '@/schemas/logInSchema'
import { useMutation } from '@tanstack/vue-query'
import { useToast } from 'vue-toastification'
import { useForm } from 'vee-validate'
import { onMounted } from 'vue'
import router from '@/router'

const toast = useToast()

const { handleSubmit, setErrors } = useForm<LogInRequestData>({
  validationSchema: logInSchema
})

const { mutate: logInMutation, isPending } = useMutation({
  mutationFn: logInRequest
})

const queryParams = router.currentRoute.value.query
const signature = queryParams.signature
const emailVerificationUrl = queryParams.emailVerificationUrl as string

const { mutate: verifyEmailMutation } = useMutation({
  mutationFn: () => {
    const verifyRoute =
      (emailVerificationUrl || '')?.split('/verify')?.[1] + `&signature=${signature}`
    return verifyEmailRequest(verifyRoute)
  },
  onSuccess: () => {
    router.replace('/auth/log-in')
    toast.success('Email verified successfully! You can now log in.')
  },
  onError: () => {
    toast.error('Email verification failed!')
  }
})

onMounted(() => {
  if (emailVerificationUrl && signature) {
    verifyEmailMutation()
  }
})

const onSubmit = handleSubmit((values) => {
  logInMutation(values, {
    onSuccess: () => {
      router.push('/quizzes')
    },
    onError: (error: any) => {
      setErrors(error?.response?.data)
    }
  })
})
</script>

<template>
  <h1 class="text-2xl mb-1 lg:mb-3 lg:text-3xl font-extrabold text-black gap-2 items-center">
    Forgot password?
  </h1>

  <p class="mb-6 text-dark-blue text-sm flex lg:mb-10">
    Don’t worry! It happens. Please enter the email associated with your account.
  </p>

  <form class="flex flex-col gap-8" @submit="onSubmit">
    <TextInputField placeholder="enter your email address" name="email" label="Email address" />

    <AuthSubmitButton :disabled="isPending" text="Log in" />
  </form>
</template>
