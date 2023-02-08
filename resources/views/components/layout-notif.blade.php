
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

<body class="bg-gray-300">
        </div>
        <main class="col-start-2 w-11/12 mx-auto">
        {{ $slot }}
    </main>

    <!-- <footer class="mt-auto bg-gray-600">Some footer</footer> -->

</body>

</html>
