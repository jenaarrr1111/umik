<x-layout>
    <header>
        <h1 class="text-3xl font-bold my-5">{{ $title }}</h1>
    </header>

    @include('partials.search')

    <p>Halo, ini adalah halaman {{ $title }}</p>
</x-layout>
