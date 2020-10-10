import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ViacepComponent } from './viacep.component';

describe('ViacepComponent', () => {
  let component: ViacepComponent;
  let fixture: ComponentFixture<ViacepComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ViacepComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ViacepComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
