import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { IonicModule } from '@ionic/angular';
import { RecipeCardComponent } from 'src/app/components/recipe-card/recipe-card.component';
import { PageHeaderComponent } from 'src/app/components/page-header/page-header.component';

@Component({
  selector: 'app-home',
  templateUrl: './home.page.html',
  styleUrls: ['./home.page.scss'],
  standalone: true,
  imports: [
    IonicModule, 
    CommonModule, 
    FormsModule, 
    RecipeCardComponent,
    PageHeaderComponent
  ]
})
export class HomePage implements OnInit {

  constructor() { }

  ngOnInit() {
  }

}
