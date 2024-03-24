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
    <div type="hidden" {{$prphone = $phone}} /div>
    <form method="POST" action="{{ route('update', ['phone' => $prphone]) }}" enctype="multipart/form-data">
        @csrf
        <h1>Editing the device</h1>
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$phone->name" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        <div class="mt-4">
            <x-input-label for="release_date" :value="__('Release date')" />
            <div class="container block mt-1 w-full">
                <input id="release_date" class="block mt-1 w-full date form-control" type="text" name="release_date" value="{{ $phone->date }}" required>
            </div>
            <script type="text/javascript">
                $('.date').datepicker({
                    format: 'dd-mm-yyyy'
                });
            </script>
        </div>

        <div class="mt-4">
            <x-input-label for="memory_configuration" :value="__('Memory configurations')" />
            <x-text-input id="memory_configuration" class="block mt-1 w-full" type="text" name="memory_configuration" :value="$phone->memory" required />
            <x-input-error :messages="$errors->get('memory_configuration')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="processor" :value="__('System-on-Chip')" />
            <x-text-input id="processor" class="block mt-1 w-full" type="text" name="processor" :value="$phone->SoC" required />
            <x-input-error :messages="$errors->get('processor')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="cameras" :value="__('Cameras')" />
            <x-text-input id="cameras" class="block mt-1 w-full" type="text" name="cameras" :value="$phone->cameras" required />
            <x-input-error :messages="$errors->get('cameras')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="image" :value="__('Image')" />
            <input id="image" type="file" class="block mt-1 w-full" name="image">
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <x-primary-button class="mt-4">
            {{ __('Update the device') }}
        </x-primary-button>
    </form>
</x-guest-layout>
