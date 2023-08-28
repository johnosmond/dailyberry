<x-app-layout>
    <x-slot name="header">
        {{ __($flavor->flavor) }}
    </x-slot>
    <div class="pt-4">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-error" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <h1>{{ $flavor->flavor }}</h1>
            <p>{{ $flavor->description ?: 'This flavor does not have a description.' }}</p>
            <div class="mt-10">
                <a href="{{ route('flavors.edit', ['flavor' => $flavor->id]) }}" class="btn btn-primary">Edit Flavor</a>
            </div>
        </div>
    </div>
</x-app-layout>
