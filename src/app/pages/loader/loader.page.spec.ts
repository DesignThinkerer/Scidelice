import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';
import { Router, provideRouter } from '@angular/router';
import { IonicModule } from '@ionic/angular';

import { LoaderPage } from './loader.page';

describe('LoaderPage', () => {
  let component: LoaderPage;
  let fixture: ComponentFixture<LoaderPage>;
  let router: Router;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      imports: [IonicModule.forRoot() , LoaderPage],
    }).compileComponents();

    fixture = TestBed.createComponent(LoaderPage);
    router = TestBed.inject(Router); //testbed create an instance of router
    component = fixture.componentInstance;
  }));

  it('should navigate', () => {
    spyOn(router, 'navigate');

    component.ngOnInit();
    expect(router.navigate).toHaveBeenCalledWith(['login']);
  });
});