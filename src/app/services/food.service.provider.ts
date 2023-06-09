import { APP_INITIALIZER, Provider } from '@angular/core';
import { FoodService } from './food.service';

export function initializeFoodService(foodService: FoodService) {
  return () => foodService.initStorage();
}

export const FoodServiceProvider: Provider = {
  provide: APP_INITIALIZER,
  useFactory: initializeFoodService,
  deps: [FoodService],
  multi: true
};
