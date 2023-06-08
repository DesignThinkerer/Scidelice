import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { buttonNewRecipeComponent } from './button.new.recipe.component';

describe('buttonNewRecipeComponent', () => {
  let component: buttonNewRecipeComponent;
  let fixture: ComponentFixture<buttonNewRecipeComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      imports: [IonicModule.forRoot(), buttonNewRecipeComponent]
    }).compileComponents();

    fixture = TestBed.createComponent(buttonNewRecipeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
