import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class UsersService {

  apiUrl = 'https://insoftar.droni.dev/api/';
  headers:any = null;
  userLogged:any = null;

  constructor(private http: HttpClient) { }

  createHeaders() {
    this.userLogged = JSON.parse(localStorage.getItem('user'));
    this.headers = {
      headers: new HttpHeaders({
        'Content-Type':  'application/json',
        'Authorization':  'Bearer ' + this.userLogged.api_token,
      })
    };
  }

  list() {
    this.createHeaders();
    return this.http.get(this.apiUrl +'users', this.headers);
  }
  show(id) {
    this.createHeaders();
    return this.http.get(this.apiUrl +'users/'+id, this.headers);
  }
  store(user) {
    this.createHeaders();
    return this.http.post(this.apiUrl +'users', user, this.headers);
  }
  destroy(id) {
    this.createHeaders();
    return this.http.delete(this.apiUrl +'users/'+id, this.headers);
  }
}
