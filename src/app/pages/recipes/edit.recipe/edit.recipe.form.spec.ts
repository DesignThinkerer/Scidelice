import { EditRecipeForm } from './edit.recipe.form';
import { Form, FormBuilder, FormGroup } from '@angular/forms';

describe('EditRecipeForm', () => {
    
    let editRecipeForm: EditRecipeForm;
    let form: FormGroup;
    
    beforeEach(() => {
    
         editRecipeForm = new EditRecipeForm(new FormBuilder());
         form = editRecipeForm.createForm();

    });

    it('should create recipe form empty', () => {
        /*
        object is possibly null error solved with not null assertion operator

        https://stackoverflow.com/a/73316503
        */
        // const idControl = form.get('id');

        // expect(idControl).not.toBeNull();
        // if (idControl) {
        //   expect(idControl.valid).toBeFalsy();
        // }

        expect(form).not.toBeNull();
        // name should not be null and have a default value of ''
        expect(form.get('name')).not.toBeNull();

        //we are absolutely sure that can never be null, by using the ! operator
        expect(form.get('name')!.value).toEqual("");
        expect(form.get('name')!.valid).toBeFalsy();
        
        expect(form.get('description')).not.toBeNull();
        expect(form.get('description')!.value).toEqual("");

        expect(form.get('ingredients')).not.toBeNull();
        expect(form.get('ingredients')!.value).toEqual("");

        expect(form.get('steps')).not.toBeNull();
        expect(form.get('steps')!.value).toEqual("");
      });

      it('should have name invalid if name is not valid', () => {
        form.get('name')!.setValue('');
        expect(form.get('name')!.valid).toBeFalsy();
    });

    //TODO: Fix these tests (seems async related)

    //see https://youtu.be/3gaVbroD-l8?t=397
    
    // it('should have name valid if name is valid', () => {
    //     form.get('name')!.setValue('some name for the recipe');
    //     expect(form.get('name')!.valid).toBeTruthy();
    // });

    // it('should have a valid form', () => {
    //     form.get('name')!.setValue('some name for the recipe');
    //     form.get('description')!.setValue('a description');
    //     form.get('ingredients')!.setValue('ingredients');
    //     form.get('steps')!.setValue('steps');
        
    //     expect(form.valid).toBeTruthy();
    // }
    // );
}
);