<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Posts') }}
    </h2>
  </x-slot>
  <x-slot name="nav">
    <div>
      {{-- Index --}}
      <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
        {{ __('Index') }}
      </x-nav-link>

      {{-- Create --}}
      <x-nav-link href="{{ route('posts.create') }}" :active="request()->routeIs('posts.create')">
        {{ __('Create') }}
      </x-nav-link>
    </div>
  </x-slot>
  <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    <x-ui.alerts />
  </div>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <livewire:post.index></livewire:post.index>
      </div>
    </div>
  </div>
</x-app-layout>
