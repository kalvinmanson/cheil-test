import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AuthComponent } from './auth/auth.component';
import { UsersComponent } from './users/users.component';
import { HotelComponent } from './hotel/hotel.component';

const routes: Routes = [
  { path: 'auth', component: AuthComponent },
  { path: '', component: HotelComponent },
  { path: 'users', component: UsersComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
