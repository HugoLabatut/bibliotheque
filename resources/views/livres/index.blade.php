<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des livres') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Auteur</th>
                                <th class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($livres as $livre)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $livre->titre }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $livre->auteur }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Modifier</a>
                                        |
                                        <a href="#" class="text-red-600 hover:text-red-900">Supprimer</a>
                                    </td>
                                </tr>
                            @endforeach
                         </tbody>
                    </table>
                </div>
            </div>

            <div class="p-6 text-gray-900">
                <h1>Liste des livres</h1>
                <a href="{{ route('livres.create') }}" class="text-blue-500 underline">
                    Ajouter un livre
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

