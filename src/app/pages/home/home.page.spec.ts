import { ComponentFixture, TestBed, fakeAsync, tick, waitForAsync } from '@angular/core/testing';
import { Router } from '@angular/router';
import { IonicModule } from '@ionic/angular';

import { HomePage } from './home.page';

describe('HomePage', () => {
  let component: HomePage;
  let fixture: ComponentFixture<HomePage>;
  let router: Router;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      imports: [IonicModule.forRoot() , HomePage],
    }).compileComponents();

    fixture = TestBed.createComponent(HomePage);
    router = TestBed.inject(Router);
    component = fixture.componentInstance;
  }));

  it('should go to the profile pages on click on the profile card', (): void => {
    spyOn(router, 'navigate');

    component.goToProfile();

    expect(router.navigate).toHaveBeenCalledWith(['profile']);
  });

  it('should go to the new recipe page on click on the new recipe button', (): void => {
    spyOn(router, 'navigate');

    component.goToNewRecipe();

    expect(router.navigate).toHaveBeenCalledWith(['recipes/new']);
  });

});