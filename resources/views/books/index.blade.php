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
                        @if ($book->cover_image)
                            <img src="{{ asset('storage/' . $book->cover_image) }}"
                                alt="Couverture de {{ $book->title }}" class="w-auto h-100 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-300 flex items-center justify-center text-gray-600">
                                Pas d'image
                            </div>
                        @endif

                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-gray-800 mb-1">{{ $book->title }}</h2>
                            <p class="text-gray-600 mb-1"><strong>Auteur:</strong> {{ $book->author }}</p>
                            <p class="text-gray-500 mb-1"><strong>Année:</strong> {{ $book->year }}</p>

                            <div class="flex items-center mb-1">
                                <span class="text-sm font-medium text-gray-700 mr-2">Disponible:</span>
                                <span
                                    class="text-sm font-bold {{ $book->available ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $book->available ? 'Oui' : 'Non' }}
                                </span>
                            </div>

                            @if ($book->available)
                                <form action="{{ route('borrow.book', $book) }}" method="POST">
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

                            @if (auth()->user() && auth()->user()->role === 'admin')
                                <a href="{{ route('books.edit', $book) }}"
                                    class="w-full py-2 px-4 bg-yellow-500 text-white font-bold rounded hover:bg-yellow-600 mt-4 flex items-center justify-center">
                                    <i class="fas fa-edit mr-2"></i> Modifier
                                </a>
                            @endif

                            @if (auth()->user() && auth()->user()->role === 'admin')
                                <form action="{{ route('books.destroy', $book) }}" method="POST"
                                    onsubmit="return confirm('Voulez-vous vraiment supprimer ce livre ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-full py-2 px-4 bg-red-500 text-white font-bold rounded hover:bg-red-600 mt-4 flex items-center justify-center">
                                        <i class="fas fa-trash mr-2"></i> Supprimer
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
