<x-layout>

    <div class="flex justify-between items-center">
        <!-- Button Back -->
    <a href="/dashboard">
            <span class="sr-only">Kembali</span>
            <span><svg transform="rotate(180)" width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.69341 7.19041L2.76856 12.7137C2.35905 13.0954 1.69686 13.0954 1.2917 12.7137L0.307134 11.7958C-0.102378 11.4141 -0.102378 10.7968 0.307134 10.4191L4.50681 6.50406L0.307134 2.58903C-0.102378 2.20728 -0.102378 1.58997 0.307134 1.21228L1.28735 0.286317C1.69686 -0.0954389 2.35905 -0.0954389 2.7642 0.286317L8.68905 5.80959C9.10292 6.19135 9.10292 6.80865 8.69341 7.19041Z" fill="black"/></svg></span>
        </a>

        <header class="flex mb-4 mx-auto">
            <h1 class="text-3xl font-bold my-5 mx-auto">{{ $title }}</h1>
        </header>
   </div>
<!-- Search -->
    <div class="max-w-xs ml-auto">
        @include('partials.search', ['path' => '/dashboard/list'])
    </div>
   <!-- Tabel -->
        <div class="p-5 rounded-md shadow-lg bg-slate-50 min-h-[50%] overflow-auto mb-5">
            <x-tables.list :data="$umkm" />
        </div>

</x-layout>