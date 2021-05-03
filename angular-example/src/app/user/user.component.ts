import { Component, OnInit } from '@angular/core';
import { User } from '../user'; 


@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.css']
  
})



export class UserComponent implements OnInit {
 
  
  username: string;    // from previous activity
  user: User;
  

  constructor() {
    this.username = 'somename';    // from previous activity
    this.user = new User(
       'Humpty',
       'humpty@uva.edu');

      
  }

  manyusers = [
    { name: 'Mickey', email: 'mickey@uva.edu' },
    { name: 'Minnie', email: 'minnie@uva.edu' },
    { name: 'duh', email: 'duh@uva.edu' },
    { name: 'huh', email: 'huh@uva.edu' }
    
   ];  

   changeDefaultName(str: string) {
    this.user.name = str;
    }
   

  ngOnInit(): void {
  }

}

