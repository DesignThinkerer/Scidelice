import { Component } from '@angular/core';
import { CommonModule, NgIf } from '@angular/common';
import {
  FormBuilder,
  FormGroup,
  FormsModule,
  ReactiveFormsModule,
} from '@angular/forms';
import { IonicModule } from '@ionic/angular';
import { Router } from '@angular/router';

//standalone components
import { PageHeaderComponent } from 'src/app/components/page.header/page.header.component';

//tools
import { EditRecipeForm } from './edit.recipe.form';

@Component({
  selector: 'app-edit-recipe',
  templateUrl: './edit.recipe.page.html',
  styleUrls: ['./edit.recipe.page.scss'],
  standalone: true,
  imports: [
    IonicModule,
    CommonModule,
    FormsModule,
    PageHeaderComponent,
    ReactiveFormsModule,
    NgIf,
  ],
})
export class EditRecipePage {
  form!: FormGroup;

  constructor(private router: Router, private formBuilder: FormBuilder) {
    this.form = new EditRecipeForm(this.formBuilder).createForm();
  }

  createRecipe() {
    console.log('createRecipe');
    this.router.navigate(['/recipes']);
  }

  isSupported = false;
  importRecipe() {
    console.log('import recipe file');
  }

  scan() {
    console.log('scan begin');
    this.importRecipe();
  }
}
