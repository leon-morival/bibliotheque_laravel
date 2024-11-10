<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Liste des livres</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif

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

                            <div class="flex items-center mb-4">
                                <span class="text-sm font-medium text-gray-700 mr-2">Disponible:</span>
                                <span
                                    class="text-sm font-bold {{ $book->available ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $book->available ? 'Oui' : 'Non' }}
                                </span>
                            </div>

                            @if ($book->available)
                                <form action="{{ route('borrow.book', $book) }}" method="POST" class="mt-4">
                                    @csrf
                                    <button type="submit"
                                        class="w-full py-2 px-4 bg-blue-500 text-white font-bold rounded hover:bg-blue-600">
                                        Emprunter ce livre
                                    </button>
                                </form>
                            @else
                                <button
                                    class="w-full py-2 px-4 bg-gray-400 text-white font-bold rounded cursor-not-allowed">
                                    Livre déjà emprunté
                                </button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
