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

<body class="min-h-full md:grid grid-cols-[1fr_80%] grid-rows-[90px_1fr]">


    <div class="logo-container py-2 border-r border-gray-600">
        <a href="/" class="h-full md:w-11/12 mx-auto flex align-middle">
            <img src="images/logo.png" alt="">
            <span class="md:my-auto font-bold text-xl px-2 md:px-5">LOGO</span>
        </a>
    </div>
    <!-- 3F4E4F -->

    <x-sidebar />

    <main class="row-span-2 w-11/12 mx-auto">
        {{ $slot }}
    </main>

    <!-- <footer class="mt-auto bg-gray-600">Some footer</footer> -->

</body>

</html>
