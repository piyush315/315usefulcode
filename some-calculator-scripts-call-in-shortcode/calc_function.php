<?php
add_shortcode('student_loan_tabs','student_loan_tabs_function');
function student_loan_tabs_function() {
	ob_start();
?>

<div class="cus-tab-table">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="cus-nav-refinancing" data-toggle="tab" href="#cus-tab-refinancing" role="tab" aria-controls="cus-tab-refinancing" aria-selected="true">Student Loan Refinancing</a>
            <a class="nav-item nav-link" id="cus-nav-s-loan" data-toggle="tab" href="#cus-tab-s-loan" role="tab" aria-controls="cus-tab-s-loan" aria-selected="false">Private Student Loan</a>
            <a class="nav-item nav-link" id="cus-nav-p-loan" data-toggle="tab" href="#cus-tab-p-loan" role="tab" aria-controls="cus-tab-p-loan" aria-selected="false">Personal Loan</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="cus-tab-refinancing" role="tabpanel" aria-labelledby="cus-nav-refinancing">
            <div class="cus-tab-content-table">
                <?php
if( have_rows('student_loan_refinance', 8159 ) ): ?>	

	<?php while( have_rows('student_loan_refinance', 8159 ) ): the_row(); 

		// vars
		$loan_title = get_sub_field('loan_title');
		$loan_image = get_sub_field('loan_image');		
		$fixed_rate = get_sub_field('fixed_rate');
		$variable_rate = get_sub_field('variable_rate');
		$loan_term = get_sub_field('loan_term');
		$eligible_degree = get_sub_field('eligible_degree');
		?>
		
		<div class="cus-tab-content-table-row"> <!-- this will repeat -->
                    <div class="cell cell-one">
                        <div class="image-wrap">
                            <img src="<?php echo $loan_image['url']; ?>" alt="<?php echo $loan_image['alt'] ?>" />
                        </div>
                        <div class="cus-tab-row-title">
                            <p><?php echo $loan_title;?></p>
                        </div>
                    </div>
                    <div class="cell cell-two">
                        <div class="cell-top cell-light-text">
                            <p>Rates from (APR) </p>
                        </div>
                        <div class="cell-text">
                        <?php if ($fixed_rate): ?><p><b>Fixed: </b><?php echo $fixed_rate;?></p><?php endif;?>
                        <?php if ($variable_rate): ?><p><b>Variable: </b><?php echo $variable_rate;?></p><?php endif;?>
                        </div>
                    </div>
                    <div class="cell cell-three">
                        <div class="cell-top cell-light-text">
                            <p>Loan term</p>
                        </div>
                        <div class="cell-text">
                            <p><?php echo $loan_term; ?></p>
                        </div>
                    </div>
                    <div class="cell cell-four">
                        <div class="cell-top cell-light-text">
                            <p>Eligible degrees</p>
                        </div>
                        <div class="cell-text">
                            <p><?php echo $eligible_degree;?></p>
                        </div>
                    </div>
                </div>  <!-- this will repeat -->
		    
		
	<?php endwhile; ?>
	
	
<?php endif; ?>
				
            </div>
        </div>
        <div class="tab-pane fade" id="cus-tab-s-loan" role="tabpanel" aria-labelledby="cus-nav-s-loan">
        <div class="cus-tab-content-table">
		
                <?php
				if( have_rows('student_loan_private', 8159 ) ): ?>

	<?php while( have_rows('student_loan_private', 8159 ) ): the_row(); 

		// vars
		$loan_title = get_sub_field('loan_title');
		$loan_image = get_sub_field('loan_image');		
		$fixed_rate = get_sub_field('fixed_rate');
		$variable_rate = get_sub_field('variable_rate');
		$loan_term = get_sub_field('loan_term');
		$eligible_degree = get_sub_field('eligible_degree');
		?>
		 <div class="cus-tab-content-table-row"> <!-- this will repeat -->
                    <div class="cell cell-one">
                        <div class="image-wrap">
                            <img src="<?php echo $loan_image['url']; ?>" alt="<?php echo $loan_image['alt'] ?>" />
                        </div>
                        <div class="cus-tab-row-title">
                            <p><?php echo $loan_title;?></p>
                        </div>
                    </div>
                    <div class="cell cell-two">
                        <div class="cell-top cell-light-text">
                            <p>Rates from (APR) </p>
                        </div>
                        <div class="cell-text">
							<div class="cell-text">
							<?php if ($fixed_rate): ?><p><b>Fixed: </b><?php echo $fixed_rate;?></p><?php endif;?>
							<?php if ($variable_rate): ?><p><b>Variable: </b><?php echo $variable_rate;?></p><?php endif;?>
							</div>
                        </div>
                    </div>
                    <div class="cell cell-three">
                        <div class="cell-top cell-light-text">
                            <p>Loan term</p>
                        </div>
                        <div class="cell-text">
                            <p><?php echo $loan_term;?></p>
                        </div>
                    </div>
                    <div class="cell cell-four">
                        <div class="cell-top cell-light-text">
                            <p>Eligible degrees</p>
                        </div>
                        <div class="cell-text">
                            <p><?php echo $eligible_degree; ?></p>
                        </div>
                    </div>
        </div>   <!-- this will repeat --> 
	<?php endwhile; ?>
	
<?php endif;

				?>
                
            </div></div>
        <div class="tab-pane fade" id="cus-tab-p-loan" role="tabpanel" aria-labelledby="cus-nav-p-loan">
        <div class="cus-tab-content-table">
				<?php
                if( have_rows('pesonal_loan', 8159 ) ): ?>

	<?php while( have_rows('pesonal_loan', 8159 ) ): the_row(); 

		// vars
		$loan_title = get_sub_field('loan_title');
		$loan_image = get_sub_field('loan_image');		
		$personal_loan_rates = get_sub_field('personal_loan_rates');
		$loan_term = get_sub_field('loan_term');		
		$loan_amount = get_sub_field('loan_amount');
		?>
		<div class="cus-tab-content-table-row"><!-- this will repeat -->
                    <div class="cell cell-one">
                        <div class="image-wrap">
                            <img src="<?php echo $loan_image['url']; ?>" alt="<?php echo $loan_image['alt'] ?>" />
                        </div>
                        <div class="cus-tab-row-title">
                            <p><?php echo $loan_title; ?></p>
                        </div>
                    </div>
                    <div class="cell cell-two">
                        <div class="cell-top cell-light-text">
                            <p>Rates from (APR) </p>
                        </div>
                        <div class="cell-text">
							<p><?php echo $personal_loan_rates; ?></p>                       
                        </div>
                    </div>
                    <div class="cell cell-three">
                        <div class="cell-top cell-light-text">
                            <p>Loan term</p>
                        </div>
                        <div class="cell-text">
                            <p><?php echo $loan_term; ?></p>
                        </div>
                    </div>
                    <div class="cell cell-four">
                        <div class="cell-top cell-light-text">
                            <p>Loan Amount</p>
                        </div>
                        <div class="cell-text">
                            <p>Up to $<?php echo $loan_amount; ?></p>
                        </div>
                    </div>
        </div><!-- this will repeat -->
	<?php endwhile; ?>	
	
<?php endif; ?>
                
                
            </div>
			</div>
		</div>
</div>
<style>
.cus-tab-table {
    width: 900px;
    margin:  auto;
    max-width:  98%;
    max-width:  calc(100% - 15px);
    background:  #fff;
    color:  #000;
}
.cus-tab-table .nav-tabs  {
    white-space:  nowrap;
}
.cus-tab-table .nav-tabs > a{
    min-width: 170px;
    width: 33.3333333334%;
    width:  calc(100% / 3);
    text-align:  center;
    color: #4099d3;
    border-radius:  0;
    position:  relative;
    overflow:  visible;
    border: 1px solid #4099d3;
}
.cus-tab-table .nav-tabs > a:hover{
    border: 1px solid #4099d3;
    background-color: rgba(64, 153, 211, 0.17);
}
.cus-tab-table .nav-tabs > a.active {
    background:  #4099d3;
    color:  #fff;
    border-color:  #4099d3;
}
.cus-tab-table .nav-tabs > a:not(:last-child){
    border-right: none;
}
.cus-tab-table .nav-tabs > a.active:after {
    display: block;
    content: "";
    width: 0;
    height: 0;
    border-left: 13px solid transparent;
    border-right: 13px solid transparent;
    border-top: 10px solid #4099d3;
    margin: -1px auto;
    position:  absolute;
    left:  0;
    right:  0;
    bottom: -9px;
}
.cus-tab-content-table {
    display:  table;
    width:  100%;
}
.cus-tab-content-table * {
    box-sizing: border-box;
}
.cus-tab-content-table-row {
    display:  table-row;
}
.cell {
    display:  table-cell;
    vertical-align:  middle;
    border-bottom:  1px solid #ececec;
    padding: 10px 5px;
}
.cell.cell-one .image-wrap {
    display: inline-block;
    width: 20%;
    padding-right: 5px;
    margin-left: -3px;
    vertical-align:  middle;
}
.cell.cell-one .cus-tab-row-title {
    display: inline-block;
    width: 79%;
    vertical-align:  middle;
}
.cus-tab-row-title p {
    font-size: 16px;
    margin-bottom: 0;
    line-height:  1.4;
}
.cell-light-text {
    font-size: 12px;
    color: #828282;
}
.cell-text p {
    color: #686868;
    font-size: 14px;
    font-weight: 400;
    display:  inline-block;
    margin-bottom:  0;
    line-height: 1.4;
}
.cell-light-text p {
    margin-bottom: 0;
    font-weight: bold !important;
    color: black;
    font-size: 15px;
}
.cell-text b {
    font-weight:  bold;
}
.cell-text {
    line-height:  1.4;
}
@media(min-width: 768px){

    .cell.cell-one {
        width: 315px;
        padding-left: 80px;
    }
    .cell.cell-two {
        width: 305px;
    }
    .cell.cell-three {
        width:  155px;
    }
    .cell.cell-four {
        width:  202px;
    }
}
@media(max-width: 767px){
    .cus-tab-table .nav-tabs > a{
        width:  100%;
        position:  static;
    }
    .cus-tab-table .nav-tabs{
        position:  relative;
    }
    .cus-tab-content-table {
        display: block;
        padding:  10px;
        background: #e0e0e0;
    }
    .cus-tab-content-table * {
        box-sizing: border-box;
    }
    .cus-tab-content-table-row {
        display: block;
        padding:  10px;
        border-bottom:  1px solid #ccc;
        border-radius:  5px;
        margin-bottom: 20px;
        background:  #fff;
    }
    .cell {
        display: block;
        vertical-align:  middle;
        border-bottom:  1px solid #ececec;
        padding: 10px 5px;
        width:  100%;
    }
}
</style>
<?php

    return ob_get_clean();
}
?>