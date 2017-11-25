@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- <form action="{{ url('/charges') }}" method="post">
                       {{ csrf_field() }}
                       <button type="submit" class="btn btn-default">Ejecutar</button>
                    </form> --}}

                </div>
                <form action=" {{ url('/charges') }} " method="post" id="payment-form">
                  {{ csrf_field() }}
                  <div class="form-row">
                    <label for="card-element">
                      Tarjeta de crédito o débito
                    </label>
                    <div id="card-element">
                      <!-- a Stripe Element will be inserted here. -->
                    </div>

                    <!-- Used to display Element errors -->
                    <div id="card-errors" role="alert"></div>
                  </div>

                  <button>Ejecutar pago</button>
              </form>

                {{-- <form accept-charset="UTF-8" action="{{ url('/charges') }}" class="require-validation" data-cc-on-file="false" id="payment-form" method="post">
                  {{ csrf_field() }}
                  <div class='form-row'>
                    <div class='col-xs-12 form-group required'>
                      <label class='control-label'>Name on Card</label>
                      <input class='form-control' size='4' type='text'>
                    </div>
                  </div>
                  <div class='form-row'>
                    <div class='col-xs-12 form-group card required'>
                      <label class='control-label'>Card Number</label>
                      <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                    </div>
                  </div>
                  <div class='form-row'>
                    <div class='col-xs-4 form-group cvc required'>
                      <label class='control-label'>CVC</label>
                      <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                    </div>
                    <div class='col-xs-4 form-group expiration required'>
                      <label class='control-label'>Expiration</label>
                      <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                    </div>
                    <div class='col-xs-4 form-group expiration required'>
                      <label class='control-label'> </label>
                      <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                    </div>
                  </div>
                  <div class='form-row'>
                    <div class='col-md-12'>
                      <div class='form-control total btn btn-info'>
                        Total:
                        <span class='amount'>$300</span>
                      </div>
                    </div>
                  </div>
                  <div class='form-row'>
                    <div class='col-md-12 form-group'>
                      <button class='form-control btn btn-primary submit-button' type='submit'>Pay »</button>
                    </div>
                  </div>
                  <div class='form-row'>
                    <div class='col-md-12 error form-group hide'>
                      <div class='alert-danger alert'>
                        Please correct the errors and try again.
                      </div>
                    </div>
                  </div>
                </form> --}}


            </div>
        </div>
    </div>
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
