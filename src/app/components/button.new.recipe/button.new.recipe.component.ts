import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { IonicModule } from '@ionic/angular';

@Component({
  selector: 'button-new-recipe',
  templateUrl: './button.new.recipe.component.html',
  styleUrls: ['./button.new.recipe.component.scss'],
  standalone: true,
  imports: [IonicModule, CommonModule]
})

export class buttonNewRecipeComponent  {

  constructor(private router: Router) { }

  goToNewRecipe(){this.router.navigate(['recipes/new']);

}

}
