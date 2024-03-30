<script setup lang="ts">
import AuthSubmitButton from '@/components/shared/AuthSubmitButton.vue'
import TextInputField from '@/components/shared/TextInputField.vue'
import CheckboxField from '@/components/shared/CheckboxField.vue'
import HandWaveIcon from '@/components/icons/HandWaveIcon.vue'
import { signUpRequest } from '@/services/requests/auth'
import type { LogInRequestData } from '@/types/auth'
import { logInSchema } from '@/schemas/logInSchema'
import { useMutation } from '@tanstack/vue-query'
import { useForm } from 'vee-validate'

const { handleSubmit, setErrors } = useForm<LogInRequestData>({
  validationSchema: logInSchema
})

const { mutate: logInMutation, isPending } = useMutation({
  mutationFn: signUpRequest
})

const onSubmit = handleSubmit((values) => {
  logInMutation(values, {
    onSuccess: () => {
      // TODO: implement log in logic
    },
    onError: (error: any) => {
      setErrors(error?.response?.data?.errors)
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
