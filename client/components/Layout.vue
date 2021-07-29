<template>
  <div class="flex">
    <div class="w-3/12 min-h-screen bg-gray-100">
      <nav class="mt-10 border-r-2 text-center">
        <div class="mb-4 hover:bg-gray-200 transition delay-100">
          <NuxtLink to="/"><div class="w-full p-2">Recipes</div></NuxtLink>
          </div>
        <ul class="space-y-4">
          <li class="hover:bg-gray-200 transition delay-100">
            <NuxtLink to="/categories"><div class="w-full p-2">Categories</div></NuxtLink>
          </li>
          <li class="hover:bg-gray-200 transition delay-100">
            <NuxtLink to="/profile"><div class="w-full p-2">Profile</div></NuxtLink>
          </li>
          <li class="hover:bg-gray-200 transition delay-100">
            <NuxtLink to="/settings"><div class="w-full p-2">Settings</div></NuxtLink>
          </li>
        </ul>
      </nav>
    </div>
    <div class="w-9/12">
      <header class="h-16 bg-green-400 p-4">
        <div>
          <span>Zoek icoon</span>
          <input type="search"/>
        </div>
      </header>
      <div class="p-4"><slot></slot></div>
    </div>
  </div>
</template>