import { Component, OnInit } from '@angular/core';
import { HotelsService } from '../services/hotels.service';
import { ToastrService } from 'ngx-toastr';

@Component({
  selector: 'app-hotel',
  templateUrl: './hotel.component.html',
  styleUrls: ['./hotel.component.scss']
})
export class HotelComponent implements OnInit {

  hotels:any = [];
  hotel:any = null;
  newHotel:any = null;

  constructor(
      private hotelsService:HotelsService,
      private toastr: ToastrService
  ) { }

  ngOnInit() {
    this.getHotels();
  }

  getHotels() {
    this.hotels = [];
    this.hotelsService.list().subscribe(res=> {
      this.hotels = res;
    },e=> {console.log(e)})
  }
  getHotel(id) {
    this.hotel = [];
    this.hotelsService.show(id).subscribe(res=> {
      this.hotel = res;
    },e=> {console.log(e)})
  }
  createHotel() {
    this.hotelsService.store(this.newHotel).subscribe(res=> {
      this.hotel = res;
      this.newHotel = null;
      this.toastr.success('','Hotel created!');
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
  deleteHotel(id) {
    this.hotelsService.destroy(id).subscribe(res=> {
      this.hotel = null;
      this.getHotels();
      this.toastr.success('','Hotel deleted!');
    },e=> {console.log(e)})
  }

}
