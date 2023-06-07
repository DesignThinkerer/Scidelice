import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { IonicModule } from '@ionic/angular';
import { PageHeaderComponent } from 'src/app/components/page.header/page.header.component';

@Component({
  selector: 'app-new-recipe',
  templateUrl: './new.recipe.page.html',
  styleUrls: ['./new.recipe.page.scss'],
  standalone: true,
  imports: [IonicModule, CommonModule, FormsModule, PageHeaderComponent]
})
export class NewRecipePage implements OnInit {

  constructor() { }

  ngOnInit() {
  }

}
