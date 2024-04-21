<x-guest-layout>
    <style>
        h1 {
            font-size: 25px;
            padding: 10px 0;
        }
    </style>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h1>Registration</h1>
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="app('ini-translator')->trans('name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="app('ini-translator')->trans('email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="app('ini-translator')->trans('password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="app('ini-translator')->trans('confpass')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ app('ini-translator')->trans('alrreg') }}
            </a>

            <x-primary-button class="ms-4">
                {{ app('ini-translator')->trans('register') }}
            </x-primary-button>
        </div>
    </form>
    <script>
        var visitedPages = JSON.parse(sessionStorage.getItem('visited_pages')) || [];
        visitedPages.push(window.location.pathname);
        sessionStorage.setItem('visited_pages', JSON.stringify(visitedPages));
    </script>
</x-guest-layout>
