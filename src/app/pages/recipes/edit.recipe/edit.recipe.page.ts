import { Component, OnInit, inject } from '@angular/core';
import { CommonModule, NgIf } from '@angular/common';
import {
  FormBuilder,
  FormGroup,
  FormsModule,
  ReactiveFormsModule,
} from '@angular/forms';
import { IonicModule } from '@ionic/angular';
import { ActivatedRoute, Router } from '@angular/router';

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
export class EditRecipePage implements OnInit {
  route: ActivatedRoute = inject(ActivatedRoute);
  form!: FormGroup;
  recipeName = '';
  pageTitle:string = '';
  QRisSupported = false;

  ngOnInit() {
    const editingRecipe = this.route.snapshot.params['id'];
    this.pageTitle = editingRecipe ? "Edit "+editingRecipe : 'New Recipe';
  }
  
  constructor(private router: Router, private formBuilder: FormBuilder) {
    this.form = new EditRecipeForm(this.formBuilder).createForm();
  }

  createRecipe() {
    console.log('createRecipe');
    this.router.navigate(['/recipes']);
  }

  importRecipe() {
    console.log('import recipe file');
  }

  scan() {
    console.log('scan begin');
    this.importRecipe();
  }
}
