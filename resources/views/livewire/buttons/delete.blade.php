{{-- <form action="{{ route('posts.delete', $post) }}" method="POST">
  @csrf
  @method('Delete')
  <button type="submit" class="p-1 border-2 border-red-200 rounded-md">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
      class="w-4 h-4 text-red-500">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
    </svg>
  </button>

</form> --}}

<div x-data="{ open: false }" class="p-2 bg-red-300 rounded">
  <button x-on:click="open = !open">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
      class="w-4 h-4 text-white">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
    </svg>
  </button>
  <div x-show="open">
    <div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center">
      <div
        class="modal-container bg-white w-5/6 md:max-w-2xl mx-auto rounded shadow-lg z-50 overflow-y-auto cursor-auto"
        x-on:click.stop>
        <div
          class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
          <!--Body-->
          <x-dialog-modal wire:model="confirmingPostDeletion">
            <x-slot name="title">
              {{ __('Delete Post') }}
            </x-slot>

            <x-slot name="content">
              {{ __('Are you sure you want to delete your this post?') }}
            </x-slot>

            <x-slot name="footer">
              <div x-on:click="open = false">
                <x-secondary-button wire:click="$toggle('confirmingPostDeletion')" wire:loading.attr="disabled">
                  {{ __('Nevermind') }}
                </x-secondary-button>
              </div>
              <x-danger-button class="ml-2" wire:click="deletePost" wire:loading.attr="disabled">
                {{ __('Delete Post') }}
              </x-danger-button>
            </x-slot>
          </x-dialog-modal>
        </div>
      </div>
    </div>
  </div>
</div>
