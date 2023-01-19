@props(['data'])

<x-tables.style>
    <x-slot:headers>
        <th class="md:py-3 p-2">NAMA</th>
        <th class="md:py-3 p-2">EMAIL</th>
        <th class="md:py-3 p-2">NO. TELP</th>
        <th class="md:py-3 p-2">LEVEL</th>
    </x-slot:headers>

    @foreach ($data as $key => $item)
    <tr class="hover:bg-gray-100">
        <td class="md:py-3 p-2">{{ $item->nama }}</td>
        <td class="md:py-3 p-2">{{ $item->email }}</td>
        <td class="md:py-3 p-2">{{ $item->no_tlp }}</td>
        <td class="md:py-3 p-2">{{ $item->level_user }}</td>
    </tr>
    @endforeach

</x-tables.style>
