<x-layout>
    <form method="POST" action="">
        @csrf

        <div>
            <label for="email">Email</label>
            <input type="email" name="email">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>

        <div>
            <button type="submit">Sign In</button>
        </div>
    </form>
</x-layout>
