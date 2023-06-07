import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { IonicModule } from '@ionic/angular';
import { Router } from '@angular/router';
import { RecipeCardComponent } from 'src/app/components/recipe-card/recipe-card.component';
import { PageHeaderComponent } from 'src/app/components/page-header/page-header.component';
import { buttonNewRecipeComponent } from 'src/app/components/button.new.recipe/button.new.recipe.component';

@Component({
  selector: 'app-recipes',
  templateUrl: './recipes.page.html',
  styleUrls: ['./recipes.page.scss'],
  standalone: true,
  imports: [IonicModule, CommonModule, FormsModule, RecipeCardComponent, PageHeaderComponent, buttonNewRecipeComponent]
})
export class RecipesPage implements OnInit {

  constructor(private router: Router){}

  navigate(path: string){
    this.router.navigateByUrl(path);
  } //TODO: find a better way to navigate to the new recipe page

  ngOnInit() {
  }

}
