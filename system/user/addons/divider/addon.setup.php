<?php

require_once PATH_THIRD.'divider/config.php';

/*
|--------------------------------------------------------------------------
| Module Setup File
|--------------------------------------------------------------------------
|
| Provides descriptive data about add-on author, name, and version
| as well as other description data
|
*/

return array(
  'author'      => 'Yoran Palm',
  'author_url'  => 'https://yoranpalm.nl',
  'name'        => 'Divider',
  'description' => 'Displays a divider with centered text on the Publish Page',
  'version'     =>  DIVIDER_VERSION,
  'namespace'   => 'YoranPalm\Divider',
  'docs_url'    => 'https://github.com/yoranpalm/ee-divider',
  'fieldtypes'  => array(
    'divider' => array(
      'name'  => 'Divider',
      'compatibility' => 'text'
    )
  ) 
);

/* End of file addon.setup.php */
/* Location: ./system/user/addons/divider/addon.setup.php */