<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-4">Mes emprunts de livres</h1>

        <!-- Si l'utilisateur n'a aucun emprunt, affichez un message -->
        @if ($borrows->isEmpty())
            <p class="text-gray-600">Vous n'avez actuellement aucun livre emprunté.</p>
        @else
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Titre du livre</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Auteur</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Date d'emprunt</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Date de retour</th>
                        {{-- <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Statut</th> --}}
                        <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($borrows as $borrow)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $borrow->book->title }}</td>
                            <td class="px-4 py-2">{{ $borrow->book->author }}</td>
                            <td class="px-4 py-2">{{ $borrow->borrow_date->format('d/m/Y H:i') }}</td>
                            <td class="px-4 py-2">
                                @if ($borrow->return_date)
                                    {{ $borrow->return_date->format('d/m/Y H:i') }}
                                @else
                                    <span class="text-yellow-500">Non retourné</span>
                                @endif
                            </td>

                            <td class="px-4 py-2 text-center">
                                <p>URL de la route : {{ route('borrow.return', $borrow) }}</p>

                                <form action="{{ route('borrow.return', $borrow) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit">Rendre</button>
                                </form>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
