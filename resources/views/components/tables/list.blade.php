@props(['data'])

<x-tables.style>
    <x-slot:headers>
        <th class="md:py-3 p-2">NAMA UMKM</th>

    </x-slot:headers>

    @foreach ($data as $key => $item)
        <tr class="hover:bg-gray-100">
            <!-- flex justify-center content-center gap-2 -->
            <td class="md:py-3 p-2">
                {{ $item->nama_umkm }}
                <x-dropdown.data_umkm :id="$item->id" />

            </td>

        </tr>
    @endforeach

</x-tables.style>
