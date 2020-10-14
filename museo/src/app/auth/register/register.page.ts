import { Component} from '@angular/core';
import {FormGroup, FormControl, Validators} from '@angular/forms';
import { AuthService } from '../auth.service';
import { AlertController, ToastController, LoadingController } from '@ionic/angular';

@Component({
  selector: 'app-register',
  templateUrl: './register.page.html',
  styleUrls: ['./register.page.scss'],
})
export class RegisterPage {

  constructor(
    private authService: AuthService,
    private alertCtrl: AlertController,
    private toastCtrl: ToastController,
    private loadingCtrl: LoadingController
  ) { }

  form= new FormGroup({
    nombre   :   new FormControl('',[Validators.required, Validators.minLength(3)]),
    correo   :   new FormControl('',[Validators.required, Validators.minLength(5)]),
    pass     :   new FormControl('',[Validators.required, Validators.minLength(5)])

  });
  async onSubmit() {
      const loading = await this.loadingCtrl.create({ message: 'Registrando...' });
      await loading.present();
      this.authService.register(this.form.value).subscribe(
        // si pasa
        async () => {
          const toast = await this.toastCtrl.create({ message: 'Usuario Creado', duration: 2000, color: 'dark' });
          await toast.present();
          loading.dismiss();
          this.form.reset();
        },
        //error
        async () => {
          const alert = await this.alertCtrl.create({ message: 'Hubo un  error', buttons: ['OK'] });
          loading.dismiss();
          await alert.present();
        }
      );
   }
}
