<!-- <div>
    {{-- The whole world belongs to you. --}}
    Ver mẽdicos disponiveis: <a href="{{ route('areapaciente.buscar') }}">Clique aqui!</a> <br>
    Meus medicos: <a href="{{ route('areapaciente.meusMedicos') }}">Clique aqui!</a>
</div>
-->
    <div class="border-solid border-2 border-width: 2px;">
      <div class="mx-auto max-w-md text-center lg:mx-center lg:flex-auto lg:py-32 lg:text-left">
        <h2 class="text-3xl font-bold tracking-tight text-black sm:text-4xl">Para um acesso mais rápido<br>Veja os médicos</h2>
        <p class="mt-6 text-lg leading-8 text-black-300">Ac euismod vel sit maecenas id pellentesque eu sed consectetur. Malesuada adipiscing sagittis vel nulla.</p>
        <div class="mt-10 flex items-center justify-center gap-x-6 lg:justify-start">
          <a href="{{ route('areapaciente.buscar') }}" class="rounded-md bg-purple-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-blue-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue">Ver médicos disponiveis</a>
          <a href="{{ route('areapaciente.meusMedicos') }}" class="rounded-md bg-purple-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-blue-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue">Meus médicos</a>
        <!--  <a href="#" class="text-sm font-semibold leading-6 text-black">Learn more <span aria-hidden="true">→</span></a>-->
        </div>
      </div>
      
    </div>
 
