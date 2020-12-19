@extends('layouts.app')

@section('content')

@isset($dates)
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
           <h2>Wybierz miejsce</h2>
            
            @foreach ($dates as $k => $v)
                @if (is_array($v))
                    {{$v[0]}}  Zarezerwowane
                @else
                   <div class="jedno-miejsce wolne">
                   <p>Wolne miejsce</p>
                    {{$v}}. <input type="checkbox" name="dates[]" class="rent-dates" value="{{$v}} "/> 
                    </div>
                @endif

            @endforeach
             
             @foreach ($dates as $k => $v)
                @if (is_array($v))
                    {{$v[0]}}  Zarezerwowane
                @else
                   <div class="jedno-miejsce zajete">
                   <p>Zajęte miejsce</p>
                    {{$v+100}}. <input type="checkbox" disabled="disabled" name="dates[]" class="rent-dates" /> 
                    </div>
                @endif

            @endforeach
             
        </div>
    </div>
</div>
@endisset

@endsection


<button class="rent-button btn btn-primary btn-lg" style="display:none" data-toggle="modal" data-target="#myModal">BUtton</button>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"  action="/payment/add-funds/paypal">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="event_id" value="{{ $event_id }}">
                <input type="hidden" name="dates_input" class="dates_input">
                
               <h2>Kup bilety szybką płatnością PayPal</h2>
                Wybrane miejsca: {{ csrf_field() }} 
                    
                <div class="rent-list">
                </div>
                  
                 <div id="paypal-button"></div>
                    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
                    <script>
                      paypal.Button.render({
                        // Configure environment
                        env: 'sandbox',
                        client: {
                          sandbox: 'demo_sandbox_client_id',
                          production: 'demo_production_client_id'
                        },
                        // Customize button (optional)
                        locale: 'en_US',
                        style: {
                          size: 'medium',
                          color: 'gold',
                          shape: 'pill',
                        },

                        // Enable Pay Now checkout flow (optional)
                        commit: true,

                        // Set up a payment
                        payment: function(data, actions) {
                          return actions.payment.create({
                            transactions: [{
                              amount: {
                                total: '0.01',
                                currency: 'USD'
                              }
                            }]
                          });
                        },
                        // Execute the payment
                        onAuthorize: function(data, actions) {
                          return actions.payment.execute().then(function() {
                            // Show a confirmation message to the buyer
                            window.alert('Dziękujemy za dokonanie zakupów');
                          });
                        }
                      }, '#paypal-button');

                    </script>
                  </div>
             </form>
     </div>
  </div>
</div>
