<script setup lang="ts">
import girlImage from '@/../public/images/girl-reading-book.png'
</script>

<template>
  <h1 class="text-black text-center text-5xl font-bold mb-5 mt-8">Trivium</h1>
  <p class="text-dark-grey font-semibold text-lg text-center mb-5">Play with us, Explore with us</p>

  <div class="overflow-hidden">
    <div class="relative">
      <img :src="girlImage" alt="girl reading a book" class="mx-auto w-[90%]" />
      <div
        class="bg-black rounded-full w-[120%] -z-10 aspect-square absolute left-1/2 -translate-x-1/2 -bottom-[90%] translate-y-1/2"
      ></div>
    </div>
    <p class="text-white py-11 font-bold text-4xl px-[10%] sm:px-[20%]">
      Our mission is to educate & entertain.
    </p>
  </div>
</template>
