<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

require_once plugin_dir_path( __FILE__ ) .'/cs-framework-path.php';

if( ! function_exists( 'cs_framework_init' ) && ! class_exists( 'CSFramework' ) ) {
  function cs_framework_init() {

    // active modules
    defined( 'CS_ACTIVE_FRAMEWORK' )  or  define( 'CS_ACTIVE_FRAMEWORK',  true );
    defined( 'CS_ACTIVE_METABOX'   )  or  define( 'CS_ACTIVE_METABOX',    true );
    defined( 'CS_ACTIVE_TAXONOMY'   ) or  define( 'CS_ACTIVE_TAXONOMY',   true );
    defined( 'CS_ACTIVE_SHORTCODE' )  or  define( 'CS_ACTIVE_SHORTCODE',  true );
    defined( 'CS_ACTIVE_CUSTOMIZE' )  or  define( 'CS_ACTIVE_CUSTOMIZE',  true );

    // helpers
    cs_locate_template( 'functions/deprecated.php'     );
    cs_locate_template( 'functions/fallback.php'       );
    cs_locate_template( 'functions/helpers.php'        );
    cs_locate_template( 'functions/actions.php'        );
    cs_locate_template( 'functions/enqueue.php'        );
    cs_locate_template( 'functions/sanitize.php'       );
    cs_locate_template( 'functions/validate.php'       );

    // classes
    cs_locate_template( 'classes/abstract.class.php'   );
    cs_locate_template( 'classes/options.class.php'    );
    cs_locate_template( 'classes/framework.class.php'  );
    cs_locate_template( 'classes/metabox.class.php'    );
    cs_locate_template( 'classes/taxonomy.class.php'   );
    cs_locate_template( 'classes/shortcode.class.php'  );
    cs_locate_template( 'classes/customize.class.php'  );

    // configs
    cs_locate_template( 'config/framework.config.php'  );
    cs_locate_template( 'config/metabox.config.php'    );
    cs_locate_template( 'config/taxonomy.config.php'   );
    cs_locate_template( 'config/shortcode.config.php'  );
    cs_locate_template( 'config/customize.config.php'  );

  }
  add_action( 'init', 'cs_framework_init', 10 );
}
