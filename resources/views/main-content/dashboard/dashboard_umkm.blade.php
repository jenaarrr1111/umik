<x-layout>

    <div class="flex justify-between items-center">
        <header>
            <h1 class="text-3xl font-bold my-5">{{ $title }}</h1>
        </header>
   </div>

    <div class="max-w-xs ml-auto">
        @include('partials.search', ['path' => '/umkm'])
    </div>
   
        <div class="p-5 rounded-md shadow-lg bg-slate-50 min-h-[50%] overflow-auto mb-5">
            <x-tables.list :data="$umkm" />
        </div>

</x-layout>