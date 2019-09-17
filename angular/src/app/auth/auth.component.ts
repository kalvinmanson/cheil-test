import { Component, OnInit } from '@angular/core';
import { AuthService } from '../services/auth.service';
import { ToastrService } from 'ngx-toastr';
import { Router } from "@angular/router"

@Component({
  selector: 'app-auth',
  templateUrl: './auth.component.html',
  styleUrls: ['./auth.component.scss']
})
export class AuthComponent implements OnInit {

  userLogin:any = {};
  userRegister:any = {};
  userLogged:any = null;


  constructor(
    private authService:AuthService,
    private toastr: ToastrService,
    private router: Router
  ) { }

  ngOnInit() {
    this.checkLogged()
  }
  checkLogged() {
    this.userLogged = JSON.parse(localStorage.getItem('user'));
    if(this.userLogged) {
      this.router.navigate(['/'])
    }
  }
  login() {
    this.authService.login(this.userLogin).subscribe(res=> {
      localStorage.setItem('user', JSON.stringify(res));
      this.router.navigate(['/'])
    },e=>{
      let errorsMsj = '';
      Object.entries(e.error.errors).forEach(function(error){
        errorsMsj += '<br>'+error[1];
      });
      this.toastr.error(errorsMsj,e.error.message, {
        enableHtml: true
      });
    })
  }
  register() {
    this.authService.register(this.userRegister).subscribe(res=> {
      localStorage.setItem('user', JSON.stringify(res));
      this.router.navigate(['/'])
    },e=>{
      let errorsMsj = '';
      Object.entries(e.error.errors).forEach(function(error){
        errorsMsj += '<br>'+error[1];
      });
      this.toastr.error(errorsMsj,e.error.message, {
        enableHtml: true
      });
    })
  }

}
