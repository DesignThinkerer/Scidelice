import { Component } from '@angular/core';
import { CommonModule, NgIf } from '@angular/common';
import { FormBuilder, FormGroup, FormsModule, ReactiveFormsModule } from '@angular/forms';
import { IonicModule } from '@ionic/angular';
import { Router } from '@angular/router';

//standalone components
import { PageHeaderComponent } from 'src/app/components/page.header/page.header.component';

//tools
import { NewRecipeForm } from './new.recipe.form';

@Component({
  selector: 'app-new-recipe',
  templateUrl: './new.recipe.page.html',
  styleUrls: ['./new.recipe.page.scss'],
  standalone: true,
  imports: [IonicModule, CommonModule, FormsModule, PageHeaderComponent, ReactiveFormsModule, NgIf]
})
export class NewRecipePage {

  form!: FormGroup;

  constructor(private router: Router, private formBuilder: FormBuilder) { 
    this.form = new NewRecipeForm(this.formBuilder).createForm();
  }

  createRecipe() {
    console.log("createRecipe");
    this.router.navigate(['/recipes']);
  }

  isSupported= false;
  scan(){
    console.log("scan begin");
}

}
