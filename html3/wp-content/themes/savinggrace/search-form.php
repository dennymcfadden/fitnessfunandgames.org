<div class="search_main">
    <form method="get" class="searchform" action="<?php bloginfo( 'url' ); ?>" >
        <input type="text" class="field s" name="s" value="<?php esc_attr_e( 'Search...', 'woothemes' ); ?>" onfocus="if (this.value == '<?php esc_attr_e( 'Search...', 'woothemes' ); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php esc_attr_e( 'Search...', 'woothemes' ); ?>';}" />
        <input type="submit" class="search-submit" value="<?php esc_attr_e( 'Go!', 'woothemes' ); ?>">
    </form>    
    <div class="fix"></div>
</div>