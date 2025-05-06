<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un livre') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative p-6 text-gray-900">
                <h1>Ajouter un livre</h1>
                <form action="{{ route('livres.store') }}" method="POST">
                    @csrf
                    <input type="text" name="titre" id="titre" placeholder="Titre du livre" required>
                    <input type="text" name="prenom_auteur" id="prenom_auteur" placeholder="Prénom de l'auteur" required>
                    <input type="hidden" name="auteur_id" id="auteur_id">
                    <div id="suggestions" class="border bg-white absolute z-10 w-64"></div>
                    <input type="text" name="nom_auteur" id="nom_auteur" placeholder="Nom de l'auteur" required>
                    <button type="submit">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        const inputPrenom = document.getElementById('prenom_auteur');
        const inputNom = document.getElementById('nom_auteur');
        const suggestions = document.getElementById('suggestions');
        const auteurId = document.getElementById('auteur_id');

        inputPrenom.addEventListener('input', function () {
            const query = this.value;
            if (query.length < 2) {
                suggestions.innerHTML = '';
                return;
            }

            fetch(`/auteurs/search?term=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(data => {
                    console.log('Script chargé.');
                    suggestions.innerHTML = '';
                    data.forEach(auteur => {
                        const option = document.createElement('div');
                        option.textContent = auteur.value;
                        option.classList.add('px-4', 'py-2', 'hover:bg-gray-200', 'cursor-pointer');
                        option.addEventListener('click', () => {
                            inputPrenom.value = auteur.prenom;
                            inputNom.value = auteur.nom;
                            auteurId.value = auteur.id;
                            suggestions.innerHTML = '';
                        });
                        suggestions.appendChild(option);
                    });
                });
        });

        document.addEventListener('click', (e) => {
            if(!suggestions.contains(e.target) && e.target !== input) {
                suggestions.innerHTML = '';
            }
        })
    </script>
</x-app-layout>
