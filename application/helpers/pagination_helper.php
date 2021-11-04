<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');


if (! function_exists('pagination')) {

    function pagination($config)
    {
        // start css pagination
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = '&gt;';
        $config['prev_link']        = '&lt;';
        $config['full_tag_open']    = '<div><nav><ul>';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = '<li class="active"><span>';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></li>';
        $config['next_tag_open']    = '<li>';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</li>';
        $config['prev_tag_open']    = '<li>';
        $config['prev_tagl_close']  = 'Next</li>';
        $config['first_tag_open']   = '<li>';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open']    = '<li>';
        $config['last_tagl_close']  = '</li>';
        // end css pagination

		return $config;
    }
}