import { Routes } from '@angular/router';

export const routes: Routes = [
  {
    path: "",
    redirectTo: "loader",
    pathMatch: "full",
  },
  {
    path: 'loader',
    loadComponent: () => import('./pages/loader/loader.page').then( m => m.LoaderPage)
  },
];
