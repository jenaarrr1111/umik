<div class="relative block mb-4 ml-auto shadow-md">
    <span class="sr-only">Search</span>

    <span class="absolute inset-y-0 left-0 flex items-center pl-2"><svg class="h-5 w-5 fill-slate-700" viewBox="0 0 20 20"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"> <g data-name="Layer 2"> <g data-name="search"> <rect width="24" height="24" opacity="0" /> <path d="M20.71 19.29l-3.4-3.39A7.92 7.92 0 0 0 19 11a8 8 0 1 0-8 8 7.92 7.92 0 0 0 4.9-1.69l3.39 3.4a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42zM5 11a6 6 0 1 1 6 6 6 6 0 0 1-6-6z" /> </g> </g> </svg> </svg></span>

    <form action="{{ $path }}" class="flex gap-2">
        <input type="text" name="search" class="w-full placeholder:text-slate-700 block border border-slate-300 rounded-lg py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Cari yang baru hari ini">
        <button type="submit" class="hidden">
            Search
        </button>
    </form>
</div>
