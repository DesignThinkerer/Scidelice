import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormBuilder, FormGroup, FormsModule, ReactiveFormsModule } from '@angular/forms';
import { IonicModule } from '@ionic/angular';
import { PageHeaderComponent } from 'src/app/components/page.header/page.header.component';

import { NewFoodForm } from './new.food.form';

@Component({
  selector: 'app-pantry',
  templateUrl: './pantry.page.html',
  styleUrls: ['./pantry.page.scss'],
  standalone: true,
  imports: [IonicModule, CommonModule, FormsModule, PageHeaderComponent, ReactiveFormsModule]
})
export class PantryPage  {

  form!: FormGroup;

  constructor(private formBuilder: FormBuilder) { 
    this.form = new NewFoodForm(this.formBuilder).createForm();
  }

  addFood() {
    console.log('add food to the pantry');
  }
}
