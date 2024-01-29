@extends('web.main')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h2>Lista de Quartos</h2>
        <a href="{{ route('room.create') }}" class="btn btn-success"><i class="bi bi-plus"></i>Novo Quarto</a>
    </div>
    @if(count($rooms) > 0)
        <table class="table table-striped table-bordered table-responsive">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Hotel</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->description }}</td>
                    <td>{{ $room->hotel->name }}</td>
                    <td>
                        <a href="{{ route('room.show', $room->id) }}" class="btn btn-info btn-sm" title="Ver">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('room.edit', $room->id) }}" class="btn btn-warning btn-sm" title="Editar">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('room.destroy', $room->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>Não há quartos disponíveis.</p>
    @endif
@endsection
