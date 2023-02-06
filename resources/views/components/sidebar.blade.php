<style>
nav a:hover::after,
nav a.active::after {
    content: '';
    display: inline-block;
    position: absolute;
    width: 10px;
    height: 100%;
    top: 0;
    right: 0;
    border-radius: 8px 0 0 8px;
    background-color: rgb(9 47 105 / 0.9);
}
nav a.active {
    background-color: rgb(9 47 105 / 0.25);
}
</style>

<nav class="py-2 h-full bg-white">
    <ul class="w-15 mt-4 ml-4 md:grid gap-4">
        <li class="relative"><a href="/dashboard" class=" {{ Request::is('/') || Request::is('dashboard') ? 'active' : '' }} mr-8 block rounded-md font-bold py-2 md md:p-3 text-[#092F69] hover:bg-[#092F69]/25 active:bg-blue-400/70">Dashboard</a></li>
        <li class="relative"><a href="/umkm" class=" {{ Request::is('umkm') || Request::is('umkm/*') ? 'active' : '' }} mr-8 block rounded-md py-2 font-bold md md:p-3 text-[#092F69] hover:bg-[#092F69]/25 active:bg-blue-400/70">Data UMKM</a></li>
        <li class="relative"><a href="/users" class=" {{ Request::is('users') ? 'active' : '' }} mr-8 block rounded-md py-2 font-bold md md:p-3 text-[#092F69] hover:bg-[#092F69]/25 active:bg-blue-400/70">Data User</a></li>
    </ul>
</nav>
