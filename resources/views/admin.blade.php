@extends('layouts.app')

@section('content')

<div class="container">  
<h2 style="text-align:center">Witamy w panelu administratora</h2>
<hr>
<h4>Wszyscy użytkownicy</h4>
        <div class="container thumbs">    
            <table class="table">
            <thead>
            <tr>
                <th scope="col">ID użytkownika</th>
                <th scope="col">Nazwa użytkownika</th>
                <th scope="col">Email</th>
                <th scope="col">Data rejestracji</th>
                <th scope="col">Usuń użytkownika</th>
            </tr>
            <thead>
            <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><a href="#">Usuń Użytkownika</a></td>
            </tr>
            </tbody>
            </table>     

        </div>


<hr>
<h4>Wszystkie eventy</h4>
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
        <th scope="col">Liczba miejsc</th>
        <th scope="col">Cena</th>
        <th scope="col">Usuń event</th>
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
        <td>{{$event->ticket_num}}</td>
        <td>{{$event->price}}</td>
        <td><a href="#">Usuń Event</a></td>
        </tr>
        @endforeach
        </tbody>
        </table>     

    </div>
@endisset<!-- End List of event -->
<hr>
<h4>Dodaj event</h4>

 <div class="container thumbs">
       <form action="" class="form-adminpanel">
        <table class="table">
        <thead>
        <tr>
            <th scope="col">Tytuł</th>
            <th scope="col">Nazwa/Artysta</th>
            <th scope="col">Kategoria</th>
            <th scope="col">Data</th>
            <th scope="col">Miejsce</th>
            <th scope="col">Liczba miejsc</th>
            <th scope="col">Cena</th>
        </tr>
        <thead>
        <tbody>
        <tr>
            <td> <input type="text" name="tytul"></td>
            <td><input type="text" name="artysta"></td>
            <td><select name="kategoria">
                <option value="kino">Kino</option>
                <option value="teatr">Teatr</option>
                <option value="koncerty">Koncerty</option>
              </select></td>
            <td><input type="date" name="dataeventu"></td>
            <td><input type="text" name="miejsce"></td>
            <td><input type="text" name="liczmiejsc"></td>
            <td><input type="text" name="cena"></td>
            <td><input type="submit" value="Dodaj Event"></td>
             
        </tr>
        </tbody>
        </table>     
    </form>
</div>


<hr>
<h4>Sprzedane bilety</h4>




</div>



@endsection
