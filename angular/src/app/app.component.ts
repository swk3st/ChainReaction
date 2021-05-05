import { Component } from '@angular/core';
import { Ticket } from './ticket';

import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {

  // dependency injection
  constructor(private http: HttpClient) {  }

  title = 'Contact Us';

  cats = ['Complaints', 'Compliments', 'New Chains', 'New Features', 'New To Game', 'Other'];

  confirm_msg = '';
  data_submitted = '';

  /* create an instance of an Order, assuming there is an existent order */
  /* we will bind orderModel to the form, allowing an update / delete transaction */
  /* orderModel = new Order('duh', 'duh@uva.edu', 1112223333, 'Tea', 'hot', true); */  /* note on case sensitive, radio button value='hot' */
  ticketModel = new Ticket('', '', '',  '', '', '', null);


  confirmTicket(data: any): void {
     console.log(data);
     this.confirm_msg = 'Thank you, ' + data.fname + ' ' + data.lname;
     this.confirm_msg += '.\n We recieved your message: ' + data.msg;
  }


  responsedata = new Ticket('','','','','','', null);    // to store a response from the backend

  // passing in a form variable of type any, no return result
  onSubmit(form: any): void {
     console.log('You submitted value: ', form);
     this.data_submitted = form;

     // console.log(this.data_submitted, this.data_submitted.name.length);
     console.log('form submitted ', form);

     /*------*/
     // Prepare to send a request to the backend PHP
     // 1. Convert the form data to JSON format
     let params = JSON.stringify(form);

     // 2. Send an HTTP request to a backend
     // To send a GET request, use the concept of URL rewriting to pass data to the backend

     // The http.get returns an observable<Order>, then we subscribe to this observable.
     // this.http.get<Order>('http://localhost/cs4640/ng-php/ng-get.php?str='+params)

     // The observable takes the data being emitted (i.e., subscribe)
     // and then use the data in some way.

     // To send a POST request, pass data as an object.
     // The HttpClient.post method returns an observable<Order>,
     // then we subscribe to this observable

     // this.http.get<Order>('http://localhost/cs4640/ng-php/ng-get.php?str='+params)
     this.http.post<Ticket>('http://localhost/src/php/ng-post.php', params)
     .subscribe((response_from_php) => {
        // Receive a response successfully, do something here

        // Suppose we just want to assign a response from a PHP backend
        // to a responsedata property of this controller,
        // so that we can use it (or bind it) to display on screen

        this.responsedata = response_from_php;

        // The subcribe above means that this observable takes response_from_php
        // being emitted and set it to this.responsedata

     }, (error_in_communication) => {
        // An error occurs, handle an error in some way.
        console.log('Error ', error_in_communication);
     })

  }
}

