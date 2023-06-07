import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { IonicModule } from '@ionic/angular';
import { RecipeCardComponent } from 'src/app/components/recipe-card/recipe-card.component';
import { PageHeaderComponent } from 'src/app/components/page-header/page-header.component';
import { Router } from '@angular/router';

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

  constructor(private router: Router) { }

  ngOnInit() {
  }

  goToProfile(){this.router.navigate(['profile']);}

  goToNewRecipe(){this.router.navigate(['recipes/new']);}

}
