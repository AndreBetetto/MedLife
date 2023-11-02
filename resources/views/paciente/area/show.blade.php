<!-- <div>
    {{-- The whole world belongs to you. --}}
    Ver mẽdicos disponiveis: <a href="{{ route('areapaciente.buscar') }}">Clique aqui!</a> <br>
    Meus medicos: <a href="{{ route('areapaciente.meusMedicos') }}">Clique aqui!</a>
</div>
-->
<div class="border-solid border-2 px-32 py-16">
  <div class="grid grid-cols-2 gap-4 py-36">
    <img alt="equipe" class="w-full"  src="imagemacharr.png">
    <div class="flex flex-col justify-center">
      <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">Para um acesso mais rápido<br><span class="text-2xl">Veja os médicos</span></h2>
      <div class="my-5 flex items-center justify-center gap-x-6 lg:justify-start">
        <a href="{{ route('areapaciente.buscar') }}" class="rounded-md bg-purple-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-blue-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue">Ver médicos disponíveis</a>
        <a href="{{ route('areapaciente.meusMedicos') }}" class="rounded-md bg-purple-300 px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-blue-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue">Meus médicos</a>
      <!--  <a href="#" class="text-sm font-semibold leading-6 text-black">Learn more <span aria-hidden="true">→</span></a>-->
      </div>
    </div>
  </div>
</div>