<?php

namespace App\Http\Livewire;

use App\Models\Department;
use Livewire\Component;

class DepartmentForm extends Component
{
    public $name = 'Accounting';
    public $success = false;
    public function submit()
    {
        $this->success = (boolean) Department::create(['name' => $this->name]);
    }
    public function mount($departmentId = null)
    {
        if ($departmentId) {
            $this->name = Department::findOrFail($departmentId)->name;
        }
    }
    public function render()
    {
        return view('livewire.department-form');
    }
}
