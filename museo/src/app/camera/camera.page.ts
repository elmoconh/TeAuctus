import { Component, OnInit } from '@angular/core';
import {DomSanitizer, SafeResourceUrl} from "@angular/platform-browser";

@Component({
  selector: 'app-camera',
  templateUrl: './camera.page.html',
  styleUrls: ['./camera.page.scss'],
})
export class CameraPage implements OnInit {
 vidUrl: SafeResourceUrl;
  constructor(private domSanitazer: DomSanitizer) { }

  ngOnInit() {
    this.vidUrl= 
    this.domSanitazer.bypassSecurityTrustResourceUrl("http://localhost/s/");
  }

}
