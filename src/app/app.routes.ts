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
  {
    path: 'login',
    loadComponent: () => import('./pages/settings/settings.page').then( m => m.SettingsPage)
  },
  {
    path: 'home',
    loadComponent: () => import('./pages/home/home.page').then( m => m.HomePage)
  },
  {
    path: 'recipes',
    loadComponent: () => import('./pages/recipes/recipes.page').then( m => m.RecipesPage)
  },
  {
    path: 'recipes/new',
    loadComponent: () => import('./pages/recipes/new.recipe/new.recipe.page').then( m => m.NewRecipePage)
  },
];
