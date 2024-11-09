@section('content')
    <x-app-layout>

        <div class="container">
            <h1>Ajouter un livre</h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Auteur</label>
                    <input type="text" class="form-control" id="author" name="author" required>
                </div>

                <div class="mb-3">
                    <label for="year" class="form-label">Année</label>
                    <input type="number" class="form-control" id="year" name="year" required min="1000"
                        max="9999">
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="available" name="available">
                    <label class="form-check-label" for="available">Disponible</label>
                </div>

                <button type="submit" class="btn btn-primary">Ajouter le livre</button>
            </form>
        </div>
    </x-app-layout>
