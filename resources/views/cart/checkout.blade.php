@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="container">
    <h1 class="my-4">Checkout</h1>

    <!-- Mensajes de éxito o error -->
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <!-- Resumen de productos -->
        <div class="col-md-6">
            <h4>Resumen de Productos</h4>
            @if(empty($cart))
                <div class="alert alert-info">
                    <p>El carrito está vacío.</p>
                </div>
            @else
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $id => $details)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                    {{ $details['name'] }}
                                </td>
                                <td>{{ $details['quantity'] }}</td>
                                <td>${{ $details['price'] }}</td>
                                <td>${{ $details['price'] * $details['quantity'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="table-dark">
                        <tr>
                            <td colspan="3" class="text-end"><strong>Total</strong></td>
                            <td><strong>${{ collect($cart)->sum(function($item) { return $item['price'] * $item['quantity']; }) }}</strong></td>
                        </tr>
                    </tfoot>
                </table>
            @endif
        </div>

        <!-- Formulario de pago -->
        <div class="col-md-6">
            <h4>Detalles de Pago</h4>
            <form id="payment-form" action="{{ route('payment.process') }}" method="POST">
                @csrf

                <!-- Información del Cliente -->
                <div class="mb-4">
                    <h5>Información del Cliente</h5>
                    <div class="form-group mb-3">
                        <label for="name">Nombre Completo</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="address">Dirección</label>
                        <input type="text" id="address" name="address" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="city">Ciudad</label>
                        <input type="text" id="city" name="city" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="zip">Código Postal</label>
                        <input type="text" id="zip" name="zip" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="country">País</label>
                        <input type="text" id="country" name="country" class="form-control" required>
                    </div>
                </div>

                <!-- Información de la tarjeta -->
                <div class="form-group mb-4">
                    <label for="card-element">Tarjeta de Crédito o Débito</label>
                    <div id="card-element" class="form-control">
                        <!-- Un Stripe Element será insertado aquí. -->
                    </div>
                    <!-- Usado para mostrar errores de formulario. -->
                    <div id="card-errors" role="alert"></div>
                </div>

                <!-- Botón para enviar el formulario -->
                <button type="submit" class="btn btn-primary">Pagar</button>
            </form>
        </div>
    </div>
</div>

<!-- Incluye el script de Stripe -->
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Crea una instancia de Stripe con tu clave pública
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();

    // Define el estilo del campo de tarjeta
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Crea un elemento de tarjeta y lo monta en el contenedor
    var card = elements.create('card', {style: style});
    card.mount('#card-element');

    // Maneja los cambios en el campo de tarjeta
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Maneja el envío del formulario
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                stripeTokenHandler(result.token);
            }
        });
    });

    // Envía el token de Stripe al servidor
    function stripeTokenHandler(token) {
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        form.submit();
    }
</script>
@endsection

@push('styles')
<style>
    /* Estilos para el contenedor del campo de tarjeta */
    #card-element {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    /* Estilos para los errores de formulario */
    #card-errors {
        color: #fa755a;
        margin-top: 10px;
    }
</style>
@endpush
