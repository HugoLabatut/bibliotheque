<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un auteur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900">
                <h1>Ajouter un livre</h1>
                <form action="{{ route('auteurs.store') }}" method="POST">
                    @csrf
                    <input type="text" name="prenom" id="prenom" placeholder="Prénom de l'auteur" required>
                    <input type="text" name="nom" id="nom" placeholder="Nom de l'auteur" required>
                    <button type="submit">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
