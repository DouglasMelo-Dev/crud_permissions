<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Você está logado!!") }}<br>
                    {{ $user = Auth::user()->name }}<br>
                    {{ $id = Auth::id() }}<br>
                    @if ($userAdmin = Auth::user()->groups()->where('name', 'admin')->exists() )
                        Ted é admin!!
                    @endif
                    {{-- {{  $userAdmin = Auth::user()->groups()->where('name', 'admin')->exists() }} --}}

                </div>
            </div>
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="vaga">Piloto</div>
                </div>
            </div>
            @can('pode_ver')
                <div class="mt-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="vaga">Comissário de Bordo</div>
                    </div>
                </div>
            @endcan
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-primary-button class="ms-4">
                        Financeiro
                    </x-primary-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
