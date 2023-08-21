<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BuscaNomeRemedio extends Component
{
    public function render()
    {
        $remedios = $this->search;
        return view('livewire.busca-nome-remedio', compact('remedios'));
    }

    public $query = '';
    public $retorno;
    public $bulaPDF;
    public $teste = '';
    public $search;
    protected $queryString = ['search'];

    public function search()
    {
        $inputRemedio = $this->query;
        //
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://bula.vercel.app/pesquisar?nome=".$inputRemedio."&pagina=1",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        
        ));

        $link = "https://bula.vercel.app/pesquisar?nome=".$inputRemedio."&pagina=1";

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $saida = "cURL Error #:" . $err;
        } else {
            $saida =  $response;
            
        }
        
        $retorno = $saida;
        $nomeProduto = [];
        
        $this->retorno = $retorno;
        //
        //
        //
        
    }
}
