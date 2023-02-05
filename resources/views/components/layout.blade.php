
<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Utk sementara pake cdn, krn sebelum pake cdn, ada class yg ga punya efek sama sekali -->
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')

    <title>UMIK</title>
</head>

<body class="min-h-full md:grid grid-cols-[1fr_80%] bg-gray-300">

    <div class="col-start-1 fixed w-full md:w-[20%] md:h-full top-0 z-10">
        <div class="logo-container py-2 md:py-4 border-gray-600 bg-white">
            <a href="/" class="h-full md:w-11/12 mx-auto flex align-middle">
                <img class="w-32 mr-2" src="{{url('umik.png')}}">
            </a>
        </div>

        {{-- {{ Request::is('/') ? 'huauuoauau' : 'hehhhee'}} --}}
        <x-sidebar />
    </div>

    <main class="col-start-2 w-11/12 mx-auto">
        {{ $slot }}
    </main>

    <!-- <footer class="mt-auto bg-gray-600">Some footer</footer> -->

</body>

</html>
