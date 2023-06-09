import { Injectable } from "@angular/core";
import { Storage } from '@ionic/storage-angular';
import { Food } from "../models/food.model";

@Injectable({
  providedIn: 'root'
})
export class FoodService {
  public allFood: Food[] = []; // Public property to store the list of all food items

  constructor(private storage: Storage) {
    this.initStorage(); // Initialize the storage when the service is constructed
  }

  private async initStorage() {
    await this.storage.create(); // Create the storage instance

    // Retrieve the stored food items from the storage
    const storedFood = await this.storage.get('allFood');

    if (storedFood) {
      this.allFood = storedFood; // If there are stored food items, assign them to the public property
    }
  }

  addFood(foodItem: Food) {
    // this.allFood = [foodItem, ...this.allFood]; 
    // Add the new food item to the beginning of the array
    
    //Instead we use this for perf:
    this.allFood.unshift(foodItem); 
    // Add the new food item to the beginning of the array

    this.storage.set('allFood', this.allFood); // Store the updated list of food items in the storage
    console.log(this.allFood); // Log the updated list of food items
  }

  // returns the allFood array, allowing other components or services to retrieve a copy of it.
  getAllFood(): Food[] {
    return this.allFood;
  }

  initialize() {
    return this.initStorage();
  }
}
