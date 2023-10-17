<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Medico;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use App\View\Components;
use Livewire\WithPagination;


class SearchMedico extends Component
{
    public $specializations = [];
    public $search = '';
    public $idUserSearch = '';
    public $results = [];
    public $searchId = '';

    use WithPagination;

    public function render()
    {
        $users = $this->getUsers();
        $this->getSpecializationsProperty();
        $medicos = Medico::whereRaw("LOWER(nome) LIKE ?", ['%' . strtolower($this->search) . '%'])->paginate(20);
        $userList = User::whereRaw("LOWER(name) LIKE ?", ['%' . strtolower($this->searchId) . '%'])->get();
        return view('livewire.search-medico', compact("medicos", "users", "userList"));
    }

    private function getUsers()
    {
        return User::where('name', 'like', '%' . $this->idUserSearch . '%')->paginate(20);
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
            ["ID" => 8, "Name" => "Anthroposophical_medicine"],
            ["ID" => 9, "Name" => "Child_psychiatry"],
            ["ID" => 10, "Name" => "Plastic_surgery"],
            ["ID" => 11, "Name" => "Dermatology"],
            ["ID" => 12, "Name" => "Endocrinology"],
            ["ID" => 13, "Name" => "Forensic_medicine"],
            ["ID" => 14, "Name" => "Gastroenterology"],
            ["ID" => 15, "Name" => "General_practice"],
            ["ID" => 17, "Name" => "Geriatric_medicine"],
            ["ID" => 18, "Name" => "Gynecology"],
            ["ID" => 19, "Name" => "Internal_medicine"],
            ["ID" => 20, "Name" => "Hand_surgery"],
            ["ID" => 21, "Name" => "Hematology"],
            ["ID" => 22, "Name" => "Homeopathy"],
            ["ID" => 23, "Name" => "Infectiology"],
            ["ID" => 24, "Name" => "Manual_medicine"],
            ["ID" => 25, "Name" => "Maxillo_Surgery"],
            ["ID" => 26, "Name" => "Nephrology"],
            ["ID" => 27, "Name" => "Neurology"],
            ["ID" => 28, "Name" => "Occupational_medicine"],
            ["ID" => 29, "Name" => "Oncology"],
            ["ID" => 30, "Name" => "Ophthalmology"],
            ["ID" => 31, "Name" => "Orthopedics"],
            ["ID" => 32, "Name" => "Otolaryngology"],
            ["ID" => 33, "Name" => "Pathology"],
            ["ID" => 34, "Name" => "Pediatrics"],
            ["ID" => 35, "Name" => "Pulmonology"],
            ["ID" => 36, "Name" => "Psychiatry"],
            ["ID" => 37, "Name" => "Tropical_medicine"],
            ["ID" => 38, "Name" => "Sports_medicine"],
            ["ID" => 39, "Name" => "Surgery"],
            ["ID" => 40, "Name" => "Radiology"],
            ["ID" => 41, "Name" => "Rheumatology"],
            ["ID" => 42, "Name" => "Urology"],
            ["ID" => 43, "Name" => "Dentistry"],
            ["ID" => 44, "Name" => "Orthodontics"],
            ["ID" => 45, "Name" => "Oral_surgery"],
            ["ID" => 46, "Name" => "Periodontology"],
            ["ID" => 47, "Name" => "Reconstructive_dentistry"],
        ];
    }
}
