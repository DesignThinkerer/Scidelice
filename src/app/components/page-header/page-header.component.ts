import { CommonModule } from '@angular/common';
import { Component, Input, OnInit } from '@angular/core';
import { IonicModule } from '@ionic/angular';

@Component({
  selector: 'page-header',
  templateUrl: './page-header.component.html',
  styleUrls: ['./page-header.component.scss'],
  standalone: true,
  imports: [IonicModule, CommonModule]
})

export class PageHeaderComponent  implements OnInit {

  @Input() pageTitle: string = 'Title of the current page';
  @Input() previousButtonText: string = '';

  constructor() { }

  ngOnInit() {}

}
