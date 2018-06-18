
<?php   include_once('../../happy_client.php'); ?>
<div class="container">

</div>



<footer>

    <div class="footer_top">
        <div class="container">
            <div class="col-sm-4">
                <h3 class="text-uppercase"> Contact us </h3>
                <p> <i class="fa fa-home"> </i> International Islamic University Chittagong</p>
                <p> <i class="fa fa-map-marker"></i>   City: Chittagong </p>
                <p> <i class="fa fa-phone"></i>  Contact +880 01825484458</p>
                <p> <i class="fa fa-envelope"></i> Email: <a href="mailto:skmarufiiuc@gmail.com">skmarufiiuc@gmail.com</a></p>

            </div> <!-- end col-sm-4 -->

            <div class="col-sm-4">
                <h3 class="text-uppercase"> Quick Menu </h3>
                <p> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/frontPage/index.php">Home </a> </p>
                <p> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/frontPage/contact.php">Contac Us </a> </p>
                <p> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/frontPage/gallery.php">Gallery </a> </p>
                <p> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a href="http://localhost/hall_management/views/iiuc/codemasons/hallroom_reservation/frontPage/about.php">About us</a></p>
            </div> <!-- end col-sm-4 -->

            <div class="col-sm-4">
                <h3 class="text-uppercase"> Follow Us </h3>
                <p> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a href=""> FAQ </a> </p>
                <p> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a href=""> Blog </a> </p>
                <p> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a href=""> Forum </a> </p>
                <p> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a href=""> Billing System </a> </p>
            </div> <!-- end col-sm-4 -->

        </div> <!-- end container -->
    </div> <!-- end footer_top -->

    <div class="footer_bottom">
        <div class="container">
            <div class="col-sm-6">
                <p style="float: left;position: relative;left:79%;"> Copy Right &copy; by <a href="#"> CodeMasons </a> </p>
            </div>
            <div class="col-sm-6">
                <ul class="pull-right codemasons_social_sites">
                        <a target="_blank" href="https://web.facebook.com/profile.php?id=100015587769483"> <i class="fa fa-facebook fa-2x" aria-hidden="true"></i> </a>
                        <a target="_blank" href="https://twitter.com/hmcodemasons"> <i class="fa fa-twitter fa-2x" aria-hidden="true"></i> </a>
                        <a target="_blank" href="https://www.linkedin.com/in/hallmanagemant-codemasons-571b5b135/"> <i class="fa fa-linkedin fa-2x" aria-hidden="true"></i> </a>
                        <a target="_blank" href="https://plus.google.com/u/0/115600931142929152293"> <i class="fa fa-google-plus fa-2x" aria-hidden="true"></i> </a>
                        <a target="_blank" href="https://www.pinterest.com/hallmanagemant/"> <i class="fa fa-pinterest fa-2x" aria-hidden="true"></i> </a>
                </ul>
            </div>

        </div> <!-- end container -->
    </div> <!-- end footer_bottom -->


</footer>
<a href="#" class="scrollToTop" </a>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../../../../../resource/js/jquery-3.1.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../../../../resource/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../../../resource/js/wow.min.js"></script>



<script src="../../../../../resource/js/scrollEvent.js"></script>
<script src="../../../../../resource/jquery-ui/jquery-ui.js"></script>

<script>
    new WOW().init();
</script>
<script>

    $(document).ready(function(){
        //Check to see if the window is top if not then display button
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollToTop').fadeIn();
            } else {
                $('.scrollToTop').fadeOut();
            }
        });
        //Click event to scroll to top
        $('.scrollToTop').click(function(){
            $('html, body').animate({scrollTop : 0},800);
            return false;
        });

    });
</script>

<script>
    jQuery(function($) {
        $('#message').fadeOut (550);
        $('#message').fadeIn (550);
        $('#message').fadeOut (550);
        $('#message').fadeIn (550);
        $('#message').fadeOut (550);
        $('#message').fadeIn (550);
        $('#message').fadeOut (550);
    })
</script>

<!--search block 5-->
<script>
    $(function() {
        var availableTags = [

            <?php
            echo $comma_separated_keywords;
            ?>
        ];
        // Filter function to search only from the beginning of the string
        $( "#searchID" ).autocomplete({
            source: function(request, response) {

                var results = $.ui.autocomplete.filter(availableTags, request.term);

                results = $.map(availableTags, function (tag) {
                    if (tag.toUpperCase().indexOf(request.term.toUpperCase()) === 0) {
                        return tag;
                    }
                });

                response(results.slice(0, 3));

            }
        });

        $( "#searchID" ).autocomplete({
            select: function(event, ui) {
                $("#searchID").val(ui.item.label);
                $("#searchForm").submit();
            }
        });

    });
</script>
</body>
</html>
