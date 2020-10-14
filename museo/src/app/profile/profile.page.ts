import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';


@Component({
  selector: 'app-profile',
  templateUrl: './profile.page.html',
  styleUrls: ['./profile.page.scss'],
})
export class ProfilePage implements OnInit {
  user : {id: string };

  constructor(    private activatedRoute: ActivatedRoute) { }

  ngOnInit() {
     this.user = {
      id: this.activatedRoute.snapshot.params.id
    };
  }

}
