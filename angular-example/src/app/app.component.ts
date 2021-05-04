import { Component } from '@angular/core';
import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';


@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})


export class AppComponent {
  title = 'angular-example1';
  
  constructor(private http: HttpClient) { }

  
}
