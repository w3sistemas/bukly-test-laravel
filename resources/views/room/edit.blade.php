@extends('web.main')

@section('content')

    <h2>Alterar Quarto</h2>
    <form action="{{ route('room.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-12">
                <label for="name" class="form-label">Nome do Quarto:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $room->name ?? '' }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <label for="description" class="form-label">Descrição:</label>
                <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="6">{{ old('description') ?? $room->description ?? '' }}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <select name="hotel_id" id="hotel_id" class="form-control @error('hotel_id') is-invalid @enderror">
                    <option value="">-- Selecione um Hotel --</option>
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->id }}" {{ $room->hotel_id == $hotel->id ? 'selected' : '' }}>
                            {{ $hotel->name }}
                        </option>
                    @endforeach
                </select>
                @error('hotel_id')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            </div>
        </div>
    </form>
@endsection
