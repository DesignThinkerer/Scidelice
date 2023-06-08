import { CommonModule, NgIf } from '@angular/common'; // required for ngIf
import { Component, Input, inject } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { IonicModule } from '@ionic/angular';
@Component({
  selector: 'app-recipe-card',
  templateUrl: './recipe-card.component.html',
  styleUrls: ['./recipe-card.component.scss'],
  standalone: true,
  imports: [IonicModule, CommonModule, NgIf]
})
export class RecipeCardComponent  {
  // recipe toggles
  @Input() showTitle: boolean = false;
  @Input() showNotes: boolean = true;

  // recipe data
  @Input() recipeName: string = 'A cool recipe';
  @Input() recipeDifficulty: string = 'easy';
  @Input() recipeImage: string = '/assets/img/falafel.png';
  @Input() recipeImageAlt: string = 'this is a picture of a recipe';
  @Input() recipeNotes: string = 'No notes yet!';
  
  @Input() recipeTime: string = 'A cool recipe';
  @Input() recipeCalories: string = 'easy';
  @Input() recipeNutriScore: string = '/assets/img/falafel.png';



  constructor(private router: Router) { }

  goToRecipe(){
    this.router.navigate(['recipes/recipe/'+this.recipeName]);
    console.log(`open the recipe : ${this.recipeName}`);
  }

}
