<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ app('ini-translator')->trans('secure') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="app('ini-translator')->trans('password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ app('ini-translator')->trans('confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
