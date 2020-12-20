@extends('layouts.app')

@section('content')
      
<div class="container">  
<h1 style="text-align:center">Panelu użytkownika</h1>
<hr>
<h3 style="text-align:center">Moje dane</h3>
<!-- List of event -->
   
    <div class="container thumbs">    
        <table class="table">
        <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Nazwa</th>
        <th scope="col">Email</th>
        <th scope="col">Data rejestracji</th>
        <th scope="col">Wyloguj się</th>
        </tr>
        <thead>
        <tbody>
        <tr>
        <td>{{ Auth::user()->id }}</td>
        <td>{{ Auth::user()->name }}</td>
        <td>{{ Auth::user()->email }}</td>
        <td>{{ Auth::user()->created_at }}</td>
        <td><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Wyloguj
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"></td>
        </tr>
        </tbody>
        </table>     
    </div>
<hr>

<h3 style="text-align:center">Moje bilety</h3>
<div class="container thumbs">    
        <table class="table">
        <thead>
        <tr>
        <th scope="col">ID sprzedaży</th>
        <th scope="col">Event</th>
        <th scope="col">Cena</th>
        <th scope="col">Miejsce</th>
        <th scope="col">Status</th>
        <th scope="col">Pobierz bilet</th>
        </tr>
        <thead>
        <tbody>
        @foreach ($rents as $rent)
        @if ($rent->user_id ==  Auth::user()->id ) 
        <tr>
        <td>{{$rent->id}}</td>
        <td>{{$rent->event}}</td>
        <td>{{$rent->price}} zł</td>
        <td>{{$rent->place_num}}</td>
        
            @if ($rent->status == 1 ) 
            <td>Kupione</td>
            <td><a href="#">Pobierz PDF</a></td>
            @else
            <td>W trakcie realizacji</td>
            <td>-</td>
            @endif
        </tr>
        @endif
        @endforeach
        </tbody>
        </table>     

    </div>

<hr>
</div>
@endsection
