<?php
namespace App\Http\Livewire\Vehicles;

use App\Models\Vehicle;
use Livewire\Component;
use Illuminate\View\View;

class VehicleDetails extends Component
{
    public bool $open = false;
    public ?Vehicle $vehicle = null;
    public string $url = '/storage/img/car.png';
    protected $listeners = ['open','modal.closed' => 'close'];

    public function mount():void {
        if (!is_null($this->vehicle)) $this->url = $this->vehicle->image_url;
    }

    public function open(int $vehicle):void {
        $this->vehicle = Vehicle::find($vehicle);
        $this->open = true;
        $this->mount();
    }

    public function updatedOpen():void {
        if(!$this->open) $this->close();
    }

    public function close(): void {
        $this->reset();
    }

    public function render():View {
        return view('livewire.vehicles.vehicle-details');
    }
}
