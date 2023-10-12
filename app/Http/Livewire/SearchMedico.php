<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Medico;
use App\Models\User;
use Illuminate\Support\Facades\Http;


class SearchMedico extends Component
{
    public $specializations = [];
    public $search = '';
    public $idUserSearch = '';
    public $results = [];

    public function render()
    {
        $users = $this->getUsers();
        $this->getSpecializationsProperty();
        $medicos = Medico::whereRaw("LOWER(nome) LIKE ?", ['%' . strtolower($this->search) . '%'])->get();
        return view('livewire.search-medico', compact("medicos", "users"));
    }

    private function getUsers()
    {
        return User::where('name', 'like', '%' . $this->idUserSearch . '%')
                   ->get();
    }

    public function updatedSelectedUserId()
    {
        // Validate that a user has been selected
        $this->validate(['selectedUserId' => 'required']);
    }

    public function getSpecializationsProperty()
    {
        $this->specializations = [
            ["ID" => 1, "Name" => "Cardiology"],
            ["ID" => 4, "Name" => "Acupuncture"],
            ["ID" => 5, "Name" => "Allergology"],
            ["ID" => 6, "Name" => "Anesthesia"],
            ["ID" => 7, "Name" => "Angiology"],
            ["ID" => 8, "Name" => "Anthroposophical medicine"],
            ["ID" => 9, "Name" => "Child psychiatry"],
            ["ID" => 10, "Name" => "Plastic surgery"],
            ["ID" => 11, "Name" => "Dermatology"],
            ["ID" => 12, "Name" => "Endocrinology"],
            ["ID" => 13, "Name" => "Forensic medicine"],
            ["ID" => 14, "Name" => "Gastroenterology"],
            ["ID" => 15, "Name" => "General practice"],
            ["ID" => 17, "Name" => "Geriatric medicine"],
            ["ID" => 18, "Name" => "Gynecology"],
            ["ID" => 19, "Name" => "Internal medicine"],
            ["ID" => 20, "Name" => "Hand surgery"],
            ["ID" => 21, "Name" => "Hematology"],
            ["ID" => 22, "Name" => "Homeopathy"],
            ["ID" => 23, "Name" => "Infectiology"],
            ["ID" => 24, "Name" => "Manual medicine"],
            ["ID" => 25, "Name" => "Maxillo Surgery"],
            ["ID" => 26, "Name" => "Nephrology"],
            ["ID" => 27, "Name" => "Neurology"],
            ["ID" => 28, "Name" => "Occupational medicine"],
            ["ID" => 29, "Name" => "Oncology"],
            ["ID" => 30, "Name" => "Ophthalmology"],
            ["ID" => 31, "Name" => "Orthopedics"],
            ["ID" => 32, "Name" => "Otolaryngology"],
            ["ID" => 33, "Name" => "Pathology"],
            ["ID" => 34, "Name" => "Pediatrics"],
            ["ID" => 35, "Name" => "Pulmonology"],
            ["ID" => 36, "Name" => "Psychiatry"],
            ["ID" => 37, "Name" => "Tropical medicine"],
            ["ID" => 38, "Name" => "Sports medicine"],
            ["ID" => 39, "Name" => "Surgery"],
            ["ID" => 40, "Name" => "Radiology"],
            ["ID" => 41, "Name" => "Rheumatology"],
            ["ID" => 42, "Name" => "Urology"],
            ["ID" => 43, "Name" => "Dentistry"],
            ["ID" => 44, "Name" => "Orthodontics"],
            ["ID" => 45, "Name" => "Oral surgery"],
            ["ID" => 46, "Name" => "Periodontology"],
            ["ID" => 47, "Name" => "Reconstructive dentistry"],
        ];
    }
}
