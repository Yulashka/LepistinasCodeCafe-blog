<form role="search" method="get" class="form-inline" action="<?php echo home_url( '/' ); ?>">
    <div class="input-group">
      <input type="search" class="form-control" 
             placeholder="Search"
             value="<?php echo get_search_query(); ?>" name="s"
             title="Search for:" />
      <span class="input-group-btn">
        <input type="submit" class="btn btn-black"
        value="Search" />

      </span>
    </div><!-- /input-group -->
</form>


