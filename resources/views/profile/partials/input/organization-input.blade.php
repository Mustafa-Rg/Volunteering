{{-- Location --}}
<div>
    <x-input-label for="location" :value="__('Location')" />

    @if ($user->organization && $user->organization->location)
        <x-text-input id="location" name="location" type="text" class="mt-1 block w-full"
            :value="old('location', $user->organization->location)" required autofocus autocomplete="location" />
    @else
        <x-text-input id="location" name="location" type="text" class="mt-1 block w-full"
            :value="old('location')" required autofocus autocomplete="location" />
    @endif

    <x-input-error class="mt-2" :messages="$errors->get('location')" />
</div>



{{-- Catagory --}}
<div>
    <x-input-label for="category" :value="__('Category')" />

    @if ($user->organization && $user->organization->category)
        <x-text-input id="category" name="category" type="text" class="mt-1 block w-full"
            :value="old('category', $user->organization->category)" required autofocus autocomplete="category" />
    @else
        <x-text-input id="category" name="category" type="text" class="mt-1 block w-full"
            :value="old('category')" required autofocus autocomplete="category" />
    @endif

    <x-input-error class="mt-2" :messages="$errors->get('category')" />
</div>


{{-- About --}}
<div>
    <x-input-label for="about" :value="__('About')" />

    @if ($user->organization && $user->organization->about)
        <x-textarea-input id="about" name="about" class="mt-1 block w-full"
            :value="old('about', $user->organization->about)" required autofocus autocomplete="about" />
    @else
        <x-textarea-input id="about" name="about" class="mt-1 block w-full"
            :value="old('about')" required autofocus autocomplete="about" />
    @endif

    <x-input-error class="mt-2" :messages="$errors->get('about')" />
</div>


{{-- Phone Number --}}
<div>
    <x-input-label for="phone_number" :value="__('Phone Number')" />

    @if ($user->organization && $user->organization->phone_number)
        <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full"
            :value="old('phone_number', $user->organization->phone_number)" required autofocus autocomplete="phone_number" />
    @else
        <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full"
            :value="old('phone_number')" required autofocus autocomplete="phone_number" />
    @endif

    <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
</div>
