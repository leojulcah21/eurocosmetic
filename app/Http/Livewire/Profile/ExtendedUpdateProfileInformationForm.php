<?php

namespace App\Http\Livewire\Profile;

use Laravel\Jetstream\Http\Livewire\UpdateProfileInformationForm as BaseComponent;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;

class ExtendedUpdateProfileInformationForm extends BaseComponent
{

    public function mount()
    {
        parent::mount();

        /** @var User|null $user */
        $user = Auth::user();

        $this->state['dni'] = '';
        $this->state['phone'] = '';
        $this->state['birth_date'] = '';

        if ($user->hasRole('Customer')) {
            $customer = $user->customer;

            if ($customer) {
                $this->state['dni'] = $customer->dni ?? '';
                $this->state['phone'] = $customer->phone ?? '';
                $this->state['birth_date'] = $customer->birth_date
                    ? Carbon::parse($customer->birth_date)->format('d/m/Y')
                    : '';
            }
        }

        if ($user->hasRole('Employee')) {
            $employee = $user->employee;

            if ($employee) {
                $this->state['dni'] = $employee->dni ?? '';
                $this->state['phone'] = $employee->phone ?? '';
                $this->state['birth_date'] = $employee->birth_date
                    ? Carbon::parse($employee->birth_date)->format('d/m/Y')
                    : '';
            }
        }
    }

    public function updateProfileInformation(UpdatesUserProfileInformation $updater)
    {
        /** @var User|null $user */
        $user = Auth::user();

        if ($user->hasRole('Customer') || $user->hasRole('Employee')) {
            $this->validate([
                'state.dni'   => 'required|string|max:20',
                'state.phone' => 'required|string|max:20',
                'state.birth_date' => 'required|date_format:d/m/Y',
            ]);
        }

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
