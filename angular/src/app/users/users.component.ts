import { Component, OnInit } from '@angular/core';
import { UsersService } from '../services/users.service';
import { ToastrService } from 'ngx-toastr';

@Component({
  selector: 'app-users',
  templateUrl: './users.component.html',
  styleUrls: ['./users.component.scss']
})
export class UsersComponent implements OnInit {
  users:any = [];
  user:any = null;
  newUser:any = null;

  constructor(
      private usersService:UsersService,
      private toastr: ToastrService
  ) { }

  ngOnInit() {
    this.getUsers();
  }

  getUsers() {
    this.users = [];
    this.usersService.list().subscribe(res=> {
      this.users = res;
    },e=> {console.log(e)})
  }
  getUser(id) {
    this.user = [];
    this.usersService.show(id).subscribe(res=> {
      this.user = res;
    },e=> {console.log(e)})
  }
  createUser() {
    this.usersService.store(this.newUser).subscribe(res=> {
      this.user = res;
      this.newUser = null;
      this.toastr.success('','User created!');
    },e=> {
      let errorsMsj = '';
      Object.entries(e.error.errors).forEach(function(error){
        errorsMsj += '<br>'+error[1];
      });
      this.toastr.error(errorsMsj,e.error.message, {
        enableHtml: true
      });
    })
  }
  deleteUser(id) {
    this.usersService.destroy(id).subscribe(res=> {
      this.user = null;
      this.getUsers();
      this.toastr.success('','User deleted!');
    },e=> {console.log(e)})
  }

}
