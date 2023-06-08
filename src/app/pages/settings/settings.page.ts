import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { IonicModule } from '@ionic/angular';
import { Router } from '@angular/router';
import { PageHeaderComponent } from 'src/app/components/page.header/page.header.component';

@Component({
  selector: 'app-login',
  templateUrl: './settings.page.html',
  styleUrls: ['./settings.page.scss'],
  standalone: true,
  imports: [IonicModule, CommonModule, FormsModule, PageHeaderComponent]
})
export class SettingsPage implements OnInit {

  constructor(private router: Router) { }

  ngOnInit() {
  }

  // login() {
  //   this.router.navigate(['home']);
  // }

  // register() {
  //   this.router.navigate(['home']);
  // }

  save(){
    this.router.navigate(['home']);
  }

}
