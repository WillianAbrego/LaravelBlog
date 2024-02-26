<div class="mb-4">
  <x-ui.alerts />

  <form wire:submit.prevent="formSubmit">

    <div class="container max-w-4xl mx-auto space-y-5 text-left">

      {{-- Name --}}
      <div>
        <x-label for="name" value="{{ __('Name') }}" class="font-bold" />
        <x-input wire:model="name" name="name" id="name" class="block w-full mt-1" type="text" />
        <x-input-error for="name" class="mt-2" />
      </div>

      {{-- Email --}}
      <div>
        <x-label for="email" value="{{ __('Email') }}" class="font-bold" />
        <x-input wire:model="email" name="email" id="name" class="block w-full mt-1" type="text" />
        <x-input-error for="email" class="mt-2" />
      </div>

      {{-- Submit Button --}}
      <div>
        <x-button class="mt-12">
          {{ __('Subscribe') }}
        </x-button>
      </div>
    </div>
  </form>
</div>
