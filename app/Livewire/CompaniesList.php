<?php

namespace App\Livewire;
use App\Models\Company;

use Livewire\Component;
use Livewire\Attributes\On;

class CompaniesList extends Component
{
    public $companies;

    public function mount()
    {
        $this->companies = Company::all();
    }
    
    #[On('companyAdded')]
    public function companyAdded()
    {
        $this->mount();
    }

    public function render()
    {
        return view('livewire.companies-list');
    }
}
