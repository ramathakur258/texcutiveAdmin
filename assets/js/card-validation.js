 var cardNumber = document.querySelector('#card_number');
        cardNumber.addEventListener('keyup', function()
        {
            if(this.value!="" && CardValidation(this.value)){
                 $('#card_number').attr('style','border-color:green');
                 $('#card_icon_label').attr('style','color:green');
                 
                 
            }else{
                $('#card_number').attr('style','border-color:red');
                $('#card_icon_label').attr('style','');
                return false;
            }
           
        });
        
        var cardExpMonth = document.querySelector('#card_expiry_month');
        cardExpMonth.addEventListener('keyup', function()
        {
            
            if(this.value!="" && ExpMonthValidation(this.value)){
                 $('#card_expiry_month').attr('style','border-color:green');
                 $('#expmonth_icon_label').attr('style','color:green');
                 
                 
            }else{
                $('#expmonth_icon_label').attr('style','');
                $('#card_expiry_month').attr('style','border-color:red');
                return false;
            }
        });
        var cardExpYear = document.querySelector('#card_expiry_year');
        cardExpYear.addEventListener('keyup', function()
        {
            
            if(this.value!="" && ExpYearValidation(this.value)){
                 $('#card_expiry_year').attr('style','border-color:green');
                 $('#expyear_icon_label').attr('style','color:green');
                 
                 
            }else{
                $('#expyear_icon_label').attr('style','');
                $('#card_expiry_year').attr('style','border-color:red');
                return false;
            }
        });
        var cardCvvr = document.querySelector('#card_cvv');
        cardCvvr.addEventListener('keyup', function()
        {
            
            if(this.value!="" && CvvValidation(this.value)){
                 $('#card_cvv').attr('style','border-color:green');
                 $('#cvv_icon_label').attr('style','color:green');
                 
                 
            }else{
                $('#cvv_icon_label').attr('style','');
                $('#card_cvv').attr('style','border-color:red');
                return false;
            }
        });
        var cardHolder = document.querySelector('#card_holder_name');
        cardHolder.addEventListener('keyup', function()
        {
            if(this.value!=""){
                 $('#card_holder_name').attr('style','border-color:green');
                 $('#card_holder_icon_label').attr('style','color:green');
                 
                 
            }else{
                $('#card_holder_icon_label').attr('style','');
                $('#card_holder_name').attr('style','border-color:red');
                return false;
            }
        });
        function CardValidation(val){
            var valid=/^\d{16}$/;
            if (val.search(valid) == -1) {
                return false;
            }
            return true;
        }
        function ExpMonthValidation(val){
            var valid=/^\d{1,2}$/;
            if (val.search(valid) == -1) {
                return false;
            }
            if(val<=0){
                return false;
            }
            return true;
        }
        function ExpYearValidation(val){
            var valid=/^\d{2}$/;
            if (val.search(valid) == -1) {
                return false;
            }
           var currentyear= new Date().getFullYear().toString().substr(-2)
            if(val<currentyear){
                return false;
            }
            return true;
        }
        function CvvValidation(val){
            var valid=/^\d{3}$/;
            if (val.search(valid) == -1) {
                return false;
            }
            return true;
        }
        
        
        var btn = document.querySelector('#cardpayment');
        btn.addEventListener('click', function()
        {
            if($('#card_number').val()!="" && CardValidation($('#card_number').val())){

            }else{
                $('#card_number').attr('style','border-color:red');
                $('#card_icon_label').attr('style','');
                return false;
            }
            
            if($('#card_expiry_month').val()!="" && ExpMonthValidation($('#card_expiry_month').val())){
               
            }else{
                $('#expmonth_icon_label').attr('style','');
                $('#card_expiry_month').attr('style','border-color:red');
                return false;
            }
            
            if($('#card_cvv').val()!="" && CvvValidation($('#card_cvv').val())){
                 
            }else{
                $('#cvv_icon_label').attr('style','');
                $('#card_cvv').attr('style','border-color:red');
                return false;
            }
            if($('#card_holder_name').val()!=""){
                 
            }else{
                $('#card_holder_icon_label').attr('style','');
                $('#card_holder_name').attr('style','border-color:red');
                return false;
            }
            Payment();
            
        }) 