@props(['data'])

<x-tables.style>
    <x-slot:headers>
        <th class="md:py-3 p-2">NAMA PRODUK</th>
        <th class="md:py-3 p-2">KATEGORI</th>
    </x-slot:headers>

    @foreach ($data as $key => $item)
        <tr class="hover:bg-gray-100">
            <td class="md:py-3 p-2">{{ $item->nama_produk }}</td>
            <td class="md:py-3 p-2">{{ $item->kategori }}</td>
        </tr>
    @endforeach

</x-tables.style>
