@extends('web.main')

@section('content')
    <h2>Cadastrar Novo Quarto</h2>
    <form action="{{ route('room.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="row">
            <div class="col-12">
                <label for="name" class="form-label">Nome do Quarto:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? '' }}">
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
                <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') ?? '' }}" rows="6"></textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <select name="hotel_id" id="hotel_id" class="form-control @error('description') is-invalid @enderror">
                    <option value="">-- Selecione um Hotel --</option>
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->id }}" {{ old('hotel_id') == $hotel->id ? 'selected' : '' }}>
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
                <button type="submit" class="btn btn-success">Salvar Cadastro</button>
            </div>
        </div>
    </form>
@endsection
