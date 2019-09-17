import { Component, OnInit } from '@angular/core';
import { ToastrService } from 'ngx-toastr';
import { Router } from "@angular/router"

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'Insoftar';
  userLogged:any = null;

  constructor(
    private toastr: ToastrService,
    private router: Router
  ) { }
  ngOnInit() {
    this.checkLogged()
  }
  checkLogged() {
    this.userLogged = JSON.parse(localStorage.getItem('user'));
    if(!this.userLogged) {
      this.router.navigate(['/auth'])
    }
  }

  logout() {
    localStorage.setItem('user', null);
    this.userLogged = null;
    this.router.navigate(['/auth'])
  }
}
