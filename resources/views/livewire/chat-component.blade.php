<div>
    Hello!

    <div>
        <label for="prompt">Enter your message:</label>
        <input wire:model="prompt" type="text" id="prompt" /><br>
        <button wire:click="getGPT">Send</button>
    </div>
    @if($output)
        <div>
            <p>{{ $output['choices'][0]['text'] }}</p>
        </div>
    @endif
</div>
