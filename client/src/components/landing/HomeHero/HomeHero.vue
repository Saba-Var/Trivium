<script setup lang="ts">
import HeroTitle from '@/components/landing/HeroTitle/HeroTitle.vue'
import girlImage from '@/../public/images/girl-reading-book.png'
</script>

<template>
  <div class="lg:order-2 lg:w-[60%] lg:h-[85vh] lg:mt-10 3xl:mt-20">
    <HeroTitle class="hidden lg:block absolute left-12" />

    <div class="overflow-hidden lg:h-full relative">
      <div class="relative lg:h-full">
        <img
          class="mx-auto w-[90%] lg:absolute lg:w-[60%] lg:left-1/2 lg:-translate-x-1/2"
          alt="girl reading a book"
          :src="girlImage"
        />

        <div
          class="bg-black rounded-full w-[120%] lg:w-full -z-[2] aspect-square absolute left-1/2 -translate-x-1/2 -bottom-[90%] lg:bottom-[5%] translate-y-1/2"
        ></div>
      </div>
      <p
        class="text-white py-11 font-bold text-4xl px-[10%] sm:px-[20%] lg:absolute lg:bottom-5 lg:text-5xl lg:px-[10%] 2xl:text-6xl 2xl:bottom-14 3xl:text-7xl 3xl:px-[18%]"
      >
        Our mission is to educate & entertain.
      </p>
    </div>
  </div>
</template>
