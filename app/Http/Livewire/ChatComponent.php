<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\chatBotMessages;

use Illuminate\Support\Facades\Auth;

class ChatComponent extends Component
{
    public $output;
    public $prompt;
    public $messages = []; 
    public $myMessages = [];
    public $temp = false;
    public $txtTempPrompt = '';

    public function render()
    {
        return view('livewire.chat-component');
    }

    public function openChat()
    {
        // Add your logic here to open the chat with OpenAI API
        // You can use JavaScript to open a modal or perform any other UI action
    }
    public function tempPrompt($input)
    {
        $this->txtTempPrompt = $input;
    }

    public function getGPT()
    {
        $this->temp = true;
        //dd(Auth::user()->id);
        $prompt = $this->prompt;
        $this->tempPrompt($prompt);
        $model = 'Mini Orca (Small)';
        //dd($prompt, $model);
        //$response = Http::get('http://localhost:4891/v1/models');
        
        $response = Http::post('http://localhost:4891/v1/completions', [
            "prompt" => $prompt,
            "max_tokens" => 200,
            "temperature" => 0.7,
            "top_p" => 1,
            "n" => 1,
            "echo" => true,
            "stream" => false,
            "model" => $model
        ]);
        //$teste = 'teste';
        if ($response->successful()) {
            //dd($response->json());
            $this->output = $response->json();
            $id_user = Auth::user()->id;
            $out = $this->output['choices'][0]['text'];
            $lines = explode("\n", $out);
            if (count($lines) > 1) {
                array_shift($lines); // Remove the first line
            }
            $out = implode("\n", $lines);
            $data['user_id'] = $id_user;
            $data['response'] = $out;
            $data['prompt'] = $prompt;
            //
            $this->temp = false;
            $this->messages[] = $data;
            $this->myMessages[] = $prompt;
            //dd($data);
            chatBotMessages::create($data);
            $this->prompt = '';
            //dd($this->output);
            $this->txtTempPrompt = '';


        } else {
            // Handle the API request failure
            $this->output = [];
            
        }
        //dd($response);
        //dd($response['choices']);
    }

    public function mount()
    {
        $userID = Auth::user()->id;
        $this->messages = chatBotMessages::orderBy('created_at', 'asc')->where('user_id', $userID)->get()->toArray();
        //dd($this->messages);

    }

    public function init()
    {
        // Load previous messages from the database during initialization
        $this->getPreviousMessages();
    }
}
