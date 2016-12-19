<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*Модель логинов*/
/*
 Описание глобалов
^Test.VACUsers("admin","group")="administrator"
^Test.VACUsers("admin","password")="!1qazxsw2"
^Test.VACUsers("admin","fullname")="Администратор"


 * */

class Auth_model extends CI_Model
{
    public $cacheDB;


    public $UsersCache = 'Test.VACUsers';
    public $UsersTable = 'ipre_users';
    public $auth;


    public function __construct()
    {

        $this->dbMySQL = $this->load->database('mysql', TRUE);
        $this->load->helper('url');
        if($this->session->has_userdata('auth'))
        {
            $auth = $this->session->has_userdata('auth');
        }
        else
        {
            $auth=false;
        }
    }


//генератор паролей
    public function PassGen($max=10)
    {
        // Символы, которые будут использоваться в пароле.
        $chars="qazxswedcvfrtgbnhyujmkip23456789QAZXSWEDCVFRTGBNHYUJMKLP";
        // Количество символов в пароле.

        // Определяем количество символов в $chars
        $size=StrLen($chars)-1;

        // Определяем пустую переменную, в которую и будем записывать символы.
        $password=null;

        // Создаём пароль.
        while($max--)
            $password.=$chars[rand(0,$size)];

        // Выводим созданный пароль.
        return $password;
    }

    /*Проверка на существование юзера*/
    function IsUserExist($login)
    {
        $login=$this->security->xss_clean($login);
        $sql="select count(*) cc from ".$this->UsersTable." where login='".$login."'";

        $query = $this->dbMySQL->query($sql);
        $row=$query->result_array();
        $row = $row[0];
        if((int)$row['cc']>0) return true; else return false;
    }

    /*Вставляет юзера с рандомным паролем*/
    public function AddUser($login)
    {
        if(!$this->IsUserExist($login))
        {
            $login=$this->security->xss_clean($login);
            $data = array('login' => $login, 'password' => $this->PassGen());
            return $this->dbMySQL->query($this->dbMySQL->insert_string($this->UsersTable, $data));
        }
        else return false;
    }

    /*Вставляет юзера с рандомным паролем*/
    public function AddUserAlldata($arg)
    {
        if(!$this->IsUserExist($arg['login']))
        {

            return $this->dbMySQL->insert($this->UsersTable, ['login'=>$arg['login'],'password'=>$arg['password']]);
        }
        else return false;
    }



    public function GetAllUsers()
    {
        $sql="select * from ipre_users  order by login";
        $query = $this->dbMySQL->query($sql);
        return $query->result_array();
    }

    public function UserInfo()
    {
        return $this->auth;
    }

    public function IsLogin()
    {
        if($this->session->has_userdata('auth'))
        {
            return true;
        }
        else return false;
    }

    /*Проверка на существование юзера*/
    public function  GetUserByNameAndPassCache($username,$password)
    {
        $username=mb_convert_encoding($username,"Windows-1251","UTF-8");
        $password=mb_convert_encoding($password,"Windows-1251","UTF-8");
        $sql="select ".$this->UsersCache."_GetUser('$username','$password') a";

        $query = $this->cacheDB->query($sql);
        $row=$query->result_array();
        $row = $row[0]['a'];
        $row=mb_convert_encoding($row,"UTF-8","Windows-1251");
        $row=json_decode($row);
        return $row;
    }

    /*Проверка на существование юзера*/
    public function  GetUserByNameAndPass($username,$password)
    {
        $username=$this->security->xss_clean($username);
        $password=$this->security->xss_clean($password);
        $query = $this->dbMySQL->get_where('ipre_users', array('login' => $username,'password' => $password));


        $row=$query->result_array();

        $row = $row[0];
        $res = new stdClass();
        $res->login = $row['login'];
        $res->password = $row['password'];

        return $res;
    }
     /*Проверка на существование юзера*/
    public function  GetUserByName($username)
    {
        $res=array();
        $res['id']=0;

        $query = $this->dbMySQL->get_where('ipre_users', array('login' => $username));

        $row=$query->result_array();
        if(count($row)>0) $res=$row[0];

        return $res;
    }

    /*выдает имя зареганого пользователя*/
    function GetloginUser()
    {
        if($this->IsLogin())
        {
            return $this->session->username;
        }
        else return false;
    }

    function GetLogoutUrl()
    {
        return base_url('auth/logout');
    }

    public function GetUserByID($user_id)
    {
        $user_id=(int)$user_id;
        $sql="select * from ipre_users where (id='$user_id')";

        $query = $this->dbMySQL->query($sql);
        $row=$query->result_array();
        if(count($row>0))
        {
            $res = $row[0];
            $res['users_roots'] = array();
            $sql="select * from users_roots where user_root_id = ".$user_id;
            $query = $this->dbMySQL->query($sql);
            foreach($query->result_array() as $r)
            {
                $res['users_roots'][]=$r['user_id'];
            }
            return $res;
        }

        else return false;
    }

    public function UpdateUser($user_id,$arg)
    {
        $sql=array();
        if(isset($arg['password']))
        {
            $sql[]="UPDATE ipre_users SET password =".$this->dbMySQL->escape($arg['password'])
                ." where (id=".((int)($user_id)).")";
        }

        $sql_r_delete = "delete from users_roots where user_root_id = ".$user_id;
        $this->dbMySQL->query($sql_r_delete);

        if((isset($arg['users_roots']))and($arg['users_roots']!=''))
        {
            foreach(explode(",",$arg['users_roots']) as $rr)
            {
                $sql_r = "insert into users_roots (id,user_root_id,user_id) values (NULL,".$user_id.",".$rr.")";
                $this->dbMySQL->query($sql_r);
            }

        }

        foreach($sql as $s)
        {
            $this->dbMySQL->query($s);;
        }

    }

}