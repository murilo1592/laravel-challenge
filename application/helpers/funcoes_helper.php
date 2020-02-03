<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('config_pagination'))
{
    function config_pagination($class,$sql,$cur_page)
    {

        $CI = get_instance();
        // $CI->load->model('CI_Model','model');

        $CI->load->library('ajax_pagination');
        //pega o total de linhas da consulta
        $total_rows = $class->db->query($sql)->num_rows();

        $config['full_tag_open'] = '<nav aria-label="Page navigation example">
										<ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = 'Primeira';
        $config['first_tag_open'] = '<li class="prev page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Última';
        $config['last_tag_open'] = '<li class="next page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = 'Próxima';
        $config['next_tag_open'] = '<li class="next page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = 'Anterior';
        $config['prev_tag_open'] = '<li class="prev page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="javascript:void(0)">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        $config['first_url']  = "";
        $config['base_url']   = "";
        $config['total_rows'] = $total_rows;
        $config['div']         = 'tbl';
        // $config['additional_param'] = 'dbop=table';
        $config['per_page']   = 5;
        $config['num_links']  = 5;
        $config['cur_page']   = empty($cur_page)?0:$cur_page;
        $config['show_count'] = false;

        $CI->ajax_pagination->initialize($config);
	}

}
?>
