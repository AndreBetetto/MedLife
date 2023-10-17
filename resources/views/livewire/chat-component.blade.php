<div>
    {{-- 
    <div class="  w-2/3 px-5 justify-between">
        <div class="flex flex-col mt-5">
          <div class="flex justify-end mb-4">
            <div
              class="mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white"
            >
              <span>Welcome to group everyone !</span>
            </div>
            
          </div>
          <div class="flex justify-start mb-4">
            <div
              class="ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white"
            >
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat
              at praesentium, aut ullam delectus odio error sit rem. Architecto
              nulla doloribus laborum illo rem enim dolor odio saepe,
              consequatur quas?</p>
            </div>
          </div>
          <div class="flex justify-end mb-4">
            <div>
              <div
                class="mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white"
              >
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Magnam, repudiandae.</p>
              </div>
    
              <div
                class="mt-4 mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white"
              >
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Debitis, reiciendis!</p>
              </div>
            </div>
            
          </div>
          <div class="flex justify-start mb-4">
            
            <div
              class="ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white"
            >
              <p>happy holiday guys!</p>
            </div>
          </div>
        </div>
        <div class="py-5">
          <input
            class="w-full bg-gray-300 py-5 px-3 rounded-xl"
            type="text"
            placeholder="type your message here..."
          />
        </div>
      </div>--}}
      
      <div>
        <div class="text-red-600 font-semibold mb-4">
          <span>Aviso de Segurança:</span>
        </div>
        <p class=" text-center text-gray-700 mb-4">Este chat é exclusivamente destinado a responder perguntas e fornecer informações relacionadas ao funcionamento deste aplicativo na área de medicina. O robô responsável por este chat está programado para fornecer apenas respostas sobre o aplicativo e suas funcionalidades. Não forneça informações pessoais sensíveis, médicas ou confidenciais neste chat.
        Lembre-se de que, em nenhum momento, o robô solicitará informações como dados de saúde, números de identificação pessoal ou detalhes médicos específicos. Caso receba alguma solicitação suspeita, por favor, encerre imediatamente a interação.</p>

        <p class=" text-center text-gray-700 mb-4">A sua privacidade e segurança são prioridades. Em caso de dúvidas ou preocupações sobre o uso deste chat, entre em contato com o suporte técnico do aplicativo.</p>

        <p class=" text-center text-gray-700 mb-4">Obrigado pela compreensão e confiança.</p>
      </div>
      <hr class=" mt-3 mb-2">

    <div class=" p-3">
        @if($messages)
            <div class=" overflow-y-auto max-h-96 ">
                @foreach($messages as $message)
                    {{-- Prompt do usuario --}}
                    <div>
                        <div class="flex justify-end mb-4">
                            <div class="mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white ml-36">
                                <p>
                                    {{ $message['prompt'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                    {{-- Response da Maquina --}}
                    
                    <div class="flex justify-start mb-4">
                        <div class="ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white mr-36">
                            <div class=" object-right w-full origin-right right-2/3">
                                <p class=" ">
                                    {{ $message['response'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <div wire:loading='getGPT'>
          <span>Processing prompt...</span>
        </div>
    </div>
    <hr class="mt-3 mb-5">
    <div class="ml-8 ">
        <div class="flex">
            <div class="w-19/20">
                <input wire:model="prompt" 
                    type="text" 
                    id="prompt" 
                    placeholder="Faça sua pergunta"
                    class="w-19/20 mr-8  border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10"/>
            </div>
            <div class=" w-1/20 mr-20 ">
                <button wire:click="getGPT" 
                    data-toggle="modal" 
                    data-target="#chatModal"
                    class="flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white px-4 py-2 flex-shrink-0">
                    Enviar
                    <span class="ml-2">
                        <svg
                          class="w-4 h-4 transform rotate-45 -mt-px"
                          fill="none"
                          stroke="currentColor"
                          viewBox="0 0 24 24"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
                          ></path>
                        </svg>
                      </span>
                </button>
            </div>
        </div>
    </div>

    {{-- --

        <div class=" flex flex-row">
            <div class="border basis-1/3 border-spacing-1 border-cyan-50">
                <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-6 py-5">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-10 w-10 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900">Leslie Alexander</p>
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">leslie.alexander@example.com</p>
                            </div>
                        </div>
                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="container w-3/6 px-4">-}}
                {{-- Response --}}
                {{-- 
                <div class="mr-3 p-2 shadow-md rounded-md max-w-2">
                    <p class="break-words text-justify">RESPONSERESPONSERESPONSERESPONSERESPONSERESPONSERESPONSERESPONSERESPONSERESPONSE</p>
                </div>--}}
                {{-- Prompt --}}
                {{-- 
                <div class="ml-3 p-2 shadow-md rounded-md">
                    <p class="break-words text-justify">PROMPTPROMPTPROMPTPROMPTPROMPTPROMPTPROMPTPROMPTPROMPTPROMPTPROMPTPROMPTPROMPTPROMPT</p>
                </div>
            </div>
        </div>--}}
 


    {{-- 
    <button id="myBtn">Open Modal</button>
    <!-- The Modal -->
    <div id="myModal" class="modal">

    
    <h2>Bottom Modal</h2>

    <!-- Trigger/Open The Modal -->
    <button id="myBtn">Open Modal</button>

    <!-- The Modal -->
    <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
        <span class="close">&times;</span>
        <h2>Modal Header</h2>
        </div>
        <div class="modal-body">
        <p>Some text in the Modal Body</p>
        <p>Some other text...</p>
        </div>
        <div class="modal-footer">
        <h3>Modal Footer</h3>
        </div>
    </div>

    </div>

    <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
    </script>

    <!-- Modal -->
    <div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="chatModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="chatModalLabel">Chat Messages</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Trigger/Open The Modal -->
    

    </div>
    --}}
</div>
