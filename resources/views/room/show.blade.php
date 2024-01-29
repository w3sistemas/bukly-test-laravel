@extends('web.main')

@section('content')

    <h2>Detalhes do Quarto</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $room->name }}</h5>
            <p class="card-text"><strong>Descrição:</strong> {{ $room->description }}</p>
            <p class="card-text"><strong>Hotel:</strong> {{ $room->hotel->name }}</p>

            <div class="mt-3">
                <a href="{{ route('room.edit', $room->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Editar
                </a>
                <form action="{{ route('room.destroy', $room->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">
                        <i class="bi bi-trash"></i> Excluir
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
