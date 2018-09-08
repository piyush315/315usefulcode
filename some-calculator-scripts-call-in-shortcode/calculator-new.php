<?php
function _custom_theme_script(){
	wp_enqueue_style('theme-custom-styles', get_stylesheet_directory_uri() . '/calculator/css/custom-style.css', array(), '0.1.0', 'all');
	wp_enqueue_style('inuit-styles', get_stylesheet_directory_uri() . '/calculator/css/inuit.css', array(), '0.1.0', 'all');
	//wp_enqueue_script( 'jquery-calculate', get_stylesheet_directory_uri(). '/calculator/js/calculator.js' , array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', '_custom_theme_script' );


/**  Start Student Loan Calculator **/
add_shortcode('student_loan_calculator','get_all_data');
function get_all_data(){
	ob_start(); ?>
	<section id="student-loan-calculator-page-container">
        <div class="student-loan-calculator">
            <div class="content-wrapper content-wrapper--main-content">
                <div class="layout layout--large">
                    <div class="layout__item u-4-of-9 u-1-of-1-palm u-1-of-1-lap">
                        <div class="calculator-form current-calculator-form">
				            <div class="layout">
				                <div id="copy" class="layout__item u-1-of-2-lap">
				                    <div id="header" class="calculator-copy">
				                        <div id="titleTargetCurrent"></div>
			                            <h1 class="calculator-copy__title calculator-copy__title--default student-loan-calculator__h1">Student Loan Calculator</h1>
			                            <p class="calculator-copy__subtitle calculator-copy__subtitle--default content--subtitle">First, add your student loan to begin comparing. Then you'll be able to enter your refi details to see how much refinancing could save you.</p>
			                        </div>
				                </div>

				                <div id="inputs-current" class="layout__item u-1-of-2-lap">
				                    <div class="calculator--inputs">

				                        <div class="calculator--errors">
				                            <p class="calculator__error"></p>
				                        </div>

    				                    <div class="layout">
    				                        <div id="loan-balance" class="layout__item u-1-of-2-lap">
    				                            <label for="calculator--loan-balance" class="calculator-label calculator-label--loan-balance">Current Loan Balance</label>
    				                            <input id="current-loan-balance" type="text" data-value="" class="calculator-input calculator-input--loan-balance" placeholder="$ 0.00">
    				                        </div>

				                            <div id="apr-container" class="layout__item u-1-of-2-lap">
				                                <label for="calculator--apr" class="calculator-label calculator-label--apr">APR <span class="hide-on-lap hide-on-palm">(Annual Percentage Rate)</span></label>
				                                <input id="current-apr" data-value="" type="text" class="calculator-input calculator-input--apr" placeholder="0.00 %" required="">
				                            </div>

				                            <div id="payment-term-container" class="layout__item u-1-of-1-lap">
				                                <input type="radio" name="payment-term" value="payment" id="payment" class="calculator-radio" checked="">
				                                <label id="label-payment" class="calculator-label" for="payment">Min. Monthly Payment</label>
				                                <input type="radio" name="payment-term" value="term" id="term" class="calculator-radio">
				                                <label id="label-term" class="calculator-label" for="term">Remaining Term</label>
				                                <input id="current-payment" type="text" data-value="" class="calculator-input calculator-input--payment-term" name="current-payment" placeholder="$ 0.00" required="">
				                                <input id="current-payment-term" data-value="" type="text" class="calculator-input calculator-input--payment-term" placeholder="12 months" required="" style="display: none;">
				                            </div>

				                            <div id="button-container" class="layout__item u-1-of-1-lap">
				                                <button type="button" id="calculator-button-current" class="calculator-button--original-loan calculator-button calculateForm" >Add Loan</button>
				                                <button type="button" id="results-button-current" class="calculator-button--results calculator-button">See Results</button>
				                            </div>
				                        </div>
				                    </div>
				                </div>
				            </div>
				        </div>

				        <div class="calculator-form new-calculator-form">
				            <div class="layout">
				                <div id="copy-new" class="layout__item u-1-of-2-lap">
				                    <div id="header-new" class="calculator-copy">
				                        <div id="titleTargetNew"></div>
				                        <h1 class="calculator-copy__title calculator-copy__title--default student-loan-calculator__h1">Compare to a new refinanced loan.</h1>
				                        <p class="calculator-copy__subtitle calculator-copy__subtitle--default content--subtitle">Refinancing your student loans can help you reduce your monthly payment and/or pay off your loan faster. Add the details of your refi offer below to see your savings.</p>
				                    </div>
				                </div>

            				    <div id="savings--non-palm-new" class="layout__item u-1-of-2-lap hide-on-palm">
        				            <div id="savingsDeskLapTarget"></div>
            				    </div>

				                <div id="inputs-new" class="layout__item u-1-of-2-lap">
				                    <div class="calculator--inputs">

                				        <div class="calculator--errors">
                				            <p class="calculator__error"></p>
                				        </div>

				                        <div class="layout">
                				            <div id="apr-container-new" class="layout__item u-1-of-2-lap">
                				                <label for="new-apr" class="calculator-label calculator-label--apr">APR <span class="hide-on-lap hide-on-palm">(Annual Percentage Rate)</span></label>
                				                <input id="new-apr" data-value="" type="text" class="calculator-input calculator-input--apr" placeholder="0.00 %" required="">
                				            </div>

			                                <div id="payment-term-container-new" class="layout__item u-1-of-1-lap">
				                                <input type="radio" name="new-payment-term" value="payment" id="payment-new" class="calculator-radio" checked="">
				                                <label id="label-payment-new" class="calculator-label" for="payment-new">Min. Monthly Payment</label>
				                                <input type="radio" name="new-payment-term" value="term" id="term-new" class="calculator-radio">
				                                <label id="label-term-new" class="calculator-label" for="term-new">Remaining Term</label>
				                                <input id="new-payment" type="text" data-value="" class="calculator-input calculator-input--payment-term" name="new-payment" placeholder="$ 0.00" required="">
				                                <input id="new-payment-term" data-value="" type="text" class="calculator-input calculator-input--payment-term" placeholder="12 months" required="" style="display: none;">
				                            </div>

                				            <div id="button-container-new" class="layout__item u-1-of-1-lap">
                				                <button type="button" id="calculator-button-new" class="calculator-button--original-loan calculator-button calculateFormNew" >Calculate</button>
                				                <button type="button" id="results-button-new" class="calculator-button--results calculator-button">See Results</button>
                				            </div>
				                        </div>
				                    </div>
				                </div>

            				    <div id="savings--palm-new" class="layout__item u-1-of-2-lap hide-on-desk hide-on-lap">
            				        <div id="savingsPalmTarget"></div>
            				    </div>
				            </div>
				        </div>
                    </div>

                    <div class="layout__item u-5-of-9 u-1-of-1-palm u-1-of-1-lap">
                        <div id="resultsTarget">
                            <div class="calculator-results-block">
                                <div class="results-block results-block--principal">
                                    <div class="layout layout--flush">
                                        <div class="layout__item u-3-of-7">
                                            <div class="calculation-block calculation-block--left">
                                                <p class="calculation-block__title">New Principal + Interest</p>
                                                <p class="calculation-block__value interest1">$0</p>
                                                <p class="calculation-block__extra-info">Principal - <span class="P_perc">0.00%</span> / Interest - <span class="I_perc">0.00%</span></p>
                                            </div>
                                        </div>

                                        <div class="layout__item u-1-of-7">
                                            <div class="calculation-block calculation-block--center">
                                                <div class="calculation-block__graph calculation-block__graph--left"></div>
                                                <div class="calculation-block__graph calculation-block__graph--right"></div>
                                                <div class="calculation-block__graph calculation-block__graph--left-overlay"></div>
                                                <div class="calculation-block__graph calculation-block__graph--right-overlay"></div>
                                            </div>
                                        </div>

                                        <div class="layout__item u-3-of-7">
                                            <div class="calculation-block calculation-block--right">
                                                <p class="calculation-block__title">Current Principal + Interest <span class="edit--original-loan">Edit</span></p>
                                                <p class="calculation-block__value interest">$0</p>
                                                <input type="hidden" name="" class="interest_hidden" value="">
                                                <p class="calculation-block__extra-info">Principal - <span class="P_perc">0.00%</span> / Interest - <span class="I_perc">0.00%</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="results-block results-block--total-interest">
                                    <div class="layout layout--flush">
                                        <div class="layout__item u-3-of-7">
                                            <div class="calculation-block calculation-block--left">
                                                <p class="calculation-block__title ">New Total Interest</p>
                                                <p class="calculation-block__value total-interest1">$0</p>
                                            </div>
                                        </div>

                                        <div class="layout__item u-1-of-7">
                                            <div class="calculation-block calculation-block--center">
                                                <div class="calculation-block__graph calculation-block__graph--left"></div>
                                                <div class="calculation-block__graph calculation-block__graph--right"></div>
                                            </div>
                                        </div>

                                        <div class="layout__item u-3-of-7">
                                            <div class="calculation-block calculation-block--right">
                                                <p class="calculation-block__title ">Total Interest</p>
                                                <p class="calculation-block__value total-interest">$0</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="results-block results-block--apr">
                                    <div class="layout layout--flush">
                                        <div class="layout__item u-3-of-7">
                                            <div class="calculation-block calculation-block--left">
                                                <p class="calculation-block__title">New APR</p>
                                                <p class="calculation-block__value apr-result1">0.00%</p>
                                            </div>
                                        </div>

                                        <div class="layout__item u-1-of-7">
                                            <div class="calculation-block calculation-block--center">
                                                <div class="calculation-block__graph calculation-block__graph--left"></div>
                                                <div class="calculation-block__graph calculation-block__graph--right"></div>
                                            </div>
                                        </div>

                                        <div class="layout__item u-3-of-7">
                                            <div class="calculation-block calculation-block--right">
                                                <p class="calculation-block__title">Current APR</p>
                                                <p class="calculation-block__value apr-result">0.00%</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="results-block results-block--monthly-payment">
                                    <div class="layout layout--flush">
                                        <div class="layout__item u-3-of-7">
                                            <div class="calculation-block calculation-block--left">
                                                <p class="calculation-block__title">New Monthly Payment</p>
                                                <p class="calculation-block__value emi-result1">$0</p>
                                            </div>
                                        </div>

                                        <div class="layout__item u-1-of-7">
                                            <div class="calculation-block calculation-block--center">
                                                <div class="calculation-block__graph calculation-block__graph--left"></div>
                                                <div class="calculation-block__graph calculation-block__graph--right"></div>
                                            </div>
                                        </div>

                                        <div class="layout__item u-3-of-7">
                                            <div class="calculation-block calculation-block--right">
                                                <p class="calculation-block__title">Min. Monthly Payment</p>
                                                <p class="calculation-block__value emi-result">$0</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="results-block results-block--payoff-date">
                                    <div class="layout layout--flush">
                                        <div class="layout__item u-3-of-7">
                                            <div class="calculation-block calculation-block--left">
                                                <p class="calculation-block__title">New Payoff date</p>
                                                <p class="calculation-block__value monthly-emi-result"><?php echo date('M. Y');?></p>
                                            </div>
                                        </div>

                                        <div class="layout__item u-1-of-7">
                                            <div class="calculation-block calculation-block--center">
                                                <div class="calculation-block__graph calculation-block__graph--left"></div>
                                                <div class="calculation-block__graph calculation-block__graph--right"></div>
                                            </div>
                                        </div>

                                        <div class="layout__item u-3-of-7">
                                            <div class="calculation-block calculation-block--right">
                                                <p class="calculation-block__title">Final Payoff Date</p>
                                                <p class="calculation-block__value final-date"><?php echo date('M. Y');?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script type="text/javascript">
jQuery(document).ready(function(){

	var d_total_int = 0;
	var d_total_pay = 0 ;
	var d_rate =0;
	var d_p = 0;

	//Current Calculate Form
	jQuery(".calculateForm").click(function() {
	   	/* Act on the event */
	   	var output = '';
	   	var emi = 0;
	    var P = 0;
	    var n = 1;
	    var r = 0; 
	    var mi = 0;
	    var rate =0;

        var current_date = new Date();
        var monthNames = ["Jan.", "Feb.", "Mar.", "Apr.", "May.", "Jun.","Jul.", "Aug.", "Sep.", "Oct.", "Nov.", "Dec."];

	    // define variable

	   	P = parseFloat(jQuery("input#current-loan-balance").attr("data-value")); // interest value
	   	rate = parseFloat(jQuery("input#current-apr").attr("data-value")); // main rate
	   	r = parseFloat(jQuery("input#current-apr").attr("data-value"))/100/12; //rate for divide by 100
	   	n = parseFloat(jQuery("input#current-payment-term").attr("data-value")); // Month
	   	mi = parseFloat(jQuery("input#current-payment").attr("data-value")); // Per Month

	   	//emi = (P * r / 12) * [Math.pow((1 + r / 12), n)] / [Math.pow((1 + r / 12), n) - 1];  

	   	var monthly_payment = P * r / (1-(Math.pow((1+r),-n))); 

	   	var total_payable = monthly_payment * n;

	   	var total_interest = parseFloat(total_payable - P);

	   	/* Starting validation for input box 29-11-2017 akTE*/
	   	if(jQuery('#term').is(':checked')) {
			if (jQuery('#current-loan-balance').attr("data-value") == P && jQuery('#current-apr').attr("data-value") == rate && jQuery('#current-payment-term').attr("data-value") == n){

		   		/* get the last loan date  */

		    	var newDate = parseInt(n);
                current_date.setMonth(newDate);

                var formattedMonth = monthNames[current_date.getMonth()]+" "+current_date.getFullYear();

				var t_principal = total_payable.toFixed(2);
				var t_interest = total_interest.toFixed(2);

				var princ_perc = ((P/t_principal)*100).toFixed(2);
				var interest_perc = ((t_interest/t_principal)*100).toFixed(2);

				var num_Princ = Number(total_payable.toFixed(2)).toLocaleString('en');
				var num_Interest = Number(total_interest.toFixed(2)).toLocaleString('en');
				var num_EMI = Number(monthly_payment.toFixed(2)).toLocaleString('en');

				jQuery(".calculation-block--right span.P_perc").text(princ_perc+"%");
				jQuery(".calculation-block--right span.I_perc").text(interest_perc+"%");

				jQuery(".interest_hidden").val(t_principal);

			    jQuery("p.interest").text("$"+num_Princ);
			    jQuery("p.total-interest").text("$"+num_Interest);
			    jQuery("p.apr-result").text(rate.toFixed(2)+"%");  
			    jQuery("p.emi-result").text("$"+num_EMI);
			    jQuery("p.final-date").text(formattedMonth);
			    jQuery(".calculation-block--right").removeClass('calculation-block--active').addClass('calculation-block--active');
			    jQuery(".calculation-block--center").removeClass('calculation-block--active').addClass('calculation-block--active');
			    jQuery(".calculation-block__graph--right").removeClass('calculation-block__graph--active').addClass('calculation-block__graph--active');
			    jQuery(".calculation-block__graph--right-overlay").css('height', princ_perc+'%');
			    jQuery(".edit--original-loan").show();
			    jQuery(".current-calculator-form").hide();
			    jQuery(".new-calculator-form").show();

        	}

    	}

    	else if(jQuery('#payment').is(':checked')) {

        	if(jQuery('#current-loan-balance').attr("data-value") == P && jQuery('#current-apr').attr("data-value") == rate && jQuery('#current-payment').attr("data-value") == mi){

	        	var ipm = parseFloat(P * r);
		     	//console.log(ipm+ ' ipm ');

		    	var tenure = parseFloat(P / (mi-ipm));
		    	//console.log(tenure+ ' Total Month ');

		    	//var monthly_payment1 = P * r / (1-(Math.pow((1+r),-tenure)));
		    	//console.log(monthly_payment1+ ' monthly_payment ');
				//console.log(formattedMonth2);
		    	//jQuery("p.monthly-emi-result").text("NEW PAYOFF DATE :- "+formattedMonth2);

	    		var newTime = tenure;
	    		//console.log(newTime+ ' Total Month ');

	        	d_p = P;
	        	var tt = newTime;
	        	//console.log("New PRINCIPAL Amount -:"+ d_p);

	        	for(var i = 1 ; i <= newTime ; i++) {

	        		var d_time = 1;
	        		var monthEMI = 0;
	            	monthEMI = (d_p * r) * [Math.pow((1 + r), newTime)] / [Math.pow((1 + r ), newTime) - 1];  
	            	//console.log("New month EMI -: "+ monthEMI );
	            	d_p = d_p + monthEMI - mi;
	            	//console.log("Remaining PRINCIPAL anoumt " + d_p);
	        	}

	        	//console.log(newTime+ ' Total Month ');
	    		//var NewEmi = parseFloat((P * r) * [Math.pow((1 + r), newTime)] / [Math.pow((1 + r ), newTime) - 1]);  
	    		var NewEmi = P * r / (1-(Math.pow((1+r),-newTime)));
	    		//emi = parseFloat((P * r ) * [Math.pow((1 + r ), n)] / [Math.pow((1 + r), n) - 1]);
	    	 	console.log(NewEmi+ ' monthly_payment ');
		    	var Newtotal_payable = NewEmi * newTime;
		     	//console.log(Newtotal_payable);
		    	var Newtotal_interest = Newtotal_payable - P;
		    	// console.log(Newtotal_interest);
		    	tenure++;

                var newDate = parseInt(tenure);
                current_date.setMonth(newDate);

                var formattedMonth2 = monthNames[current_date.getMonth()]+" "+current_date.getFullYear();

			    var t_principal = Newtotal_payable.toFixed(2);
				var t_interest = Newtotal_interest.toFixed(2);

				var princ_perc = ((P/t_principal)*100).toFixed(2);
				var interest_perc = ((t_interest/t_principal)*100).toFixed(2);

				var num_Princ = Number(Newtotal_payable.toFixed(2)).toLocaleString('en');
				var num_Interest = Number(Newtotal_interest.toFixed(2)).toLocaleString('en');
				var num_EMI = Number(mi.toFixed(2)).toLocaleString('en');

				jQuery(".calculation-block--right span.P_perc").text(princ_perc+"%");
				jQuery(".calculation-block--right span.I_perc").text(interest_perc+"%");

				jQuery(".interest_hidden").val(t_principal);

			    jQuery("p.interest").text("$"+num_Princ);
			    jQuery("p.total-interest").text("$"+num_Interest);
			    jQuery("p.apr-result").text(rate.toFixed(2)+"%");  
			    jQuery("p.emi-result").text("$"+num_EMI);
			    jQuery("p.final-date").text(formattedMonth2);
			    jQuery(".calculation-block--right").removeClass('calculation-block--active').addClass('calculation-block--active');
			    jQuery(".calculation-block--center").removeClass('calculation-block--active').addClass('calculation-block--active');
			    jQuery(".calculation-block__graph--right").removeClass('calculation-block__graph--active').addClass('calculation-block__graph--active');
			    jQuery(".calculation-block__graph--right-overlay").css('height', princ_perc+'%');
			    jQuery(".edit--original-loan").show();
			    jQuery(".current-calculator-form").hide();
			    jQuery(".new-calculator-form").show();

        	}
    	}

	}); 

	//NEW Calculate Form
	jQuery(".calculateFormNew").click(function() {

	   	/* Act on the event */
	   	var output = '';
	   	var emi = 0;
	    var P = 0;
	    var n = 1;
	    var r = 0; 
	    var mi = 0;
	    var rate =0;

        var current_date = new Date();
        var monthNames = ["Jan.", "Feb.", "Mar.", "Apr.", "May.", "Jun.","Jul.", "Aug.", "Sep.", "Oct.", "Nov.", "Dec."];

	    // define variable

	   	P = parseFloat(jQuery("input#current-loan-balance").attr("data-value")); // interest value
	   	rate = parseFloat(jQuery("input#new-apr").attr("data-value")); // main rate
	   	r = parseFloat(jQuery("input#new-apr").attr("data-value"))/100/12; //rate for divide by 100
	   	n = parseFloat(jQuery("input#new-payment-term").attr("data-value")); // Month
	   	mi = parseFloat(jQuery("input#new-payment").attr("data-value")); // Per Month

	   	var currentTotalPrincipal = parseFloat(jQuery(".interest_hidden").val());

	   	//emi = (P * r / 12) * [Math.pow((1 + r / 12), n)] / [Math.pow((1 + r / 12), n) - 1];  

	   	var monthly_payment = P * r / (1-(Math.pow((1+r),-n))); 

	   	var total_payable = monthly_payment * n;

	   	var total_interest = parseFloat(total_payable - P);

	   	/* Starting validation for input box 29-11-2017 akTE*/
	   	if(jQuery('#term-new').is(':checked')) {
			if (jQuery('#current-loan-balance').attr("data-value") == P){

		   		/* get the last loan date  */

                var newDate = parseInt(n);
                current_date.setMonth(newDate);

                var formattedMonth = monthNames[current_date.getMonth()]+" "+current_date.getFullYear();

				var t_principal = total_payable.toFixed(2);
				var t_interest = total_interest.toFixed(2);

				var princ_perc = ((P/t_principal)*100).toFixed(2);
				var interest_perc = ((t_interest/t_principal)*100).toFixed(2);

				var num_Princ = Number(total_payable.toFixed(2)).toLocaleString('en');
				var num_Interest = Number(total_interest.toFixed(2)).toLocaleString('en');
				var num_EMI = Number(monthly_payment.toFixed(2)).toLocaleString('en');

				var diffAmount = (currentTotalPrincipal - t_principal).toFixed(2);

				var fracPart = diffAmount % 1;
				var intPart = diffAmount - fracPart;

				var strPart = ""+diffAmount;
				var res = strPart.split(".");

				jQuery("#copy-new").hide();

				if(diffAmount > 0) {
					jQuery("#savingsDeskLapTarget").html("<div class=\"loan-results loan-results__saving loan-results__saving--show\"><p>Congrats! You'll Save:</p><h2 class=\"student-loan-calculator__h2 loan-results--price\">$"+intPart.toLocaleString('en')+".<span class=\"content--cents\">"+res[1]+"</span></h2></div>");
				} else {
					jQuery("#savingsDeskLapTarget").html("<div class=\"loan-results loan-results__loss loan-results__loss--show\"><p class=\"loan-results__header\">This refinance will cost you <span class=\"losses\">$"+Math.abs(diffAmount).toLocaleString('en')+ "</span> more over the life of the new loan.</p></div>");
				}


			    jQuery(".calculation-block--left span.P_perc").text(princ_perc+"%");
				jQuery(".calculation-block--left span.I_perc").text(interest_perc+"%");

			    jQuery("p.interest1").text("$"+num_Princ);
			    jQuery("p.total-interest1").text("$"+num_Interest);
			    jQuery("p.apr-result1").text(rate.toFixed(2)+"%");  
			    jQuery("p.emi-result1").text("$"+num_EMI);
			    jQuery("p.monthly-emi-result").text(formattedMonth);
			    jQuery(".calculation-block--left").removeClass('calculation-block--active').addClass('calculation-block--active');
			    jQuery(".calculation-block--center").removeClass('calculation-block--active').addClass('calculation-block--active');
			    jQuery(".calculation-block__graph--left").removeClass('calculation-block__graph--active').addClass('calculation-block__graph--active');
			    jQuery(".calculation-block__graph--left-overlay").css('height', princ_perc+'%');

        	}

    	}

    	else if(jQuery('#payment-new').is(':checked')) {

        	if(jQuery('#current-loan-balance').attr("data-value") == P){

	        	var ipm = parseFloat(P * r);
		     	//console.log(ipm+ ' ipm ');

		    	var tenure = parseFloat(P / (mi-ipm));
		    	//console.log(tenure+ ' Total Month ');

		    	//var monthly_payment1 = P * r / (1-(Math.pow((1+r),-tenure)));
		    	//console.log(monthly_payment1+ ' monthly_payment ');
				//console.log(formattedMonth2);
		    	//jQuery("p.monthly-emi-result").text("NEW PAYOFF DATE :- "+formattedMonth2);

	    		var newTime = tenure;
	    		//console.log(newTime+ ' Total Month ');

	        	d_p = P;
	        	var tt = newTime;
	        	//console.log("New PRINCIPAL Amount -:"+ d_p);

	        	for(var i = 1 ; i <= newTime ; i++) {

	        		var d_time = 1;
	        		var monthEMI = 0;
	            	monthEMI = (d_p * r) * [Math.pow((1 + r), newTime)] / [Math.pow((1 + r ), newTime) - 1];  
	            	//console.log("New month EMI -: "+ monthEMI );
	            	d_p = d_p + monthEMI - mi;
	            	//console.log("Remaining PRINCIPAL anoumt " + d_p);
	        	}

	        	//console.log(newTime+ ' Total Month ');
	    		//var NewEmi = parseFloat((P * r) * [Math.pow((1 + r), newTime)] / [Math.pow((1 + r ), newTime) - 1]);  
	    		var NewEmi = P * r / (1-(Math.pow((1+r),-newTime)));
	    		//emi = parseFloat((P * r ) * [Math.pow((1 + r ), n)] / [Math.pow((1 + r), n) - 1]);
	    	 	console.log(NewEmi+ ' monthly_payment ');
		    	var Newtotal_payable = NewEmi * newTime;
		     	//console.log(Newtotal_payable);
		    	var Newtotal_interest = Newtotal_payable - P;
		    	// console.log(Newtotal_interest);
		    	tenure++;

                var newDate = parseInt(tenure);
                current_date.setMonth(newDate);

                var formattedMonth2 = monthNames[current_date.getMonth()]+" "+current_date.getFullYear();

			    var t_principal = Newtotal_payable.toFixed(2);
				var t_interest = Newtotal_interest.toFixed(2);

				var princ_perc = ((P/t_principal)*100).toFixed(2);
				var interest_perc = ((t_interest/t_principal)*100).toFixed(2);

				var num_Princ = Number(Newtotal_payable.toFixed(2)).toLocaleString('en');
				var num_Interest = Number(Newtotal_interest.toFixed(2)).toLocaleString('en');
				var num_EMI = Number(mi.toFixed(2)).toLocaleString('en');

				var diffAmount = (currentTotalPrincipal - t_principal).toFixed(2);

				var fracPart = diffAmount % 1;
				var intPart = diffAmount - fracPart;

				var strPart = ""+diffAmount;
				var res = strPart.split(".");

				jQuery("#copy-new").hide();

				if(diffAmount > 0) {
					jQuery("#savingsDeskLapTarget").html("<div class=\"loan-results loan-results__saving loan-results__saving--show\"><p>Congrats! You'll Save:</p><h2 class=\"student-loan-calculator__h2 loan-results--price\">$"+intPart.toLocaleString('en')+".<span class=\"content--cents\">"+res[1]+"</span></h2></div>");
				} else {
					jQuery("#savingsDeskLapTarget").html("<div class=\"loan-results loan-results__loss loan-results__loss--show\"><p class=\"loan-results__header\">This refinance will cost you <span class=\"losses\">$"+Math.abs(diffAmount).toLocaleString('en')+ "</span> more over the life of the new loan.</p></div>");
				}

				jQuery(".calculation-block--left span.P_perc").text(princ_perc+"%");
				jQuery(".calculation-block--left span.I_perc").text(interest_perc+"%");

			    jQuery("p.interest1").text("$"+num_Princ);
			    jQuery("p.total-interest1").text("$"+num_Interest);
			    jQuery("p.apr-result1").text(rate.toFixed(2)+"%");  
			    jQuery("p.emi-result1").text("$"+num_EMI);
			    jQuery("p.monthly-emi-result").text(formattedMonth2);
			    jQuery(".calculation-block--left").removeClass('calculation-block--active').addClass('calculation-block--active');
			    jQuery(".calculation-block--center").removeClass('calculation-block--active').addClass('calculation-block--active');
			    jQuery(".calculation-block__graph--left").removeClass('calculation-block__graph--active').addClass('calculation-block__graph--active');
			    jQuery(".calculation-block__graph--left-overlay").css('height', princ_perc+'%');

        	}
    	}

	});
	
	jQuery(".edit--original-loan").on("click",function(){
		jQuery(".edit--original-loan").hide();
	    jQuery(".current-calculator-form").show();
	    jQuery(".new-calculator-form").hide();
	    jQuery("#copy-new").show();
	    jQuery("#savingsDeskLapTarget").html("");
	});

});
</script>

<?php
    return ob_get_clean();
}
/**  End Student Loan Calculator **/

/**  Start Student Loan Consolidation Calculator **/
add_shortcode('student_loan_consolidation_calculator','consolidate_student_loans');
function consolidate_student_loans(){
    ob_start(); ?>

    <section id="student-loan-consolidation-calculator-page-container">
        <div class="student-loan-consolidation-calculator">
            <div class="content-wrapper content-wrapper--main-content">
                <div class="layout">
                    <div id="consolidationCalc" class="layout__item u-2-of-5 u-1-of-1-palm u-1-of-1-lap">
                        <div class="calculator-form consolidation-calculator-form">
                            <div class="layout">
                                <div id="copy" class="layout__item u-1-of-1-lap">
                                    <div id="header" class="calculator-copy">
                                        <div id="titleTarget">
                                            <h1 class="calculator-copy__title student-loan-calculator__h1">Student Loan Consolidation Calculator</h1>
                                            <p class="calculator-copy__subtitle content--subtitle">Got multiple student loans with varying rates and terms? Let us do the math. Enter their details here and see instantly how they stack up together.</p>
                                        </div>
                                    </div>
                                </div>

                                <div id="inputs" class="layout__item u-1-of-1-lap">
                                    <div class="calculator--inputs">
                                        <div class="calculator--errors">
                                            <p class="calculator__error"></p>
                                        </div>

                                        <div class="layout">
                                            <div id="loan-balance-container" class="layout__item u-3-of-12-lap">
                                                <label for="calculator--loan-balance" class="calculator-label calculator-label--loan-balance">Current Loan Balance</label>
                                                <input id="current-loan-balance" type="text" class="calculator-input calculator-input--loan-balance" placeholder="$ 0.00">
                                            </div>

                                            <div id="apr-container" class="layout__item u-3-of-12-lap">
                                                <label for="calculator--apr" class="calculator-label calculator-label--apr">APR <span class="hide-on-lap hide-on-palm">(Annual Percentage Rate)</span></label>
                                                <input id="current-apr" type="text" class="calculator-input calculator-input--apr" placeholder="0.00 %" required="">
                                            </div>

                                            <div id="payment-term-container" class="layout__item u-1-of-1-lap">
                                                <input type="radio" name="payment-term" value="payment" id="payment" class="calculator-radio" checked="">
                                                <label id="label-payment" class="calculator-label" for="payment">Min. Monthly Payment</label>
                                                <input type="radio" name="payment-term" value="term" id="term" class="calculator-radio">
                                                <label id="label-term" class="calculator-label" for="term">Remaining Term</label>
                                                 <input id="current-payment" type="text" data-value="" class="calculator-input calculator-input--payment-term" name="current-payment" placeholder="$ 0.00" required="" style="display: block;">
                                                <input id="current-payment-term" data-value="" type="text" class="calculator-input calculator-input--payment-term" placeholder="12 months" required="" style="display: none;">
                                            </div>

                                            <div id="button-container" class="layout__item u-1-of-1-lap">
                                                <button type="button" id="calculator" class="calculator-button--original-loan calculator-button calculateResultBtn">Add Loan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="layout__item u-3-of-5 u-1-of-1-palm u-1-of-1-lap" id="calculationsTarget">
                        <div class="student-loan-calculation-block-consolidation">
                            <div class="calculation-block-consolidation calculation-block-consolidation--principal">
                                <div class="calculation-block-consolidation__title">Total Principal + Interest <span class="tooltip icon--tooltip"><span class="tooltip__info">The total value of the principal plus the interest across all your loans.</span></span>
                                </div>
                                <div class="calculation-block-consolidation__value loan-info loan-info--inactive interest" id="totalTarget"><span class="interest-Ipart">$0</span><span class="value value--cents interest-Fpart">.00</span></div>
                                <div class="calculation-block-consolidation__graph-container">
                                    <div class="graph">
                                        <div class="graph--fill" style="transition: width 1.5s cubic-bezier(0.42, 0, 0.58, 1); width: 0%;"></div>
                                    </div>
                                    <div class="layout" id="barLabelTarget">
                                        <div class="layout__item u-1-of-2">
                                            <p class="bar-label bar-label--left loan-info loan-info--inactive">Principal - <span class="P_perc">0.00%</span></p>
                                        </div>
                                        <div class="layout__item u-1-of-2">
                                            <p class="bar-label bar-label--right loan-info loan-info--inactive">Interest - <span class="I_perc">0.00%</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="calculation-block-consolidation calculation-block-consolidation--new-loan" id="newLoanInfoTarget">
                                <div class="layout">
                                    <div class="layout__item u-1-of-4 u-1-of-2-palm">
                                        <div class="new-loan-info">
                                            <p class="new-loan-info__title">weighted avg apr<span class="tooltip icon--tooltip"><span class="tooltip__info">A single APR that represents the average APR of several loans with varying balances and APRs. Loans with a higher balance have more ‘weight’ on the final APR.</span></span></p>
                                            <p class="new-loan-info__value loan-info loan-info--inactive average-apr">0.00%</p>
                                        </div>
                                    </div>

                                    <div class="layout__item u-1-of-4 u-1-of-2-palm">
                                        <div class="new-loan-info">
                                            <p class="new-loan-info__title">monthly payment</p>
                                            <p class="new-loan-info__value loan-info loan-info--inactive monthly-emi">$0</p>
                                        </div>
                                    </div>

                                    <div class="layout__item u-1-of-4 u-1-of-2-palm">
                                        <div class="new-loan-info">
                                            <p class="new-loan-info__title">total interest</p>
                                            <p class="new-loan-info__value loan-info loan-info--inactive total-interest">$0</p>
                                        </div>
                                    </div>

                                    <div class="layout__item u-1-of-4 u-1-of-2-palm">
                                        <div class="new-loan-info new-loan-info--last">
                                            <p class="new-loan-info__title">final payoff date</p>
                                            <p class="new-loan-info__value loan-info loan-info--inactive final-date"><?php echo date('M. Y');?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="calculation-block-consolidation calculation-block-consolidation--consolidation-loans">
                                <table class="calculation-block-consolidation__table">
                                    <tbody>
                                        <tr class="consolidation-loan">
                                            <td class="consolidation-loan__title"><p><span class="hide-on-mobile">Loan </span>Balances</p></td>
                                            <td class="consolidation-loan__title"><p>APR</p></td>
                                            <td class="consolidation-loan__title hide-on-mobile"><p>Mo. Payment</p></td>
                                            <td class="consolidation-loan__title"><p>Interest</p></td>
                                            <td class="consolidation-loan__title"><p>Payoff Date</p></td>
                                            <td class="consolidation-loan__remove--top"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="calculation-block-consolidation__table loan-info-table loan-info loan-info--inactive" id="loansTarget">
                                    <tr class="consolidation-loan blank-loan">
                                        <td class="consolidation-loan__value loan-info-balance">$0</td>
                                        <td class="consolidation-loan__value loan-info-apr">0.00%</td>
                                        <td class="consolidation-loan__value hide-on-mobile loan-info-emi">$0</td>
                                        <td class="consolidation-loan__value loan-info-interest">$0</td>
                                        <td class="consolidation-loan__value loan-info-date"><?php echo date('M. Y');?></td>
                                        <td class="consolidation-loan__remove"><div class="remove_loan" data-index="0"></div></td>
                                    </tr>
                                </table>
                            </div>
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        jQuery(document).ready(function(){
                var d_total_int = 0;
                var d_total_pay = 0 ;
                var d_rate =0;
                var d_p = 0;

            jQuery(".calculateResultBtn").click(function() {
                var output = '';
                var emi = 0;
                var P = 0;
                var n = 1;
                var r = 0; 
                var mi = 0;
                var rate =0;

                var current_date = new Date();
                var final_date = new Date();
                var monthNames = ["Jan.", "Feb.", "Mar.", "Apr.", "May.", "Jun.","Jul.", "Aug.", "Sep.", "Oct.", "Nov.", "Dec."];

                // define variable

                P = parseFloat(jQuery("input#current-loan-balance").attr("data-value")); // interest value
                rate = parseFloat(jQuery("input#current-apr").attr("data-value")); // main rate
                r = parseFloat(jQuery("input#current-apr").attr("data-value"))/100/12; //rate for divide by 100
                n = parseFloat(jQuery("input#current-payment-term").attr("data-value")); // Month
                mi = parseFloat(jQuery("input#current-payment").attr("data-value")); // Per Month

                var monthly_payment = P * r / (1-(Math.pow((1+r),-n))); 
                var total_payable = monthly_payment * n;
                var total_interest = parseFloat(total_payable - P);

                if(jQuery('#term').is(':checked')) {
                    if (jQuery('#current-loan-balance').attr("data-value") == P && jQuery('#current-apr').attr("data-value") == rate && jQuery('#current-payment-term').attr("data-value") == n){

                        var newDate = parseInt(n);
                        current_date.setMonth(newDate);

                        var formattedMonth = monthNames[current_date.getMonth()]+" "+current_date.getFullYear();
                        var t_principal = total_payable.toFixed(2);
                        var t_interest = total_interest.toFixed(2);
                        var princ_perc = ((P/t_principal)*100).toFixed(2);
                        var interest_perc = ((t_interest/t_principal)*100).toFixed(2);

                        var num_Princ = Number(total_payable.toFixed(2)).toLocaleString('en');
                        var num_Interest = Number(total_interest.toFixed(2)).toLocaleString('en');
                        var num_EMI = Number(monthly_payment.toFixed(2)).toLocaleString('en');

                        var fracPart = t_principal % 1;
                        var intPart = t_principal - fracPart;

                        var strPart = ""+t_principal;
                        var res = strPart.split(".");

                        var append_P = P.toFixed(2);
                        var append_Apr = rate.toFixed(2);
                        var append_Emi = monthly_payment.toFixed(2);
                        var append_Interest = total_interest.toFixed(2);

                        jQuery(".blank-loan").hide();

                        jQuery("#loansTarget").append("<tr class=\"consolidation-loan\"><td class=\"consolidation-loan__value loan-info-balance\" data-value="+append_P+">$"+append_P+"</td><td class=\"consolidation-loan__value loan-info-apr\" data-value="+append_Apr+">"+append_Apr+"%</td><td class=\"consolidation-loan__value hide-on-mobile loan-info-emi\" data-value="+append_Emi+">$"+append_Emi+"</td><td class=\"consolidation-loan__value loan-info-interest\" data-value="+append_Interest+">$"+append_Interest+"</td><td class=\"consolidation-loan__value loan-info-date\" data-value="+newDate+">"+formattedMonth+"</td><td class=\"consolidation-loan__remove\"><div class=\"remove_loan\" data-index=\"0\"></div></td></tr>");


                        var final_Loan = 0;
                        var final_Apr = 0;
                        var final_Emi = 0;
                        var final_Interest = 0;
                        var final_PayOffDate = "";

                        var total_loan_info_balance = 0;
                        var total_loan_info_interest = 0;
                        var total_loan_info_emi = 0;
                        var total_loan_info_apr = 0;
                        var avg_apr = 0;
                        var count = 0;
                        var date_arr = [];

                        var final_Loan_fracPart = 0;
                        var final_Loan_intPart = 0;

                        var final_Loan_strPart = "";
                        var final_Loan_res = "";

                        jQuery(".loan-info-table tr:not(.blank-loan)").each(function(index, value) {
                            count = jQuery(".loan-info-table tr:not(.blank-loan)").size();
                            var loan_info_balance = parseFloat(jQuery(this).find(".loan-info-balance").attr("data-value"));
                            var loan_info_apr = parseFloat(jQuery(this).find(".loan-info-apr").attr("data-value"));
                            var loan_info_emi = parseFloat(jQuery(this).find(".loan-info-emi").attr("data-value"));
                            var loan_info_interest = parseFloat(jQuery(this).find(".loan-info-interest").attr("data-value"));
                            var loan_info_date = parseInt(jQuery(this).find(".loan-info-date").attr("data-value"));

                            total_loan_info_balance += loan_info_balance;
                            total_loan_info_interest += loan_info_interest;
                            total_loan_info_emi += loan_info_emi;
                            total_loan_info_apr += loan_info_apr;
                            avg_apr = total_loan_info_apr / count;
                            final_Loan = total_loan_info_balance + total_loan_info_interest;

                            final_Loan_fracPart = final_Loan % 1;
                            final_Loan_intPart = final_Loan - final_Loan_fracPart;

                            final_Loan_strPart = ""+final_Loan;
                            final_Loan_res = final_Loan_strPart.split(".");

                            date_arr.push(loan_info_date);

                        });

                            var max_date = Math.max.apply(Math,date_arr);
                            console.log("dateArray:- "+date_arr+"- Max Date:- "+max_date);
                            var finalNewDate = parseInt(max_date);
                            final_date.setMonth(finalNewDate);

                            final_PayOffDate = monthNames[final_date.getMonth()]+" "+final_date.getFullYear();

                        jQuery("span.P_perc").text(princ_perc+"%");
                        jQuery("span.I_perc").text(interest_perc+"%");
                        jQuery("span.interest-Ipart").text("$"+final_Loan_intPart.toLocaleString('en'));
                        jQuery("span.interest-Fpart").text("."+final_Loan_res[1]);

                        jQuery(".average-apr").text(avg_apr.toFixed(2)+"%");
                        jQuery(".monthly-emi").text("$"+total_loan_info_emi.toFixed(2).toLocaleString('en'));
                        jQuery("p.total-interest").text("$"+total_loan_info_interest.toFixed(2).toLocaleString('en'));
                        jQuery("p.final-date").text(final_PayOffDate);
                        jQuery(".graph .graph--fill").css('width', princ_perc+'%');
                        jQuery(".loan-info").removeClass('loan-info--inactive').addClass('loan-info--active');

                        jQuery("#current-loan-balance, #current-apr, #current-payment, #current-payment-term").val("");
                        jQuery("#current-loan-balance, #current-apr, #current-payment, #current-payment-term").attr("data-value", "");

                    }
                }

                else if(jQuery('#payment').is(':checked')) {
                    if(jQuery('#current-loan-balance').attr("data-value") == P && jQuery('#current-apr').attr("data-value") == rate && jQuery('#current-payment').attr("data-value") == mi){

                        var ipm = parseFloat(P * r);
                        var tenure = parseFloat(P / (mi-ipm));
                        var newTime = tenure;

                        var NewEmi = P * r / (1-(Math.pow((1+r),-newTime)));
                        var Newtotal_payable = NewEmi * newTime;
                        var Newtotal_interest = Newtotal_payable - P;
                        tenure++;

                        var newDate = parseInt(tenure);
                        current_date.setMonth(newDate);

                        var formattedMonth = monthNames[current_date.getMonth()]+" "+current_date.getFullYear();

                        var t_principal = Newtotal_payable.toFixed(2);
                        var t_interest = Newtotal_interest.toFixed(2);
                        var princ_perc = ((P/t_principal)*100).toFixed(2);
                        var interest_perc = ((t_interest/t_principal)*100).toFixed(2);

                        var num_Princ = Number(Newtotal_payable.toFixed(2)).toLocaleString('en');
                        var num_Interest = Number(Newtotal_interest.toFixed(2)).toLocaleString('en');
                        var num_EMI = Number(mi.toFixed(2)).toLocaleString('en');

                        var fracPart = t_principal % 1;
                        var intPart = t_principal - fracPart;

                        var strPart = ""+t_principal;
                        var res = strPart.split(".");

                        var append_P = P.toFixed(2);
                        var append_Apr = rate.toFixed(2);
                        var append_Emi = mi.toFixed(2);
                        var append_Interest = Newtotal_interest.toFixed(2);

                        jQuery(".blank-loan").hide();

                        jQuery("#loansTarget").append("<tr class=\"consolidation-loan\"><td class=\"consolidation-loan__value loan-info-balance\" data-value="+append_P+">$"+append_P+"</td><td class=\"consolidation-loan__value loan-info-apr\" data-value="+append_Apr+">"+append_Apr+"%</td><td class=\"consolidation-loan__value hide-on-mobile loan-info-emi\" data-value="+append_Emi+">$"+append_Emi+"</td><td class=\"consolidation-loan__value loan-info-interest\" data-value="+append_Interest+">$"+append_Interest+"</td><td class=\"consolidation-loan__value loan-info-date\" data-value="+newDate+">"+formattedMonth+"</td><td class=\"consolidation-loan__remove\"><div class=\"remove_loan\" data-index=\"0\"></div></td></tr>");

                        var final_Loan = 0;
                        var final_Apr = 0;
                        var final_Emi = 0;
                        var final_Interest = 0;
                        var final_PayOffDate = "";

                        var total_loan_info_balance = 0;
                        var total_loan_info_interest = 0;
                        var total_loan_info_emi = 0;
                        var total_loan_info_apr = 0;
                        var avg_apr = 0;
                        var count = 0;
                        var date_arr = [];

                        var final_Loan_fracPart = 0;
                        var final_Loan_intPart = 0;

                        var final_Loan_strPart = "";
                        var final_Loan_res = "";

                        jQuery(".loan-info-table tr:not(.blank-loan)").each(function(index, value) {
                            count = jQuery(".loan-info-table tr:not(.blank-loan)").size();
                            var loan_info_balance = parseFloat(jQuery(this).find(".loan-info-balance").attr("data-value"));
                            var loan_info_apr = parseFloat(jQuery(this).find(".loan-info-apr").attr("data-value"));
                            var loan_info_emi = parseFloat(jQuery(this).find(".loan-info-emi").attr("data-value"));
                            var loan_info_interest = parseFloat(jQuery(this).find(".loan-info-interest").attr("data-value"));
                            var loan_info_date = parseInt(jQuery(this).find(".loan-info-date").attr("data-value"));

                            total_loan_info_balance += loan_info_balance;
                            total_loan_info_interest += loan_info_interest;
                            total_loan_info_emi += loan_info_emi;
                            total_loan_info_apr += loan_info_apr;
                            avg_apr = total_loan_info_apr / count;
                            final_Loan = total_loan_info_balance + total_loan_info_interest;

                            final_Loan_fracPart = final_Loan % 1;
                            final_Loan_intPart = final_Loan - final_Loan_fracPart;

                            final_Loan_strPart = ""+final_Loan;
                            final_Loan_res = final_Loan_strPart.split(".");

                            date_arr.push(loan_info_date);

                        });
                            var max_date = Math.max.apply(Math,date_arr);
                            var finalNewDate = parseInt(max_date);
                            final_date.setMonth(finalNewDate);

                            final_PayOffDate = monthNames[final_date.getMonth()]+" "+final_date.getFullYear();

                        jQuery("span.P_perc").text(princ_perc+"%");
                        jQuery("span.I_perc").text(interest_perc+"%");
                        jQuery("span.interest-Ipart").text("$"+final_Loan_intPart.toLocaleString('en'));
                        jQuery("span.interest-Fpart").text("."+final_Loan_res[1]);

                        jQuery(".average-apr").text(avg_apr.toFixed(2)+"%");
                        jQuery(".monthly-emi").text("$"+total_loan_info_emi.toFixed(2).toLocaleString('en'));
                        jQuery("p.total-interest").text("$"+total_loan_info_interest.toFixed(2).toLocaleString('en'));
                        jQuery("p.final-date").text(final_PayOffDate);
                        jQuery(".graph .graph--fill").css('width', princ_perc+'%');
                        jQuery(".loan-info").removeClass('loan-info--inactive').addClass('loan-info--active');

                        jQuery("#current-loan-balance, #current-apr, #current-payment, #current-payment-term").val("");
                        jQuery("#current-loan-balance, #current-apr, #current-payment, #current-payment-term").attr("data-value", "");
                    }
                }
            });

            jQuery(document).on('click', '.remove_loan', function(event) {
                event.preventDefault();
                /* Act on the event */
                jQuery(this).parents(".consolidation-loan:not(.blank-loan)").remove();

                var final_date = new Date();
                var monthNames = ["Jan.", "Feb.", "Mar.", "Apr.", "May.", "Jun.","Jul.", "Aug.", "Sep.", "Oct.", "Nov.", "Dec."];

                var final_Loan = 0;
                var final_Apr = 0;
                var final_Emi = 0;
                var final_Interest = 0;
                var final_PayOffDate = "";

                var total_loan_info_balance = 0;
                var total_loan_info_interest = 0;
                var total_loan_info_emi = 0;
                var total_loan_info_apr = 0;
                var avg_apr = 0;
                var count = 0;
                var date_arr = [];

                var final_Loan_fracPart = 0;
                var final_Loan_intPart = 0;

                var final_Loan_strPart = "";
                var final_Loan_res = "";

                jQuery(".loan-info-table tr:not(.blank-loan)").each(function(index, value) {
                    count = jQuery(".loan-info-table tr:not(.blank-loan)").size();
                    var loan_info_balance = parseFloat(jQuery(this).find(".loan-info-balance").attr("data-value"));
                    var loan_info_apr = parseFloat(jQuery(this).find(".loan-info-apr").attr("data-value"));
                    var loan_info_emi = parseFloat(jQuery(this).find(".loan-info-emi").attr("data-value"));
                    var loan_info_interest = parseFloat(jQuery(this).find(".loan-info-interest").attr("data-value"));
                    var loan_info_date = parseInt(jQuery(this).find(".loan-info-date").attr("data-value"));

                    total_loan_info_balance += loan_info_balance;
                    total_loan_info_interest += loan_info_interest;
                    total_loan_info_emi += loan_info_emi;
                    total_loan_info_apr += loan_info_apr;
                    avg_apr = total_loan_info_apr / count;
                    final_Loan = total_loan_info_balance + total_loan_info_interest;

                    final_Loan_fracPart = final_Loan % 1;
                    final_Loan_intPart = final_Loan - final_Loan_fracPart;

                    final_Loan_strPart = ""+final_Loan;
                    final_Loan_res = final_Loan_strPart.split(".");

                    date_arr.push(loan_info_date);

                });
                    var max_date = Math.max.apply(Math,date_arr);
                    var finalNewDate = parseInt(max_date);
                    final_date.setMonth(finalNewDate);

                    final_PayOffDate = monthNames[final_date.getMonth()]+" "+final_date.getFullYear();

                jQuery("span.interest-Ipart").text("$"+final_Loan_intPart.toLocaleString('en'));
                jQuery("span.interest-Fpart").text("."+final_Loan_res[1]);

                jQuery(".average-apr").text(avg_apr.toFixed(2)+"%");
                jQuery(".monthly-emi").text("$"+total_loan_info_emi.toFixed(2).toLocaleString('en'));
                jQuery("p.total-interest").text("$"+total_loan_info_interest.toFixed(2).toLocaleString('en'));
                jQuery("p.final-date").text(final_PayOffDate);
            });
        }); 
    </script>

<?php
    return ob_get_clean();
}
/**  End Student Loan Consolidation Calculator **/
?>

