<?php
/**
* Template Name: Job Listing Ajax
*
*/

get_header();
?>
<style>
.cvf_pag_loading {padding: 20px;}
.cvf-universal-pagination ul {margin: 0; padding: 0;}
.cvf-universal-pagination ul li {display: inline; margin: 3px; padding: 4px 8px; background: #FFF; color: black; }
.cvf-universal-pagination ul li.active:hover {cursor: pointer; background: #1E8CBE; color: white; }
.cvf-universal-pagination ul li.inactive {background: #7E7E7E;}
.cvf-universal-pagination ul li.selected {background: #1E8CBE; color: white;}
</style>
<?php



    /* Template Code */
    ?>
    <div class="col-md-12 content">
    <div class = "inner-box content no-right-margin darkviolet">
        <script type="text/javascript">
        (function($)
        {
        $(document).ready(function($) {
                    var ajaxUrl = "<?php echo admin_url('admin-ajax.php')?>";
                    var page = 1;
                    var ppp = 3; // Post per page
                    var start = page * ppp;
                    $("#more_posts").on("click",function(e){ // When btn is pressed.
                        e.preventDefault();
                    $("#more_posts").attr("disabled",true); // Disable the button, temp.
                    $.post(ajaxUrl, {
                    action:"more_post_ajax",
                    offset: (page * ppp) + 1,
                    ppp: ppp
                    }).success(function(posts) {
                    page++;
                    $(".name_of_posts_class").append(posts); // CHANGE THIS!
                    $("#more_posts").attr("disabled",false);
                    });

                    });

        });
    })(jQuery);
        </script>
        <div class = "cvf_pag_loading">
            <div class = "cvf_universal_container">
                <div class="cvf-universal-content">
               
                    <a id="more_posts" href="#">Load More</a>
                    <div class="name_of_posts_class"></div>
                </div>
            </div>
        </div>

    </div>      
</div>

<?php
get_footer();
?>