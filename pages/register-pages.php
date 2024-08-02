<?php

function my_admin_menu(){
    add_menu_page( 
        "DiviTemp", 
        "DiviTemp", 
        "manage_options", 
        "MyPlugin", 
        "plugin_settings_view", 
        '', // Leave this empty as we will add the SVG later with a filter
        3 
    );
}

add_action( 'admin_menu', 'my_admin_menu' );

// Filter to output the SVG icon
function my_admin_menu_icon() {
    echo '<style>
        #adminmenu #toplevel_page_MyPlugin div.wp-menu-image:before {
            content: "";
            display: inline-block;
            background-image: url("data:image/svg+xml;base64,' . base64_encode(file_get_contents(File_URI2.'/css/DiviTempSidebar.svg')) . '");
            background-size: 24px 24px; /* Adjust this size as needed */
            width: 24px; /* Adjust this size as needed */
            height: 24px; /* Adjust this size as needed */
            background-repeat: no-repeat;
            background-position: center;
        }

        /* Ensure no padding is applied in different states */
        #adminmenu #toplevel_page_MyPlugin div.wp-menu-image {
            padding: 0 !important;
        }

        /* Active state */
        #adminmenu #toplevel_page_MyPlugin.current div.wp-menu-image:before {
            background-size: 24px 24px; /* Adjust this size as needed */
            width: 24px; /* Adjust this size as needed */
            height: 24px; /* Adjust this size as needed */
        }

        /* Hover state */
        #adminmenu #toplevel_page_MyPlugin:hover div.wp-menu-image:before {
            background-size: 24px 24px; /* Adjust this size as needed */
            width: 24px; /* Adjust this size as needed */
            height: 24px; /* Adjust this size as needed */
        }

        /* Active tab state */
        #adminmenu .wp-has-current-submenu div.wp-menu-image:before {
            background-size: 24px 24px; /* Adjust this size as needed */
            width: 24px; /* Adjust this size as needed */
            height: 24px; /* Adjust this size as needed */
        }
    </style>';
}

add_action('admin_head', 'my_admin_menu_icon');



function plugin_settings_view(){
	include(File_ROOT2 . "/pages/layouts.php");
}