export class Ticket {
   constructor(
      public fname: string,
      public lname: string,
      public email: string,
      public cat: string,
      public prioPreference: string,
      public msg: string,
      public sendText: boolean | null,
   ){}
}
