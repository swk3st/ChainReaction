import { Component, OnInit } from '@angular/core';
import { User } from '../user'; 

@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.css']
  
})

export class UserComponent implements OnInit { 
  user: User;
  
  constructor() {
    this.user = new User(
      "$displayname",
      "$email",
      0,
      0,
      0,
      0,

      http constructor

      get call 
      
       );      
  }


  ngOnInit(): void {
  }

}

