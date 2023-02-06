@props(['data'])

<x-tables.style>
    <x-slot:headers>
        <th class="md:py-3 p-2">NAMA UMKM</th>
        <th class="md:py-3 p-2">ALAMAT UMKM</th>
        <th class="md:py-3 p-2">EMAIL UMKM</th>
        <th class="md:py-3 p-2">NO. TELP</th>
        <th class="md:py-3 p-2">VERIFIKASI</th>
    </x-slot:headers>

    @foreach ($data as $key => $item)
        <tr class="hover:bg-gray-100">
            <td class="md:py-3 p-2">
                {{ $item->nama_umkm }}
                <x-dropdown.data-produk :id_umkm="$item->user_id" />
            </td>
            <td class="md:py-3 p-2">{{ $item->nama_jln }}</td>
            <td class="md:py-3 p-2">{{ $item->email_umkm }}</td>
            <td class="md:py-3 p-2">{{ $item->no_tlp }}</td>
            <td class="md:py-3 p-2">
                {{-- centang --}}
                <button>
                    <span> <svg width="40" height="33" viewBox="0 0 40 33" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M17.6667 22.275L29.4167 12.5812L27.0833 10.6562L17.6667 18.425L12.9167 14.5063L10.5833 16.4312L17.6667 22.275ZM8.33333 28.875C7.41667 28.875 6.63167 28.606 5.97833 28.0679C5.32611 27.5289 5 26.8813 5 26.125V6.875C5 6.11875 5.32611 5.47112 5.97833 4.93212C6.63167 4.39404 7.41667 4.125 8.33333 4.125H31.6667C32.5833 4.125 33.3683 4.39404 34.0217 4.93212C34.6739 5.47112 35 6.11875 35 6.875V26.125C35 26.8813 34.6739 27.5289 34.0217 28.0679C33.3683 28.606 32.5833 28.875 31.6667 28.875H8.33333ZM8.33333 26.125H31.6667V6.875H8.33333V26.125Z" fill="#05FF00"/> </svg></span>
                </button>

                {{-- silang --}}
                <button>
                    <span class=""> <svg width="40" height="33" viewBox="0 0 40 33" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15 9.625H18.3333L20 13.0625L21.6667 9.625H25L21.6667 16.5L25 23.375H21.6667L20 19.9375L18.3333 23.375H15L18.3333 16.5L15 9.625ZM8.33333 4.125H31.6667C32.5507 4.125 33.3986 4.41473 34.0237 4.93046C34.6488 5.44618 35 6.14565 35 6.875V26.125C35 26.8543 34.6488 27.5538 34.0237 28.0695C33.3986 28.5853 32.5507 28.875 31.6667 28.875H8.33333C7.44928 28.875 6.60143 28.5853 5.97631 28.0695C5.35119 27.5538 5 26.8543 5 26.125V6.875C5 6.14565 5.35119 5.44618 5.97631 4.93046C6.60143 4.41473 7.44928 4.125 8.33333 4.125ZM8.33333 6.875V26.125H31.6667V6.875H8.33333Z" fill="#F24E1E"/></svg> </span>
                </button>
            </td>
        </tr>
    @endforeach

</x-tables.style>

