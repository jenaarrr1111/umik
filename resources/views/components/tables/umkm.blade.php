@props(['data'])

<x-tables.style>
    <x-slot:headers>
        <th class="md:py-3 p-2">NAMA UMKM</th>
        <th class="md:py-3 p-2">EMAIL UMKM</th>
        <th class="md:py-3 p-2">ALAMAT UMKM</th>
        <th class="md:py-3 p-2">NO. TELP</th>
    </x-slot:headers>

    @foreach ($data as $key => $item)
        <tr class="hover:bg-gray-100">
            <!-- flex justify-center content-center gap-2 -->
            <td class="md:py-3 p-2">
                {{ $item->nama_umkm }}
                <x-dropdown.data-produk :id_umkm="$item->user_id" />
            </td>
            <td class="md:py-3 p-2">{{ $item->email_umkm }}</td>
            <td class="md:py-3 p-2">{{ $item->nama_jln }}</td>
            <td class="md:py-3 p-2">{{ $item->no_tlp }}</td>
        </tr>
    @endforeach

</x-tables.style>
