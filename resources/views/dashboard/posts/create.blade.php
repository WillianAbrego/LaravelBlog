<x-app-layout>

  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Post') }}
    </h2>
  </x-slot>

  <x-slot name="nav">
    <div class="space-x-4">
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


  <div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

        <div class="p-6">
          <x-form action="{{ route('posts.store') }}" has-files>

            {{-- Conver image --}}
            <div class="space-y-6">
              <div>
                <x-label for="cover_image" value="{{ __('Conver image') }}" /> <br>
                <input type="file" name="conver_image" id="cover_image">
                <span class="mt-2 text-xs text-gray-500">File type : jpg,png only</span>
                <x-input-error for="cover_image" class="mt-2" />
              </div>

              {{-- Title --}}
              <div class="mt-4">
                <x-label for="title" value="{{ __('Title') }}" />
                <x-input id="title" class="block w-full mt-1" type="text" name="title" :value="old('title')"
                  autofocus autocomplete="title" />
                <span class="mt-2 text-xs text-gray-500">Maximum 200 characters</span>
                <x-input-error for="title" class="mt-2" />
              </div>

              {{-- Category --}}
              <div>
                <x-label for="category_id" value="{{ __('Categories') }}" /> <br>
                <select name="category_id" id="category_id"
                  class="block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                  <option>Please select a category</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>

              {{-- Body --}}
              <div class="mt-4">
                <x-label for="body" value="{{ __('Body') }}" />
                <x-trix name="body" styling="overflow-y-scroll h-96"></x-trix>
                <x-input-error for="body" class="mt-2" />
              </div>

              {{-- Schedule --}}
              <div>
                <x-label for="published_at" value="{{ __('Schedule Date') }}" />
                <x-pikaday name="published_at" />
              </div>

              <x-tags :tags="$tags" />

              {{-- Meta Description --}}
              <div>
                <x-label for="meta_description" value="{{ __('Meta description') }}" />
                <x-trix name="meta_description" styling="overflow-y-scroll h-40"></x-trix>
                <x-input-error for="meta_description" class="mt-2" />

              </div>
            </div>
            <x-button class="mt-12">
              {{ __('Create') }}
            </x-button>

          </x-form>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>
