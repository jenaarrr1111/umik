<x-layout>
    <div class="flex justify-between items-center">
        <header>
            <h1 class="text-3xl font-bold my-5">{{ $title }}</h1>
        </header>
        <!-- Notification -->
        @if($Total)
<div class="w-min">
    <a href='/umkm/pengajuan' class="inline-block relative text-gray-800 hover:text-gray-400 focus:outline-none focus:text-gray-500 transition duration-150 ease-in-out" aria-label="Notification">
        <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>

        {{-- <span class="absolute inset-0 object-right-top -mr-6"> --}}
        <span class="absolute top-0 right-0 translate-x-2 -translate-y-4">
            <div class="inline-flex items-center px-1.5 py-0.5 border-2 border-white rounded-full text-xs font-semibold leading-4 bg-red-500 text-white">{{$Total}}</div>
        </span>
    </a>
</div>
@else
<div class="w-min">
    <a href='/umkm/pengajuan' class="inline-block relative text-gray-800 hover:text-gray-400 focus:outline-none focus:text-gray-500 transition duration-150 ease-in-out" aria-label="Notification">
        <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>

        {{-- <span class="absolute inset-0 object-right-top -mr-6"> --}}
        
    </a>
</div>
@endif
    <!-- Search -->
    </div>

    <div class="max-w-xs ml-auto">
        @include('partials.search', ['path' => '/umkm'])
    </div>
<!-- Tabel -->
    @if (count($umkm) == 0)
        <div class="p-5 rounded-md shadow-lg bg-slate-50 min-h-[50%] overflow-auto">
            <p>Tidak ada umkm</p>
        </div>
    @else

        <div class="p-5 rounded-md shadow-lg bg-slate-50 min-h-[50%] overflow-auto mb-5">
            <x-tables.umkm :data="$umkm" />
        </div>
    @endif

</x-layout>