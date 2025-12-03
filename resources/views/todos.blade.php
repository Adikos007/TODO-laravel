<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>TODO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="text-center mb-4">TODO</h1>

    {{-- Přidání úkolu --}}
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('todos.add') }}" method="POST" class="d-flex gap-2">
                @csrf
                <input type="text" name="title" class="form-control" placeholder="Nový úkol">
                <button class="btn btn-success">Přidat</button>
            </form>
        </div>
    </div>

    {{-- Seznam úkolů --}}
    <div class="card">
        <div class="card-header">
            <strong>Seznam úkolů</strong>
        </div>
        <ul class="list-group list-group-flush">

            @forelse($todos as $id => $todo)
                <li class="list-group-item">
                    <form action="{{ route('todos.edit', $id) }}" method="POST" class="d-flex gap-2">
                        @csrf
                        <input type="text"
                               name="title"
                               value="{{ $todo['title'] }}"
                               class="form-control">
                        <button class="btn btn-primary btn-sm">Upravit</button>
                        <a href="{{ route('todos.delete', $id) }}"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Smazat?');">Smazat</a>
                    </form>
                </li>
            @empty
                <li class="list-group-item text-muted">Žádné úkoly...</li>
            @endforelse

        </ul>
    </div>
</div>

</body>
</html>
