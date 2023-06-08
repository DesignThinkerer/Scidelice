import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormGroup, FormControl, Validators, ReactiveFormsModule} from '@angular/forms';
import { IonicModule } from '@ionic/angular';
import { PageHeaderComponent } from 'src/app/components/page.header/page.header.component';
import { FoodService } from 'src/app/services/food.service';
@Component({
  selector: 'app-pantry',
  templateUrl: './pantry.page.html',
  styleUrls: ['./pantry.page.scss'],
  standalone: true,
  imports: [
    IonicModule,
    CommonModule,
    PageHeaderComponent,
    ReactiveFormsModule
  ],
})
export class PantryPage implements OnInit {
  form!: FormGroup;

  constructor(private foodService: FoodService) {}

  ngOnInit() {
    this.form = new FormGroup({
      foodName: new FormControl(null, { 
        validators: [Validators.required] 
      }),
      expirationDate: new FormControl(null, {
        validators: [Validators.required],
      }),
    });
  }

  addFood() {
    console.log(this.form);
    this.foodService.addFood({
      name: this.form.value.foodName,
      expirationDate: this.form.value.expirationDate,
    });
  }
}
