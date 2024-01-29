@extends('web.main')

@section('content')
    <h2>Editar Hotel</h2>
    <form action="{{ route('hotel.update', $hotel->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-6">
                <label for="name" class="form-label">Nome do Hotel:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $hotel->name ?? '' }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="col-6 mb-3"> <!-- Adicionado a classe mb-3 aqui -->
                <label for="website" class="form-label">Website:</label>
                <input type="text" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website') ?? $hotel->website ?? '' }}">
                @error('website')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-2">
                <label for="zip_code" class="form-label">CEP:</label>
                <input type="text" class="form-control @error('zip_code') is-invalid @enderror" id="zip_code" name="zip_code" value="{{ old('zip_code') ?? $hotel->zip_code ?? '' }}">
                @error('zip_code')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="col-4">
                <label for="address" class="form-label">Endereço:</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') ?? $hotel->address ?? '' }}">
                @error('address')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="col-3">
                <label for="city" class="form-label">Cidade:</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city') ?? $hotel->city ?? '' }}">
                @error('city')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="col-3">
                <label for="state" class="form-label">Estado:</label>
                <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" name="state" value="{{ old('state') ?? $hotel->state ?? '' }}">
                @error('state')
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
