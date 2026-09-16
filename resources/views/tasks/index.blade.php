<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Minha Lista de Tarefas</title>
    <style>
        body { font-family: sans-serif; max-width: 500px; margin: 40px auto; }
        li { margin-bottom: 8px; }
        .done { text-decoration: line-through; color: gray; }
    </style>
</head>
<body>
    <h1>📝 Minha Lista de Tarefas</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Nova tarefa..." required>
        <button type="submit">Adicionar</button>
    </form>

    <ul>
        @foreach ($tasks as $task)
            <li>
                <span class="{{ $task->done ? 'done' : '' }}">
                    {{ $task->title }}
                </span>

                <form action="{{ route('tasks.toggle', $task) }}" method="POST" style="display:inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit">{{ $task->done ? 'Desfazer' : 'Concluir' }}</button>
                </form>

                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">🗑️</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>