@extends('layouts.app')

@section('content')
      
<div class="container">  
<h1 style="text-align:center">Witamy w panelu użytkownika</h1>
<br>
<h3 style="text-align:center">Moje eventy</h3>
<!-- List of event -->
@isset($events)
    <div class="container thumbs">    
        <table class="table">
        <thead>
        <tr>
        <th scope="col">Tytuł</th>
        <th scope="col">Nazwa/Artysta</th>
        <th scope="col">Kategoria</th>
        <th scope="col">Data</th>
        <th scope="col">Miejsce</th>
        <th scope="col">Cena</th>
      
        </tr>
        <thead>
        <tbody>
        <tr>
        @foreach ($events as $event)
        <td>{{$event->title}}</td>
        <td>{{$event->artist}}</td>
        <td>{{$event->category}}</td>
        <td>{{$event->date}}</td>
        <td>{{$event->place}}</td>
        <td>{{$event->price}}</td>
       
        </tr>
        @endforeach
        </tbody>
        </table>     

    </div>
@endisset<!-- End List of event -->

</div>
@endsection
