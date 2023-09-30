<footer class="px-20 bg-purple-300 py-12 dark:bg-footerDark-0 dark:text-white">
  <div class="grid lg:grid-cols-3 md:grid-cols-1 gap-12">
    <a href="{{ URL::asset('/') }}">
        <img class="w-4/5" src="{{URL::asset('/icone.svg')}}" alt="">
    </a>
      <div>
          <ul class="h-full w-full items-center flex flex-col gap-6">
              <li class="text-xl">Acesse</li>
              <li class="text-xl">
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-nav-link>
              </li>
              <li class="text-xl">
                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    {{ __('Login') }}
                </x-nav-link>
              </li>
              <li class=  "text-xl">
                <x-nav-link :href="route('sobreNos')" :active="request()->routeIs('sobreNos')">
                    {{ __('Sobre nós') }}
                </x-nav-link>
              </li>
          </ul>
      </div>
      <div class="items-center flex flex-col gap-6">
          <h2 class="text-xl">Contate-nos</h2>
          <p class="align-middle"><span class="align-middle material-symbols-outlined">
              mail
              </span>
              email@email.com
          </p>
      </div>

  </div>
  
  <div class="my-8 w-full bg-black h-px dark:bg-white">
    </div>
  <div class="w-full flex justify-end">
      <p> Copyright © 2023 • MedLife Inc.</p>
  </div>
</footer>