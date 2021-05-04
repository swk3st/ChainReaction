import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { HttpClientModule } from '@angular/common/http'; 

import { FormsModule } from '@angular/forms';

import { AppComponent } from './app.component';
import { ChainComponent } from './chain/chain.component';

@NgModule({
  declarations: [
    AppComponent,
    ChainComponent,
  ],
  imports: [
    BrowserModule, 
    FormsModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
