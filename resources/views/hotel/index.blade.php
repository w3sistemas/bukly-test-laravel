@extends('web.main')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h2>Lista de Hotéis</h2>
        <a href="{{ route('hotel.create') }}" class="btn btn-success"><i class="bi bi-plus"></i>Novo Hotel</a>
    </div>
    @if(count($hotels) > 0)
        <table class="table table-striped table-bordered table-responsive">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Cidade</th>
                <th>UF</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->id }}</td>
                    <td>{{ $hotel->name }}</td>
                    <td>{{ $hotel->address }}</td>
                    <td>{{ $hotel->city }}</td>
                    <td>{{ $hotel->state }}</td>
                    <td>
                        <a href="{{ route('hotel.show', $hotel->id) }}" class="btn btn-info btn-sm" title="Ver">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('hotel.edit', $hotel->id) }}" class="btn btn-warning btn-sm" title="Editar">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('hotel.destroy', $hotel->id) }}" method="POST" style="display:inline;">
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
        <p>Não há hotéis disponíveis.</p>
    @endif
@endsection
