class CompensationCalculator {

    constructor(element) {
      
        this.element = element;
		        // get the input data
        this.salaryLimit = parseInt(element.dataset.salaryLimit);
        this.proUtanAkassa = parseInt(element.dataset.proUtanAkassa);
        this.proMedAkassa = parseInt(element.dataset.proMedAkassa);
        this.proInsurance = parseInt(element.dataset.proInsurance);
		
        //this.salaryLimit = parseInt(element.dataset.salaryLimit);


        var salaryField = element.getElementsByTagName('input')[0];
        salaryField.addEventListener('keypress', (e) => {    

            // Only allow numbers
            if (e.which < 48 || e.which > 57)
            {
                e.preventDefault();
            }
        })
        salaryField.addEventListener('keyup', (e) => {    
            var salary = parseInt(salaryField.value)  

            if(salary < 0 ){
                salary = 0
                salaryField.value = 0
            }

            if(salary >= 0){
                this.calculate(salary > 0 ? salary : 0);
            }else{
                 // hide compensation          
                this.element.getElementsByClassName('results')[0].classList.remove('show');
            }
        })

    }

    calculate(income){

        // utan akassa
        var noCompSum = Math.round((income) * (this.proUtanAkassa/100));
        // no a-kassa ceiling
        if(noCompSum > 11220){
            noCompSum = 11220;
        }

        // med akassa

        if(income <= 33000){
            var newComp = Math.round((income) * (this.proMedAkassa/100));
            if(newComp <= 11220){
                newComp = 11220;
            }
        } else {
            var newComp = Math.round(33000 * (this.proMedAkassa/100));
        }
        if(newComp > 26400){
            newComp = 26400;
        }

          // med inkomst försäkring
          // note changed floor  from 33000 
        if( income < 33000){
            var insurance = Math.round((income) * (this.proMedAkassa/100));
        }else if(income > 33000 && income <= 80000) {
            var insurance = Math.round((income) * (this.proInsurance/100));
        }
        if(income > 80000){
            var insurance = Math.round(80000 * (this.proInsurance/100));
        } 
        if(insurance <= 11220){
            insurance = 11220;
        }
        if(insurance > 64000){
            insurance = 64000;
        }
		
		  noCompSum = noCompSum.toString().replace(/^0+/, '').replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, " ");
          newComp = newComp.toString().replace(/^0+/, '').replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, " ");
          //compensation = compensation.toString().replace(/^0+/, '').replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, " ");
          insurance = insurance.toString().replace(/^0+/, '').replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, " ");

          // update compensation output
          //   this.element.getElementsByClassName('utan')[0].textContent = noCompSum + ' kr';
          this.element.getElementsByClassName('uif')[0].textContent = compensation + ' kr';
          this.element.getElementsByClassName('insurance')[0].textContent = insurance + ' kr';

          // show compensation          
          this.element.getElementsByClassName('results')[0].classList.add('show');

          // Send GTM Compensation event
          dataLayer.push({'event': 'CompensationCalculator'});


    }
  }

export default CompensationCalculator;

