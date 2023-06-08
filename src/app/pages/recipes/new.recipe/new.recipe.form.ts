import { AbstractControl, FormBuilder, FormGroup, ValidationErrors, Validators } from "@angular/forms"

export class NewRecipeForm {

    private formBuilder: FormBuilder;

    constructor(formBuilder: FormBuilder) {
        this.formBuilder = formBuilder;
    }

    createForm() : FormGroup {
        return this.formBuilder.group({
            name: [''
            // ,Validators.required, Validators.minLength(3)
            //, this.validateName.bind(this)
          ],
            description: [''],
            ingredients: [''],
            steps: ['']
            });
    }

    //TODO check if validateName works properly
    //disabling custom validator for now

    // validateName(control: AbstractControl): ValidationErrors | null {
    //     const existingNames: string[] = ['falafels', 'waffle', 'spaghetti bolognese'];
      
    //     if (existingNames.includes(control.value)) {
    //       return { uniqueName: false }; // Return an error if the name is not unique
    //     }
      
    //     return null; // Return null if the name is unique
    //   }

}