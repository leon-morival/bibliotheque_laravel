<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Gestion des utilisateurs</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-center">Nom</th>
                    <th class="py-2 px-4 border-b text-center">Email</th>
                    <th class="py-2 px-4 border-b text-center">Rôle</th>
                    <th class="py-2 px-4 border-b text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="py-2 px-4 border-b text-center">{{ $user->name }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $user->email }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $user->role }}</td>
                        <td class="py-2 px-4 border-b text-center">
                            <form action="{{ route('users.updateRole', $user) }}" method="POST"
                                class="inline-flex items-center space-x-2">
                                @csrf
                                @method('PATCH')
                                <select name="role" class="border rounded py-1 px-8">
                                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Utilisateur
                                    </option>
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>
                                        Administrateur</option>
                                </select>
                                <button type="submit"
                                    class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600">Modifier</button>
                            </form>

                            <form action="{{ route('users.destroy', $user) }}" method="POST"
                                class="inline-flex items-center ml-2"
                                onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
