<?php

add_shortcode('student_loan_calculator','get_all_data');
function get_all_data(){
	ob_start(); 
	
	<?php
	//Do Code here
	?>
    return ob_get_clean();
}
/**  End Student Loan Consolidation Calculator **/