<x-coyote>

    <x-jet.banner />
    
    <div class="min-h-screen bg-gray-100 m-5">
    
        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif
    
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</x-coyote>

