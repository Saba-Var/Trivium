<script setup lang="ts">
import { logInRequest, verifyEmailRequest } from '@/services/requests/auth'
import AuthSubmitButton from '@/components/shared/AuthSubmitButton.vue'
import TextInputField from '@/components/shared/TextInputField.vue'
import CheckboxField from '@/components/shared/CheckboxField.vue'
import HandWaveIcon from '@/components/icons/HandWaveIcon.vue'
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
  <h1 class="mb-6 flex lg:mb-10 text-2xl lg:text-3xl font-extrabold text-black gap-2 items-center">
    Hi, Welcome!
    <HandWaveIcon />
  </h1>

  <form class="flex flex-col gap-8" @submit="onSubmit">
    <TextInputField placeholder="Your email" name="email" label="Email address" />
    <TextInputField placeholder="Your password" label="Password" type="password" name="password" />

    <div class="flex justify-between items-center">
      <CheckboxField label="Remember for 30 days" name="agreement" />
      <RouterLink to="/auth/forgot-password" class="text-sm text-mid-black"
        >Forgot password?</RouterLink
      >
    </div>

    <AuthSubmitButton :disabled="isPending" text="Log in" />
  </form>

  <div class="flex items-center gap-1 mt-6 lg:mt-9 text-sm">
    <p class="text-mid-black">Don’t have an account?</p>
    <RouterLink to="/auth/sign-up" class="text-blue-500 font-bold">Sign up</RouterLink>
  </div>
</template>
