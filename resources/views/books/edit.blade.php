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
            @method('PATCH')

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
                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="year" name="year" required>
                    @php
                        $currentYear = \Carbon\Carbon::now()->year;
                    @endphp
                    @for ($year = $currentYear; $year >= 1700; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
            </div>

            <div class="mb-4">
                <label for="cover_image" class="block text-gray-700">Image de couverture</label>
                <input type="file" name="cover_image" id="cover_image" class="w-full border p-2 rounded">
                @if ($book->cover_image)
                    <p class="mt-2">Image actuelle :</p>
                    <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Couverture actuelle"
                        class="h-48 object-cover">
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
