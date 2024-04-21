<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ app('ini-translator')->trans('thank') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ app('ini-translator')->trans('newsent') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ app('ini-translator')->trans('resend') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ app('ini-translator')->trans('logout') }}
            </button>
        </form>
    </div>
    <script>
        var visitedPages = JSON.parse(sessionStorage.getItem('visited_pages')) || [];
        visitedPages.push(window.location.pathname);
        sessionStorage.setItem('visited_pages', JSON.stringify(visitedPages));
    </script>
</x-guest-layout>
