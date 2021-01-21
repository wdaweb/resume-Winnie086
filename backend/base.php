<?php
date_default_timezone_set("Asia/Taipei");
session_start();

$Title=new DB("title");
$About=new DB("about");
$Ex=new DB("ex");
$Ex01=new DB("ex01");
$Skill=new DB("skill");
$Bottom=new DB("bottom");
$Auto=new DB("auto");
$Admin=new DB("admin");
$Portfolio=new DB("portfolio");
$Image=new DB("image");




$tstr=[
    'title'=>"管理照片",
    'about'=>"編輯關於我",
    'ex'=>"編輯學經歷",
    'ex01'=>"編輯學經歷",
    'skill'=>"技能表管理",
    'bottom'=>"頁尾文字",
    'auto'=>"管理自傳",
    'admin'=>"管理者管理",
    'portfolio'=>"作品集管理",
];
$addstr=[
    'title'=>"新增照片",
    'about'=>"新增動態文字",
    'ex'=>"新增經歷",
    'ex01'=>"新增學歷",
    'skill'=>"新增技能",
    'bottom'=>"新增頁尾版權文字",
    'auto'=>"新增自傳",
    'admin'=>"新增管理者",
    'portfolio'=>"新增作品",
];

$uploadimg=[
    'ex'=>['更換動畫圖片','動畫圖片'],
    'ex01'=>['更換動畫圖片','動畫圖片'],
    'title'=>['更新圖片','新照片新氣象'],

];



class DB{

    protected $table;
    protected $dsn="mysql:host=localhost;dbname=backend_resume;charset=utf8";
    // protected $dsn="mysql:host=localhost;dbname=s1090407;charset=utf8";
    protected $pdo;

    function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
        // $this->pdo=new PDO($this->dsn,'s1090407','s1090407');

    }

    function all(...$arg){
        $sql= " select * from $this->table ";

        if(isset($arg[0])){
            if(is_array($arg[0])){
                foreach($arg[0] as $key => $value){
                    $tmp[]=sprintf("`%s`='%s'",$key,$value);
                }

                $sql .= " where ".implode(" && ",$tmp);

            }else{
                $sql .= $arg[0];
            }
        }

        if(isset($arg[1])){
            $sql .= $arg[1];
        }

        return $this->pdo->query($sql)->fetchAll();

    }
    function count(...$arg){
        $sql=" select count(*) from $this->table ";

        if(isset($arg[0])){
            if(is_array($arg[0])){
                foreach($arg[0] as $key => $value){
                    $tmp[]=sprintf("`%s`='%s'",$key,$value);
                }

                $sql .= " where ".implode(" && ",$tmp);

            }else{
                $sql .= $arg[0];
            }
        }

        if(isset($arg[1])){
            $sql .= $arg[1];
        }

        return $this->pdo->query($sql)->fetchColumn();
    }
    function find($id){
        $sql=" select * from $this->table ";

        if(is_array($id)){
            foreach($id as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }

            $sql .= " where ".implode(" && ",$tmp);

        }else{
            $sql .= " where `id`='$id'";
        }
        

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function del($id){
        $sql="delete from $this->table ";

        if(is_array($id)){
            foreach($id as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }

            $sql .= " where ".implode(" && ",$tmp);

        }else{
            $sql .= " where `id`='$id'";
        }
        

        return $this->pdo->exec($sql);
    }
    function save($arr){
        if(isset($arr['id'])){
            //update
            foreach($arr as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }

            $sql=" update $this->table set ".implode(',',$tmp). " where `id`='{$arr['id']}' ";
        }else{
            //insert

            $sql=" insert into $this->table (`".implode("`,`",array_keys($arr))."`) values('".implode("','",$arr)."')";
        }
        // echo $sql;
        return $this->pdo->exec($sql);
    }
    function q($sql){
        return $this->pdo->query($sql)->fetchAll();
    }

    
}

function to($url){
    header("location:".$url);
}




?>