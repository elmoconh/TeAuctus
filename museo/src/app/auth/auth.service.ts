import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';
import {User} from './user.model';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  url = 'http://localhost/t/api';
  constructor(private http: HttpClient) { }

  register(user: User){
    console.log("paso register");
    return this.http.post(`${this.url}/register.php `, user);
  }

    loginUsuario(login) {
    console.log(login);
    return this.http.post(`${this.url}/login.php`, JSON.stringify(login));
    
  }
}
