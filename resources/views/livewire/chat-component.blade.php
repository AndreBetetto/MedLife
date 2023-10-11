
<div>
    <div class="modal-body">
        sim, eu vou diminuir a imagem, calma la
        @if($messages)
            <div style="max-height: 500px; overflow-y: auto; width:800px">
                @foreach($messages as $message)
                    {{-- Prompt do usuario --}}
                    <div class=" ">
                        <p style="background-color: #e6f7ff; padding: 8px; margin-bottom: 5px; border-radius: 5px;">
                            {{ $message['prompt'] }}
                        </p>
                    </div>
                    {{-- Response da Maquina --}}
                    <div>
                        <p style="background-color: #e6f7ff; padding: 8px; margin-bottom: 5px; border-radius: 5px; min-height:14px;">
                            <img src="{{asset('icons/machine/orca_mini.svg')}}" height="16px"> {{ $message['response'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <div>
        <label for="prompt">Enter your message:</label>
        <input wire:model="prompt" type="text" id="prompt" />
        <button wire:click="getGPT" data-toggle="modal" data-target="#chatModal">Send</button>
    </div>
    
    
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