<div>
    <x-input-label for="date_of_birth" :value="__('Date of birth')" />

    @if ($user->volunteer && $user->volunteer->date_of_birth)
        <x-date-input id="date_of_birth" name="date_of_birth" class="mt-1 block w-full"
            :value="old('date_of_birth', $user->volunteer->date_of_birth)" required autofocus autocomplete="date_of_birth" />
    @else
        <x-date-input id="date_of_birth" name="date_of_birth" class="mt-1 block w-full"
            :value="old('date_of_birth')" required autofocus autocomplete="date_of_birth" />
    @endif

    <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
</div>

<div>
    <x-input-label for="phone_number" :value="__('Phone Number')" />

    @if ($user->volunteer && $user->volunteer->phone_number)
        <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full"
            :value="old('phone_number', $user->volunteer->phone_number)" required autofocus autocomplete="phone_number" />
    @else
        <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full"
            :value="old('phone_number')" required autofocus autocomplete="phone_number" />
    @endif

    <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
</div>
