<script setup lang="ts">
import CloseIcon from '@/components/icons/CloseIcon.vue'
import type { Emits } from './types'

const emit = defineEmits<Emits>()
</script>

<template>
  <Teleport to="#app">
    <div>
      <div
        @click="emit('toggle')"
        class="bg-main-black fixed left-0 top-0 bg-opacity-30 backdrop-blur-sm w-full h-screen z-[999]"
      ></div>

      <div class="fixed left-0 top-0 bg-white w-[20.6rem] p-6 z-[1000] flex flex-col gap-5">
        <div class="flex justify-between items-center pb-5 border-b">
          <p class="text-black text-2xl font-black">Trivium</p>
          <CloseIcon @click="emit('toggle')" />
        </div>

        <RouterLink to="/quizzes" class="text-main-black text-lg font-semibold pb-5 border-b"
          >Quizzes</RouterLink
        >

        <div class="flex flex-col gap-5">
          <RouterLink to="/auth/sign-up">
            <button class="bg-black rounded w-full p-4 text-white text-sm font-bold">
              Sign up
            </button>
          </RouterLink>

          <RouterLink to="/auth/log-in">
            <button
              class="rounded w-full bg-dark-purple bg-opacity-10 p-4 text-dark-purple text-sm font-bold"
            >
              Log in
            </button>
          </RouterLink>
        </div>
      </div>
    </div>
  </Teleport>
</template>
