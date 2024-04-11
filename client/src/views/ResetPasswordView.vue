<script setup lang="ts">
import AuthSubmitButton from '@/components/shared/AuthSubmitButton.vue'
import { resetPasswordSchema } from '@/schemas/resetPasswordSchema'
import TextInputField from '@/components/shared/TextInputField.vue'
import { resetPasswordRequest } from '@/services/requests/auth'
import type { ResetPasswordRequestData } from '@/types/auth'
import { useMutation } from '@tanstack/vue-query'
import { useToast } from 'vue-toastification'
import { useForm } from 'vee-validate'
import { onMounted } from 'vue'
import router from '@/router'

const queryParam = router.currentRoute.value.query
const token = queryParam.token as string
const email = queryParam.email as string

const isLinkValid = !!token && !!email

const toast = useToast()

const { handleSubmit } = useForm<ResetPasswordRequestData>({
  validationSchema: resetPasswordSchema
})

const { mutate: resetPasswordMutation, isPending } = useMutation({
  mutationFn: (values: ResetPasswordRequestData) =>
    resetPasswordRequest({ ...values, token, email })
})

const onSubmit = handleSubmit((values) => {
  resetPasswordMutation(values, {
    onSuccess: () => {
      toast.success('Password reset successfully! Please login.')
      router.push({ name: 'Login' })
    },
    onError: () => {
      toast.error('Failed to reset password. Please try again.')
    }
  })
})

onMounted(() => {
  if (!token || !email) {
    toast.error('Invalid reset password link')
  }
})
</script>

<template>
  <h1 class="text-2xl mb-1 lg:mb-3 lg:text-3xl font-extrabold text-black gap-2 items-center">
    Reset password
  </h1>

  <p class="mb-6 text-dark-blue text-sm flex lg:mb-10">Please type something you’ll remember</p>

  <form class="flex flex-col gap-8" @submit="onSubmit">
    <TextInputField
      placeholder="must be at least 4 characters"
      label="New password"
      type="password"
      name="password"
    />
    <TextInputField
      placeholder="repeat password"
      name="password_confirmation"
      label="Confirm password"
      type="password"
    />

    <AuthSubmitButton :disabled="isPending || !isLinkValid" text="Reset password" />
  </form>

  <div class="flex items-center gap-1 mt-6 lg:mt-9 text-sm">
    <p class="text-mid-black">Already have an account?</p>
    <RouterLink to="/auth/log-in" class="text-blue-500 font-bold">Log in</RouterLink>
  </div>
</template>
