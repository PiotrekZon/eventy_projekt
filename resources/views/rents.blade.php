@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
    <div class="col">

   @foreach ($events as $event)
    @if ($event->id ==  request()->route('id') )  
 

        <h1 class="">{{$event->title}}</h1>
        <span><strong>Artysta:</strong> {{$event->artist}}</span><br />
            <span><strong>Kategoria:</strong> {{$event->category}}</span><br />
            <span><strong>Data:</strong> {{$event->date}}</span><br />
            <span><strong>Miejsce:</strong> {{$event->place}}</span><br /><br />
            <h5><strong>Cena:</strong> {{$event->price}} PLN</h5> <br />
            <h5><strong>Opis wydarzenia:</strong> </h5> 
            <p>{{$event->description}}</p>
     
      @endif
      @endforeach
   
    <h2>Wybierz miejsce</h2>

     @foreach ($events as $event)
        @if ($event->id ==  request()->route('id') and $var = $event->ticket_num ) 
        @endif
     @endforeach

     @for ($i = $var; $i > 0; $i--) 
      <?php $j = 0; ?> 
       @foreach ($rents as $rent)
                    @if ($rent->event_id ==  request()->route('id') and $i == $rent->place_num and $rent->status == 1)
                       <div class="jedno-miejsce zajete">
                        <p>Zajęte miejsce</p>
                        {{$i}}. <span style="font-size:15px;">&#x2612;</span>
                        </div> 
                           <?php $j = 1; ?>     
                    @endif
        @endforeach
        @if ($j== 0)
        <div class="jedno-miejsce wolne">
            <p>Wolne miejsce</p>
            {{ $i }}. <input type="checkbox" name="dates[]" class="rent-dates" value="{{ $i }}"/> 
        </div> 
        @endif
        
     @endfor
    
        
    <form action="submit" method="POST">
       @csrf
       
        @foreach ($events as $event)
    @if ($event->id ==  request()->route('id') )
        <input type="hidden" name="event_id" value="{{$event->id}}">
        <input type="hidden" name="price" value="{{$event->price}}">
        <input type="hidden" name="payment_status" value="0">
        <input type="hidden" name="status" value="{{$event-place_num}}">
        <input type="hidden" name="place_num" value="75">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
        <input type="hidden" name="event" value="{{$event->title}}">
      @endif
      @endforeach

        <button type="submit" class="rent-button btn btn-primary btn-lg"  data-target="#myModal">BUtton</button>
    </form>
  
        </div>
    </div>
</div>


@endsection




<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"  action="/payment/add-funds/paypal">
          <div class="modal-header">
        
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
