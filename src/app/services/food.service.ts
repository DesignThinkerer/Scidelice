import { Injectable } from "@angular/core";

interface FoodItem {
  name: string;
  expirationDate: Date;
}

@Injectable({
  providedIn: 'root'
})
export class FoodService {
  private _allFood: FoodItem[] = [];

  get allFood() {
    return this._allFood;
  }

  constructor() { }

  addFood(foodItem: FoodItem) {
    this._allFood = [foodItem, ...this._allFood];
    console.log(this._allFood);
  }
}
