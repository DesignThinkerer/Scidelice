import { FormBuilder, FormGroup } from "@angular/forms"

export class NewFoodForm {

    private formBuilder: FormBuilder;

    constructor(formBuilder: FormBuilder) {
        this.formBuilder = formBuilder;
    }

    createForm() : FormGroup {
        return this.formBuilder.group({
            name: [''],
            expirationDate: [''],
            quantity: [''],
            unit: ['']
            });
    }

}