<script setup>
import TextInputField from '@/components/shared/TextInputField.vue'
import { signUpSchema } from '@/schemas/signUpSchema'
import { useForm } from 'vee-validate'

const { handleSubmit } = useForm({
  validationSchema: signUpSchema
})

const onSubmit = handleSubmit((values) => {
  console.log(values)
})
</script>

<template>
  <h1 class="mb-6 lg:mb-10 text-2xl lg:text-3xl font-extrabold text-black">Create account</h1>

  <form class="flex flex-col gap-8" @submit="onSubmit">
    <TextInputField placeholder="Your username" name="username" label="Username" />
    <TextInputField placeholder="Example@gmail.com" name="email" label="Email" />
    <TextInputField
      placeholder="must be 8 characters"
      label="Create a password"
      type="password"
      name="password"
    />
    <TextInputField
      placeholder="must be 8 characters"
      name="password_confirmation"
      label="Confirm password"
      type="password"
    />

    <div class="text-mid-black text-sm">I accept the terms and privacy policy</div>

    <button class="p-4 bg-black rounded-[10px] font-semibold text-white text-base mt-3">
      Sign up
    </button>
  </form>

  <div class="flex items-center gap-1 mt-6 lg:mt-9 text-sm">
    <p class="text-mid-black">Already have an account?</p>
    <RouterLink to="/login" class="text-blue-500 font-bold">Log in</RouterLink>
  </div>
</template>
