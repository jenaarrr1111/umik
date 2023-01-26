@props(['id_umkm'])

<x-dropdown.style>
    <x-slot:dropdown_name></x-slot:dropdown_name>
    <li>
        <a href="/umkm/{{ $id_umkm }}" class="text-sm py-1 px-2 rounded-sm border border-slate-300 bg-slate-50 hover:bg-slate-100 block whitespace-nowrap">
            Data Produk
        </a>
    </li>
</x-dropdown.style>
