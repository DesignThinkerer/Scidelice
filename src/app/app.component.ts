import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { IonicModule } from '@ionic/angular';
@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.scss'],
  standalone: true,
  imports: [IonicModule, RouterLink, RouterLinkActive, CommonModule],
})
export class AppComponent {
  public appPages = [
    { title: 'Home', url: 'home', icon: 'home' },
    { title: 'Recipes', url: 'recipes', icon: 'journal' },
    // { title: 'Profile', url: '/profile', icon: 'person' },
    // { title: 'How', url: '/how', icon: 'flask' },
    // { title: 'Why', url: '/why', icon: 'school' },
    { title: 'Pantry', url: '/pantry', icon: 'snow' },
    // { title: 'Planner', url: '/planner', icon: 'calendar' },
    { title: 'Settings', url: '/settings', icon: 'settings' },
    // { title: 'Success', url: '/success', icon: 'medal' },
    // { title: 'Tools', url: '/tools', icon: 'calculator' },
    // { title: 'Login', url: 'login', icon: 'log-in' },
  ];
  constructor() {}
}
