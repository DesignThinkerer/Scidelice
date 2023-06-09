import { Component, OnInit, signal } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormGroup, FormControl, Validators, ReactiveFormsModule} from '@angular/forms';
import { IonicModule } from '@ionic/angular';
import { PageHeaderComponent } from 'src/app/components/page.header/page.header.component';
import { FoodService } from 'src/app/services/food.service';
import { Food } from 'src/app/models/food.model';
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
  allFoodInFreezer = signal<Food[]>([]); 
  // signal is a type of observable that can be subscribed to. It is a signal that emits a value whenever the value of the signal is updated. In this case, the signal emits the value of the allFood array whenever the value of the allFood array is updated.
   
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
  
    this.allFoodInFreezer.set(this.foodService.allFood);// set the value of the allFoodInFreezer signal to the value of the allFood array in the foodService, which is an empty array by default. This is done so that the allFoodInFreezer signal emits the value of the allFood array whenever the value of the allFood array is updated.
  }
  
  addFood() {
    console.log(this.form);
    
    this.foodService.addFood({
      foodName: this.form.value.foodName,
      expirationDate: this.form.value.expirationDate,
    });

    this.allFoodInFreezer.set(this.foodService.allFood);
    
    this.form.reset();
  }

  clearAllFood() {
    this.foodService.clearAllFood(); // Call the `clearAllFood` method in the `FoodService` to remove all data
    this.allFoodInFreezer.set([]); // Update the `allFoodInFreezer` signal with an empty array
  }

  /*
The reason we use .set() instead of .update() in this case is because the allFoodInFreezer signal is a writable signal, not a computed signal.

The .set() method is used to directly assign a new value to a writable signal. It replaces the current value of the signal with the provided value. This is appropriate to update the entire value of the signal with a new value.

On the other hand, the .update() method is used with computed signals to compute a new value based on the previous value of the signal. It takes a function as an argument, which receives the previous value as its parameter and returns the new computed value. The .update() method is suitable when performing computations or transformations on the previous value to derive a new value.

Here, allFoodInFreezer is a writable signal that represents the list of all food items. When a new food item is added using the addFood() method, we want to update the entire list of food items, not compute a new value based on the previous list. Therefore, we use .set() to assign the new value obtained from this.foodService.allFood.

To summarize:

- We use .set() with writable signals to assign a new value directly.
- We use .update() with computed signals to compute a new value based on the previous value.

In this case, allFoodInFreezer represents the entire list of food items and we want to update the entire list, therefore using .set() is the appropriate choice.
*/  

calculateDaysLeft(expirationDate: string): string {
  const now = new Date();
  const expDate = new Date(expirationDate);
  const timeDiff = expDate.getTime() - now.getTime();
  const daysLeft = Math.ceil(timeDiff / (1000 * 3600 * 24));

  if (daysLeft < 0) {
    return "Expired. Throw it away!";
  } else if (daysLeft === 0) {
    return "Will expire today!";
  } else if (daysLeft === 1) {
    return "Will expire tomorrow!";
  } else {
    return `${daysLeft} days left.`;
  }
}


}

//TODO: Use IonViewInEnter and NgDestroy to subscribe and unsubscribe to the allFoodInFreezer signal.