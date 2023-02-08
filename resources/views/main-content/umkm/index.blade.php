<x-layout>

    <div class="flex justify-between items-center">
        <header>
            <h1 class="text-3xl font-bold my-5">{{ $title }}</h1>
        </header>
        @include('partials.notification', ['Total' =>$Total])
    </div>

    <div class="max-w-xs ml-auto">
        @include('partials.search', ['path' => '/umkm'])
    </div>

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