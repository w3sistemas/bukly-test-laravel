@extends('web.main')

@section('content')
    <h2>Detalhes do Hotel</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $hotel->name }}</h5>
            <p class="card-text"><strong>Endereço:</strong> {{ $hotel->address }}</p>
            <p class="card-text"><strong>Cidade:</strong> {{ $hotel->city }}</p>
            <p class="card-text"><strong>Estado:</strong> {{ $hotel->state }}</p>
            <p class="card-text"><strong>CEP:</strong> {{ $hotel->zip_code }}</p>
            <p class="card-text"><strong>Website:</strong> {{ $hotel->website }}</p>

            <div class="mt-3">
                <a href="{{ route('hotel.edit', $hotel->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Editar
                </a>
                <form action="{{ route('hotel.destroy', $hotel->id) }}" method="POST" style="display:inline;">
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
