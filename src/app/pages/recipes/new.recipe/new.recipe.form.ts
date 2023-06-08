import { FormBuilder, FormGroup, Validators } from "@angular/forms"

export class NewRecipeForm {

    private formBuilder: FormBuilder;

    constructor(formBuilder: FormBuilder) {
        this.formBuilder = formBuilder;
    }

    //TODO
    createForm() : FormGroup {
        return this.formBuilder.group({
            id: ['',Validators.required],
            name: [''],
            description: [''],
            ingredients: [''],
            steps: ['']
            });
    }

}