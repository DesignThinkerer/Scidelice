import { Component, inject } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { IonicModule } from '@ionic/angular';
import { PageHeaderComponent } from 'src/app/components/page.header/page.header.component';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-recipe',
  templateUrl: './recipe.page.html',
  styleUrls: ['./recipe.page.scss'],
  standalone: true,
  imports: [IonicModule, CommonModule, FormsModule, PageHeaderComponent],
})
export class RecipePage {
  route: ActivatedRoute = inject(ActivatedRoute);
  recipeName = 'unknown';
  
  ingredients: string[] = [
    'Chickpeas',
    'Onions',
    'Garlic',
    'Coriander',
    'Cumin',
    'Flour',
    'Salt',
    'Pepper'
  ];
  

  constructor(private router: Router) {
    this.recipeName = this.route.snapshot.params['id'];
  }

  navigate(path: string){
    this.router.navigateByUrl(path);
  }

  exportRecipe() {
    console.log('exportRecipe');
  }
  
  editRecipe() {
    console.log('show the new recipe page, import the recipe in the edit page, then on save replace the original recipe with the new recipe');
    this.navigate('recipes/recipe/'+this.recipeName+'/edit');
}
}
