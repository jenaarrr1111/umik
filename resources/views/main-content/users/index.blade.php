<x-layout>
    <header>
        <h1 class="text-3xl font-bold my-5">{{ $title }}</h1>
    </header>

    @if (count($users) == 0)
    <div class="p-5 shadow-xl min-h-[50%] overflow-auto">
        <p>Tidak ada user</p>
    </div>
    @else

    <div class="p-5 shadow-xl min-h-[50%] overflow-auto">
        <x-tables.user :data="$users" />
    </div>
    @endif

</x-layout>
