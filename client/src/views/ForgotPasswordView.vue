<script setup lang="ts">
import AuthSubmitButton from '@/components/shared/AuthSubmitButton.vue'
import { forgotPasswordSchema } from '@/schemas/forgotPasswordSchema'
import TextInputField from '@/components/shared/TextInputField.vue'
import { forgotPasswordRequest } from '@/services/requests/auth'
import type { ForgotPasswordRequestData } from '@/types/auth'
import { useMutation } from '@tanstack/vue-query'
import { useToast } from 'vue-toastification'
import { useForm } from 'vee-validate'

const toast = useToast()

const { handleSubmit, setErrors, resetForm } = useForm<ForgotPasswordRequestData>({
  validationSchema: forgotPasswordSchema
})

const { mutate: forgotPasswordMutation, isPending } = useMutation({
  mutationFn: forgotPasswordRequest
})

const onSubmit = handleSubmit((values) => {
  forgotPasswordMutation(values, {
    onSuccess: () => {
      toast.success('Password reset link has been sent to your email!', { timeout: 6000 })
      resetForm()
    },
    onError: (error: any) => {
      setErrors(error?.response?.data?.errors)
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

    <AuthSubmitButton :disabled="isPending" text="Send" />
  </form>
</template>
