<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\ChatMessage;
use App\Http\Requests\chatSave;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\chatSave as RequestsChatSave;
use GuzzleHttp\Psr7\Request;

class ChatComponent extends Component
{
    public $output;
    public $prompt;
    public function render()
    {
        return view('livewire.chat-component');
    }

    public function openChat()
    {
        // Add your logic here to open the chat with OpenAI API
        // You can use JavaScript to open a modal or perform any other UI action
    }

    public function getGPT(RequestsChatSave $request )
    {
        //dd(Auth::user()->id);
        $prompt = $this->prompt;
        $model = 'Mini Orca (Small)';
        //dd($prompt, $model);
        //$response = Http::get('http://localhost:4891/v1/models');
        
        $response = Http::post('http://localhost:4891/v1/completions', [
            "prompt" => $prompt,
            "max_tokens" => 10,
            "temperature" => 0.7,
            "top_p" => 1,
            "n" => 1,
            "echo" => true,
            "stream" => false,
            "model" => $model
        ]);
        //$teste = 'teste';
        if ($response->successful()) {
            $this->output = $response->json();
            $id_user = Auth::user()->id;
            $out = $this->output['choices'][0]['text'];
            //dd($out);
            //dd($this->output);
            $chat = new ChatMessage();
            $chat->prompt = $prompt;
            $chat->response = $out;
            $chat->user_id = $id_user;
            $chat->save();
            //dd($chat);

        } else {
            // Handle the API request failure
            $this->output = [];
            
            // You can log an error message or set a default value for $this->symptoms
        }
        //dd($response);
        //dd($response['choices']);
    }
}
