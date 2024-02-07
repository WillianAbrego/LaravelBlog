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
    <!-- Dialog (full screen) -->
    <div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center"
      style="background-color: rgba(0,0,0,.5);" x-show="open">

      <!-- A basic modal dialog with title, body and one button to close -->
      <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0"
        @click.away="open = false">

        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
          <h3 class="text-lg font-medium leading-6 text-gray-900">
            Modal Title
          </h3>

          <div class="mt-2">
            <p class="text-sm leading-5 text-gray-500">
              Adipisci quasi doloribus. Veniam veritatis dignissimos. Quis maiores ea. Et nulla sunt.
            </p>
          </div>
        </div>

        <!-- One big close button.  --->
        <div class="mt-5 sm:mt-6">
          <div class="flex flex-row justify-between w-full">
            <button @click="open = false"
              class="flex-grow px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700 mr-2">
              Close this modal!
            </button>
            <button @click="open = false"
              class="flex-grow px-4 py-2 text-white bg-red-500 rounded hover:bg-red-700 ml-2" wire:click="deletePost">
              Another Button
            </button>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
