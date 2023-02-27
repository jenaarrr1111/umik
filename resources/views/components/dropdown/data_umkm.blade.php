@props(['id'])

<x-dropdown.style>
    <x-slot:dropdown_name></x-slot:dropdown_name>
    <li>
        <a href="/dashboard/{{ $id }}" class="text-sm py-2 px-10 rounded-sm border border-slate-300 bg-slate-50 hover:bg-slate-100 block whitespace-nowrap">
            Details
        </a>
 
    </li>
</x-dropdown.style>
