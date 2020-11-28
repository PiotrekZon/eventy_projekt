@extends('layouts.app')

@section('content')

@isset($dates)
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
           <h2>Wybierz miejsce</h2>
            <table class="event-list display table-hover table"> 
             <thead>
              <tr>
               <th></th>
               <th></th>
               <th></th>
              </tr>
             </thead>
            @foreach ($dates as $k => $v)
            <tr>
                @if (is_array($v))
                <td>               
                    {{$v[0]}}  Zarezerwowane 
                </td>
                @else
                <td>               
                    {{$v}}, <input type="checkbox" name="dates[]" class="rent-dates" value="{{$v}} "/> Zarezerwuj!
                </td>
                
                @endif

            </tr>
 
            @endforeach
            </table>
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
        <form method="POST" action="{{ route('rents.create') }}">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
          </div>

          <div class="modal-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="event_id" value="{{ $event_id }}">
                <input type="hidden" name="dates_input" class="dates_input">
               Wybrane dni:
                <div class="rent-list"></div>
                <br/>Dane najmującego:<br/>
            <textarea name="renter" class="renter modal-body__renterTextArea"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
            <button type="submit"  class="btn btn-primary">Zarezerwuj</button>
          </div>
        </form>
    </div>
  </div>
</div>