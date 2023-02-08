<x-layout>

    <div class="flex justify-between items-center">
        <header>
            <h1 class="text-3xl font-bold my-5">{{ $title }}</h1>
        </header>
   </div>

    <div class="max-w-xs ml-auto">
        @include('partials.search', ['path' => '/umkm'])
    </div>
    @if (count($produk) == 0)
        <div class="p-5 rounded-md shadow-lg bg-slate-50 min-h-[50%] overflow-auto">
            <p>Tidak ada produk</p>
        </div>
    @else

        <div class="p-5 rounded-md shadow-lg bg-slate-50 min-h-[50%] overflow-auto mb-5">
            <x-tables.data-produk :data="$produk" />
        </div>
    @endif

</x-layout>