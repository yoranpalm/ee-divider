<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

require_once PATH_THIRD.'divider/config.php';

/**
 * Divider_ft Class
 *
 * @package     ExpressionEngine
 * @category    Module
 * @author      Yoran Palm <contact@yoranpalm.nl>
 * @copyright   Copyright (c) 2020 Yoran Palm
 * @link        https://github.com/yoranpalm/ee-divider
 */

class Divider_ft extends EE_Fieldtype {

    var $info = array(
        'name'    => DIVIDER_NAME,
        'version' => DIVIDER_VERSION
    );

    public function __construct()
	{
        ee()->lang->loadfile('divider');
	}

    // --------------------------------------------------------------------

    function display_field($data)
    {
		if ($this->settings)
		{
            $field['text'] = $this->settings['text'];
        }
        
        return '<style>
        .separator {
            display: flex;
            align-items: center;
            text-align: center;
            vertical-align: middle;
            font-weight: bold;
            color: #333;
        }
        .separator::before, .separator::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #000;
        }
        .separator::before {
            margin-right: .30em;
        }
        .separator::after {
            margin-left: .30em;
        }
        </style>
        <div class="separator">' . $this->settings['field_settings']['text'] . '</div>';
    }

    // --------------------------------------------------------------------

    function display_settings($data)
	{
		ee()->load->model('addons_model');
		$format_options = ee()->addons_model->get_plugin_formatting(TRUE);

		$settings = array(
			array(
                'title' => 'Text',
                'desc' => lang('desc'),
				'fields' => array(
					'text' => array(
						'type' => 'text',
						'value' => (!isset($data['text']) OR $data['text'] == '') ? '' : $data['text']
					)
				)
			)
		);
        
		return array('field_options_divider' => array(
			'label'    => 'field_options',
			'group'    => 'divider',
			'settings' => $settings
		));
    }
    
    // --------------------------------------------------------------------

    function save_global_settings()
    {
        return array_merge($this->settings, $_POST);
    }

    // --------------------------------------------------------------------

    function save_settings($data)
	{
		$defaults = array(
			'text' => 'divider'
		);

		$all = array_merge($defaults, $data);

		return array_intersect_key($all, $defaults);
    }

    // --------------------------------------------------------------------

    function uninstall()
	{
		return true;
    }

    // --------------------------------------------------------------------

    function update($current = '')
	{
		if($current == $this->info['version'])
		{
			return FALSE;
		}
		return TRUE;
	}
}
// END Divider_ft class

/* End of file ft.divider.php */
/* Location: ./system/user/addons/divider/ft.divider.php */