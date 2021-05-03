import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GuestnavbarComponent } from './guestnavbar.component';

describe('GuestnavbarComponent', () => {
  let component: GuestnavbarComponent;
  let fixture: ComponentFixture<GuestnavbarComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GuestnavbarComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(GuestnavbarComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
