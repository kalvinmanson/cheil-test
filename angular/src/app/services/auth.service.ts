import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

const httpOptions = {
  headers: new HttpHeaders({
    'Content-Type':  'application/json',
  })
};

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  apiUrl = 'https://insoftar.droni.dev/api/';

  constructor(private http: HttpClient) { }

  login(user) {
    return this.http.post(this.apiUrl +'auth/login', user, httpOptions);
  }
  register(user) {
    return this.http.post(this.apiUrl +'auth/register', user, httpOptions);
  }
}
