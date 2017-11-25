@extends('layouts.app')
@section('content')
  <div class="container">
    <div id="card-errors" role="alert" class="alert alert-danger"></div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action=" {{ url('/charges') }} " method="post" id="payment-form">
      {{ csrf_field() }}
      <div class="form-row">
        <div class="form-group">
          <label for="nombre" class="col-sm-3 control-label">Nombre completo</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="nombre" name="nombre">
          </div>
        </div>
        <div class="form-group">
          <label for="direccion" class="col-sm-3 control-label">Dirección</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="direccion" name="direccion">
          </div>
        </div>
        <div class="form-group">
          <label for="monto" class="col-sm-3 control-label">Monto</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" id="monto" name="monto">
          </div>
        </div>
        <div class="form-group">
          <label for="descripcion" class="col-sm-3 control-label">Detallar un poco mas..</label>
          <div class="col-sm-9">
            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
          </div>
        </div>
        <label for="card-element">
          Tarjeta de crédito o débito
        </label>
        <div id="card-element">
          {{-- Elemento de la tarjeta. --}}
        </div>
      </div>
      <br />
      <button>Ejecutar pago</button>
  </form>
  </div>

  @section('scripts')
    @parent
    <script>
      const stripe = Stripe("{!! env('APP_STRIPE_PUBLISABLE_KEY','') !!}");
      const elements = stripe.elements();
      const tarjeta = elements.create('card');
      tarjeta.mount('#card-element');
      tarjeta.addEventListener('change', ({error}) => {
        const displayError = document.getElementById('card-errors');
        if (error) {
          displayError.textContent = error.message;
        } else {
          displayError.textContent = '';
        }
      });

      /*Manejo de formulario*/
      const form = document.getElementById('payment-form');
      form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const {token, error} = await stripe.createToken(tarjeta);

        if (error) {
          // Inform the customer that there was an error
          const errorElement = document.getElementById('card-errors');
          errorElement.textContent = error.message;
        } else {
          // Send the token to your server
          stripeTokenHandler(token);
        }
      });

      const stripeTokenHandler = (token) => {
        // Insert the token ID into the form so it gets submitted to the server
        const form = document.getElementById('payment-form');
        const hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
        //console.log(token.id);
      }
      </script>

  @endsection

@endsection
