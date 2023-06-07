import { CommonModule } from '@angular/common'; // required for ngIf
import { Component, Input, OnInit } from '@angular/core';
import { IonicModule } from '@ionic/angular';
@Component({
  selector: 'app-recipe-card',
  templateUrl: './recipe-card.component.html',
  styleUrls: ['./recipe-card.component.scss'],
  standalone: true,
  imports: [IonicModule, CommonModule]
})
export class RecipeCardComponent  implements OnInit {
  // recipe toggles
  @Input() hasNotes: boolean = true;

  // recipe data
  @Input() recipeName: string = 'A cool recipe';
  @Input() recipeDifficulty: string = 'unknown';
  @Input() recipeImage: string = '/assets/img/fallafel.png';
  @Input() recipeImageAlt: string = 'this is a picture of a recipe';
  @Input() recipeNotes: string = 'No notes yet!';


  constructor() { }

  ngOnInit() {}

}
