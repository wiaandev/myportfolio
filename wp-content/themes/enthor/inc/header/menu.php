<?php
$menu_select = get_post_meta(get_queried_object_id(), 'menu_select', true);
if($menu_select == 'single_menu'){
    if ( has_nav_menu( 'menu-2' ) ) {
        // User has assigned menu to this location;
        // output it
        ?>
        <nav class="nav navbar">
            <div class="navbar-menu">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-2',
                        'menu_id'        => 'primary-menu-single1',
                        'walker'        => ''
                    ) );
                ?>
            </div>
        </nav>
        <?php
    }
} else {
    if ( has_nav_menu( 'menu-1' ) ) {
        // User has assigned menu to this location;
        // output it
        ?>
        <nav class="nav navbar">
            <div class="navbar-menu">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu-single',
                        'walker'        => ''
                    ) );
                ?>
            </div>
        </nav>
        <?php
    }
}