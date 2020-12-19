@extends('layouts.app')

@section('content')

<center><h2> Wszystkie nadchodzące koncerty </h2></center>

<!-- Thumbnails -->
@isset($events)
    <div class="container thumbs">
      
      @foreach ($events as $event)
    @if ($event->category == 'Koncert') 
 
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <div class="caption">
            <h3 class="">{{$event->title}}</h3>
            <p>{{$event->artist}}</p>
              <span><strong>Kategoria:</strong> {{$event->category}}</span><br />
              <span><strong>Data:</strong> {{$event->date}}</span><br />
              <span><strong>Miejsce:</strong> {{$event->place}}</span><br />
              <span><strong>Pozostało biletów:</strong> {{$event->ticket_num}}</span><br /><br />
              <h5><strong>Cena:</strong> {{$event->price}} PLN</h5>
            
            <div class="btn-toolbar text-center">
              <a href="/rents/{{$event->id}}" role="button" class="btn btn-primary pull-right">Kup bilet</a>
            </div>
          </div>
        </div>
      </div>
     
      @endif
      @endforeach
    </div>
@endisset<!-- End Thumbnails -->

@endsection
