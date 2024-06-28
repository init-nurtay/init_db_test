<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>

                <div class="p-6">
                    <div>
                        <a href="/leads">leads</a>
                    </div>
                    <div>
                        <a href="/projects">projects</a>
                    </div>
                    <div>
                        <a href="/tasks">tasks</a>
                    </div>
                    <div>
                        <a href="/payments">payments</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
