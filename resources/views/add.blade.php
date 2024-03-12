<x-guest-layout>
    <style>
        h1 {
            font-size: 25px;
            padding: 10px 0;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

    <form method="POST" action="{{ route('adding') }}">
        @csrf
        <h1>Adding the device</h1>
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>


        <div class="mt-4">
            <x-input-label for="release_date" :value="__('Release date')" />
{{--            <x-text-input id="release_date" class="block mt-1 w-full" name="release_date" :value="old('release_date')" required />--}}
{{--            <x-input-error :messages="$errors->get('release_date')" class="mt-2" />--}}
            <div class="container block mt-1 w-full">
                <input id="release_date" class="block mt-1 w-full date form-control" type="text" name="release_date" required>
            </div>
            <script type="text/javascript">
                $('.date').datepicker({
                    format: 'dd-mm-yyyy'
                });
            </script>
        </div>

        <div class="mt-4">
            <x-input-label for="memory_configuration" :value="__('Memory configurations')" />
            <x-text-input id="memory_configuration" class="block mt-1 w-full" type="text" name="memory_configuration" :value="old('memory_configuration')" required />
            <x-input-error :messages="$errors->get('memory_configuration')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="processor" :value="__('System-on-Chip')" />
            <x-text-input id="processor" class="block mt-1 w-full" type="text" name="processor" :value="old('processor')" required />
            <x-input-error :messages="$errors->get('processor')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="cameras" :value="__('Cameras')" />
            <x-text-input id="cameras" class="block mt-1 w-full" type="text" name="cameras" :value="old('cameras')" required />
            <x-input-error :messages="$errors->get('cameras')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="image_link" :value="__('Image link')" />
            <x-text-input id="image_link" class="block mt-1 w-full" type="url" name="image_link" :value="old('image_link')" required />
            <x-input-error :messages="$errors->get('image_link')" class="mt-2" />
        </div>

        <x-primary-button class="mt-4">
            {{ __('Add the device') }}
        </x-primary-button>
    </form>
</x-guest-layout>
