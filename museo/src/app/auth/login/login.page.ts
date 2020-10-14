import { Component } from '@angular/core';
import { AuthService } from '../auth.service';
import { LoadingController, AlertController } from '@ionic/angular';
import { Router, ActivatedRoute, ParamMap } from '@angular/router';
import { FormGroup, FormControl, Validators } from '@angular/forms';

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage {
  
  login = {
    email: null,
    password: null
  }
  
  
  constructor(private loginService: AuthService, 
  private route: Router,
  private activatedRoute: ActivatedRoute
  ) {}

  

  loginUsuario() {
      this.loginService.loginUsuario(this.login).subscribe (
        datos => {
          if(datos['resultado'] == 'OK') {
            alert(datos['mensaje']);
            this.redirection(datos['usuario'])
          } else {
            alert(datos['mensaje']);
               console.log(datos);
          }
        }
      );
    }

    redirection(param){
      console.log('pasa');
      console.log(param);
      this.route.navigate(['/profile/'+param]);
    }
}