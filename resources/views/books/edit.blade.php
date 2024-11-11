<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Modifier le livre</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH') <!-- La méthode PATCH pour la mise à jour -->

            <div class="mb-4">
                <label for="title" class="block text-gray-700">Titre</label>
                <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}"
                    class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="author" class="block text-gray-700">Auteur</label>
                <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}"
                    class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="year" class="block text-gray-700">Année</label>
                <input type="number" name="year" id="year" value="{{ old('year', $book->year) }}"
                    class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="cover_image" class="block text-gray-700">Image de couverture</label>
                <input type="file" name="cover_image" id="cover_image" class="w-full border p-2 rounded">
                @if ($book->cover_image)
                    <p class="mt-2">Image actuelle :</p>
                    <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Couverture actuelle"
                        class="w-32 h-32 object-cover">
                @endif
            </div>

            <div class="mb-4">
                <label for="available" class="flex items-center">
                    <input type="checkbox" name="available" id="available"
                        {{ old('available', $book->available) ? 'checked' : '' }} class="mr-2">
                    Disponible
                </label>
            </div>

            <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white font-bold rounded hover:bg-blue-600">
                Modifier le livre
            </button>
        </form>


    </div>
</x-app-layout>