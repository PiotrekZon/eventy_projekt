import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavbarComponent } from './navbar/navbar.component';
import { UsersComponent } from './users/users.component';
import { UserListComponent } from './users/user-list/user-list.component';
import { UserDetailComponent } from './users/user-detail/user-detail.component';
import { UserFormComponent } from './users/user-form/user-form.component';
import { EventsComponent } from './events/events.component';
import { EventListComponent } from './events/event-list/event-list.component';
import { EventDetailComponent } from './events/event-detail/event-detail.component';
import { EventFormComponent } from './events/event-form/event-form.component';
import { ArtistsComponent } from './artists/artists.component';
import { ArtistListComponent } from './artists/artist-list/artist-list.component';
import { ArtistDetailComponent } from './artists/artist-detail/artist-detail.component';
import { ArtistFormComponent } from './artists/artist-form/artist-form.component';
import { ReservationsComponent } from './reservations/reservations.component';
import { ReservationsListComponent } from './reservations/reservations-list/reservations-list.component';
import { ReservationsDetailComponent } from './reservations/reservations-detail/reservations-detail.component';
import { ReservationsFormComponent } from './reservations/reservations-form/reservations-form.component';

@NgModule({
  declarations: [
    AppComponent,
    NavbarComponent,
    UsersComponent,
    UserListComponent,
    UserDetailComponent,
    UserFormComponent,
    EventsComponent,
    EventListComponent,
    EventDetailComponent,
    EventFormComponent,
    ArtistsComponent,
    ArtistListComponent,
    ArtistDetailComponent,
    ArtistFormComponent,
    ReservationsComponent,
    ReservationsListComponent,
    ReservationsDetailComponent,
    ReservationsFormComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
