<?php

namespace App\Livewire;
use App\Models\Company;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class AddCompany extends Component
{
    use WithFileUploads;

    public $name, $description, $address;

    #[Validate('image|max:2048')] // 2MB Max
    public $logo;
    
    public $successMessage = 'Company added successfully.';

    public function addCompany()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'logo' => 'required|image|max:2048',
            'address' => 'required',
        ]);

        Company::create([
            'name' => $this->name,
            'logo' => $this->logo->store('logos', 'public'),
            'description' => $this->description,
            'address' => $this->address,
        ]);

        session()->flash('message', $this->successMessage);
        $this->reset();

        $this->dispatch('companyAdded');
    }


    public function render()
    {
        return view('livewire.add-company');
    }
}
