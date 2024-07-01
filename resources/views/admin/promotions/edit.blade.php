@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Promoción</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.promotions.update', $promotion) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="code">Código</label>
                                <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $promotion->code) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="discount_amount">Monto de Descuento</label>
                                <input type="number" step="0.01" class="form-control" id="discount_amount" name="discount_amount" value="{{ old('discount_amount', $promotion->discount_amount) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="valid_from">Válido Desde</label>
                                <input type="date" class="form-control" id="valid_from" name="valid_from" value="{{ old('valid_from', $promotion->valid_from) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="valid_until">Válido Hasta</label>
                                <input type="date" class="form-control" id="valid_until" name="valid_until" value="{{ old('valid_until', $promotion->valid_until) }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
