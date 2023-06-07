import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';
import { Router } from '@angular/router';
import { IonicModule } from '@ionic/angular';

import { RecipeCardComponent } from './recipe-card.component';

describe('RecipeCardComponent', () => {
  let component: RecipeCardComponent;
  let fixture: ComponentFixture<RecipeCardComponent>;
  let router: Router;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      imports: [IonicModule.forRoot() , RecipeCardComponent],
    }).compileComponents();

    fixture = TestBed.createComponent(RecipeCardComponent);
    router = TestBed.inject(Router);
    component = fixture.componentInstance;
  }));

  it('should go to the recipe page on click on the open recipe button', (): void => {
    spyOn(router, 'navigate');

    component.goToRecipe();
    expect(router.navigate).toHaveBeenCalledWith([component.recipeName]);
  });

});