<?php

namespace App\Http\Livewire\Profile;

use Laravel\Jetstream\Http\Livewire\UpdateProfileInformationForm as BaseComponent;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ExtendedUpdateProfileInformationForm extends BaseComponent
{

    public function mount()
    {
        parent::mount(); // 🧠 mantiene la inicialización original de Jetstream

        $user = Auth::user();

        // Agregamos los datos adicionales
        $this->state['dni'] = $user->customer->dni ?? '';
        $this->state['phone'] = $user->customer->phone ?? '';
        $this->state['birth_date'] = $user->customer->birth_date
            ? Carbon::parse($user->customer->birth_date)->format('d/m/Y')
            : '';
    }

    public function updateProfileInformation(UpdatesUserProfileInformation $updater)
    {
        parent::updateProfileInformation($updater);

        // 🔁 Refresca los datos extendidos tras guardar
        $this->mount();
        $this->dispatch('profileUpdated');
    }

    public function render()
    {
        // Reutilizamos la misma vista de Jetstream
        return view('profile.update-profile-information-form');
    }
}
