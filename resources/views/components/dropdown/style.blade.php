<style>
.dropdown:hover .dropdown-menu {
    display: block;
}
</style>
<div class="dropdown inline-block relative">
    <button class="my-auto hover:bg-slate-300 p-1 rounded-sm">
        {{ $dropdown_name }}
        <span>
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
            </svg>
        </span>
    </button>
    <ul class="dropdown-menu absolute hidden pt-1">
        {{ $slot }}
    </ul>
</div>
