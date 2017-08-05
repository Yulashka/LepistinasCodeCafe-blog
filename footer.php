<footer id="footer" class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <p class="text-left gray">2016 <?php echo get_bloginfo('name'); ?>,
                    <a class="gray" href="#">Privacy</a>
                    <a class="gray" href="#">Terms</a>
                </p>
            </div>
            <div class="col-md-6 col-sm-12">
                <select class="center-block black" name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
                    <option value="">
                        Archives
                    </option>
                    <?php wp_get_archives( array( 'type'=> 'monthly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
                </select>
            </div>
        </div>
    </div>
</footer>

<a href="#top" id="back-to-top" class="font-size16px black"><i class="fa fa-arrow-up fa-lg"></i></a>
<?php wp_footer(); ?> 
</body>

</html>