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
        ee()->cp->add_to_head('
            <script
            src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="
            crossorigin="anonymous"></script>
            <script>
            $(document).ready(function(){
                $(".separator").closest("fieldset").addClass("fieldset-divider");
            });
            </script>
        ');
	}

    // --------------------------------------------------------------------

    function display_field($data)
    {
		if ($this->settings)
		{
            $field['text'] = $this->settings['text'];
        }
        
        return '<style>
        .fieldset-divider {
            border-bottom: 1px solid #ccc !important;
            border-top: 1px solid #ccc !important;
            background-color: #f9f9f9;
            margin: 10px 0;
            padding: 10px 20px;
        }
        .fieldset-divider .field-instruct {
            display: none;
        }
        .separator {
            display: flex;
            color: #666;
            font-size: 16px !important;
        }
        .separator span {
            color: #009ae1;
            padding-right: 5px;
        }
        </style>
        <div class="separator"><span>•</span>' . $this->settings['field_settings']['text'] . '</div>';
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
                        'value' => (!isset($data['text']) OR $data['text'] == '') ? '' : $data['text'],
                        'required' => TRUE
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