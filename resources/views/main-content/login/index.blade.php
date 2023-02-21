<x-layout-login>
<body>

<form method="post" action="/login">
        @csrf

        <!-- Email Address -->
        <div>
            <input for="email" type="email" name="email" id="emai" required autofocus>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <input type="password" name="password" id="password"  required>
        </div>
            <button type="submit" name="submit">
            <button>
        </div>
    </form>
</body>
</x-layout-login>
