import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import { UsernavbarComponent } from './navbar/usernavbar/usernavbar/usernavbar.component';
import { GuestnavbarComponent } from './navbar/guestnavbar/guestnavbar/guestnavbar.component';

@NgModule({
  declarations: [
    AppComponent,
    UsernavbarComponent,
    GuestnavbarComponent
  ],
  imports: [
    BrowserModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
