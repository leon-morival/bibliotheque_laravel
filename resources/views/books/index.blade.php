<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Liste des livres</h1>

        @if ($books->isEmpty())
            <p>Aucun livre trouvé.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($books as $book)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $book->title }}</h2>
                            <p class="text-gray-600 mb-2"><strong>Auteur:</strong> {{ $book->author }}</p>
                            <p class="text-gray-500 mb-4"><strong>Année:</strong> {{ $book->year }}</p>

                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-700 mr-2">Disponible:</span>
                                <span
                                    class="text-sm font-bold {{ $book->available ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $book->available ? 'Oui' : 'Non' }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
