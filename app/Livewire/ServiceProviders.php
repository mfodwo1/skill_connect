<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ServiceProviders extends Component
{
    public $serviceId;
    public $providers;

    public function mount($serviceId)
    {
        $this->serviceId = $serviceId;
        $this->providers = Service::find($serviceId)->provider()->get();
    }

    public function render()
    {
        return view('livewire.service-providers');
    }
}
