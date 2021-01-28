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
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td><a href="#">Usuń Użytkownika</a></td>
            </tr>
            @endforeach
            </tbody>
            </table>     

        </div>


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
<!-- List of event -->
    <div class="container thumbs">    
        <table class="table">
        <thead>
        <tr>
        <th scope="col">ID sprzedaży</th>
        <th scope="col">Event</th>
        <th scope="col">ID użytkownika</th>
        <th scope="col">Nazwa użytkownika</th>
        <th scope="col">Cena</th>
        <th scope="col">Miejsce</th>
        <th scope="col">Status</th>
        </tr>
        <thead>
        <tbody>
        @foreach ($rents as $rent)
            <tr>
                <td>{{ $rent->id }}</td>
                <td>{{ $rent->event }}</td>
                <td>{{ $rent->user_id }}</td>
                <td>{{ $rent->user_name }}</td>
                <td>{{ $rent->price }}</td>
                <td>{{ $rent->place_num }}</td>
                <td>
                @if ($rent->status == 0 )
                 <span>W realizacji</span>
                 <form action="admin" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $rent->id }}">
                    <input type="hidden" name="status" value="1">
                 <button type="submit" class="tn btn-primary"  data-target="#myModal">Zakończ</button>
                    </form>
                @else
                    <p>Zakończone</p>
                
                @endif
                 </td>
            </tr>
            @endforeach
        </tbody>
        </table>     

    </div>
<hr>


    
    
    

</div>



@endsection
