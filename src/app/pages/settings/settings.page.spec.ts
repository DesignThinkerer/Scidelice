import { ComponentFixture, TestBed } from '@angular/core/testing';
import { Router } from '@angular/router';
import { IonicModule } from '@ionic/angular';

import { SettingsPage } from './settings.page';

describe('SettingsPage', () => {
  let component: SettingsPage;
  let fixture: ComponentFixture<SettingsPage>;
  let router: Router;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [IonicModule.forRoot(), SettingsPage],
    }).compileComponents();

    fixture = TestBed.createComponent(SettingsPage);
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
