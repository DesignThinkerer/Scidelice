import { NewRecipeForm } from './new.recipe.form';
import { FormBuilder } from '@angular/forms';

describe('NewRecipeForm', () => {
    
    //TODO
    it('should create recipe form empty', () => {
        const newRecipeForm = new NewRecipeForm(new FormBuilder());
        const form = newRecipeForm.createForm();
        const idControl = form.get('id');

        expect(form).not.toBeNull();

        expect(idControl).not.toBeNull();
        if (idControl) {
          expect(idControl.valid).toBeFalsy();
        }
      
        expect(form.get('name')).not.toBeNull();
        expect(form.get('description')).not.toBeNull();
        expect(form.get('ingredients')).not.toBeNull();
        expect(form.get('steps')).not.toBeNull();
      });
    }
);