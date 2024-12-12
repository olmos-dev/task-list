<div x-data="{flash:true}">
    @if (session()->has('success'))
    <div x-show="flash" class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700" role="alert">
        <strong><i class="fas fa-circle-check"></i> Exitoso</strong>
        <div> {{session('success')}}</div>

        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke-width="1.5" @click="flash = false"
              stroke="currentColor" class="h-6 w-6 cursor-pointer">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </span>
    </div>
    @endif
</div>
