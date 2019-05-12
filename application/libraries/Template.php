<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Template.php
 * Created by PhpStorm.
 * Created at 12.05.2019 13:28 as part of test project
 *
 *
 * @author    : ikalaushin
 * @copyright 2013-2019 YOU GLOBAL LTD
 */


class Template {
    var $template_data = array();
    var $CI = null;

    public function __construct() {
        // Set the super object to a local variable for use later
        $this->CI =& get_instance();
    }

    function set($name, $value)
    {
        $this->template_data[$name] = $value;
    }

    /**
     * Function loads the view with the layout
     *
     * @param string $template
     * @param string $view
     * @param array  $view_data
     * @param bool   $return
     *
     * @return mixed
     */
    function load($template = '', $view = '', $view_data = array(), $return = FALSE)
    {
        $this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
        return $this->CI->load->view($template, $this->template_data, $return);
    }
}
/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */