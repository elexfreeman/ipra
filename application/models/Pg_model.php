<?php
/**
 * Created by PhpStorm.
 * User: cod_llo
 * Date: 11.03.16
 * Time: 17:11
 */
/*Модель для работой с Пациентом*/


class Pg_model extends CI_Model
{

    public $patient_table = 'ipre_patients';
    public $patient_xml_table = 'ipre_xml';

    public function __construct()
    {
        date_default_timezone_set('Europe/London');
        $this->load->helper('url');
        $this->dbpg = $this->load->database('pg', TRUE);
        $this->load->library(array('elex'));
    }


}
