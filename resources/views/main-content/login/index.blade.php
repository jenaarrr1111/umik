<x-layout-login>
<body>
    <form method="POST" action="/login/session">
        @csrf

        <!-- Email Address -->
        <div>
            <input for="email" type="email" name="email"required >
        </div>

        <!-- Password -->
        <div class="mt-4">
            <input type="password" name="password" id="password" required>
        </div>
            <button type="submit" name="submit">
            <button>
        </div>
    </form>
</body>

</html>
</x-layout-login>
