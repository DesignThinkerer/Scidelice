import { ComponentFixture, TestBed } from '@angular/core/testing';
import { Router } from '@angular/router';
import { IonicModule } from '@ionic/angular';

import { LoginPage } from './login.page';

describe('LoginPage', () => {
  let component: LoginPage;
  let fixture: ComponentFixture<LoginPage>;
  let router: Router;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [IonicModule.forRoot(), LoginPage],
    }).compileComponents();

    fixture = TestBed.createComponent(LoginPage);
    router = TestBed.inject(Router);
    component = fixture.componentInstance;
  });

  it('should go to home page on save', (): void => {

    // expect(true).toBeFalsy(); TDD: always write a test that fails first to make sure the test is working

    spyOn(router, 'navigate');

    component.ngOnInit();
    component.save();

    expect(router.navigate).toHaveBeenCalledWith(['home']);

  });
});
