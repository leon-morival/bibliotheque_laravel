<x-app-layout>
    <div class="container mx-auto px-4 py-8">

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="w-full max-w-md mx-auto">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6">Ajouter un livre</h1>

            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('books.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Titre
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="title" name="title" type="text" placeholder="Titre" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="author">
                        Auteur
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="author" name="author" type="text" placeholder="Auteur" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="year">
                        Année
                    </label>
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
                    <label for="cover_image" class="block text-sm font-medium text-gray-700">Image de couverture</label>
                    <input type="file" name="cover_image" id="cover_image"
                        class="mt-1 block w-full text-sm text-slate-800  rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 file:border file:border-gray-300 file:rounded-lg file:px-4 file:py-2 file:text-sm file:font-semibold file:bg-gray-50 hover:file:bg-gray-100">
                </div>

                <div class="mb-4 flex items-center">
                    <input class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500" id="available"
                        name="available" type="checkbox">
                    <label class="ml-2 block text-sm text-gray-700" for="available">
                        Disponible
                    </label>
                </div>

                <button type="submit"
                    class="w-full py-2 px-4 bg-black text-white font-bold rounded hover:bg-indigo-700 focus:outline-none focus:shadow-outline">
                    Ajouter un livre
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
