<?php

namespace App\Http\Livewire;

use App\Models\Deparment;
use Livewire\Component;

class DepartmentForm extends Component
{
    public $name;
    public function mount($departmentId = null)
    {
        if ($departmentId) {
            $this->name = Deparment::findOrFail($departmentId)->name;
        }
    }
    public function render()
    {
        return view('livewire.department-form');
    }
}
