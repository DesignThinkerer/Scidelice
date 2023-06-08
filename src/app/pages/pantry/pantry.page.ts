import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { IonicModule } from '@ionic/angular';
import { PageHeaderComponent } from 'src/app/components/page.header/page.header.component';

@Component({
  selector: 'app-pantry',
  templateUrl: './pantry.page.html',
  styleUrls: ['./pantry.page.scss'],
  standalone: true,
  imports: [IonicModule, CommonModule, FormsModule, PageHeaderComponent]
})
export class PantryPage  {

  constructor() { }

}
