<?php
include_once "../base.php";

$table=$_POST['table'];
$db=new DB($table);

$data=[];
if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$_FILES['img']['name']);
    $data['img']=$_FILES['img']['name'];
}

if(!empty($_POST['text'])){

    $data['text']=$_POST['text'];
}

    switch($table){
        case "title":
            $data['sh']=0;
        break;

        case "admin":
            $data['acc']=$_POST['acc'];
            $data['pw']=$_POST['pw'];
        break;

        case "menu":
            $data['href']=$_POST['href'];
            $data['sh']=1;
        break;
        
        case "portfolio":
            $data['category']=$_POST['category'];
            $data['name']=$_POST['name'];
            $data['href']=$_POST['href'];
            $data['sh']=1;
        break;

        case "skill":
            $data['skill']=$_POST['skill'];
            $data['percent']=$_POST['percent'];
            $data['sh']=1;
            break;
            
        case "ex":
            $data['period']=$_POST['period'];
            $data['place']=$_POST['place'];
            $data['subject']=$_POST['subject'];
            $data['sh']=1;
            break;

        case "ex01":
            $data['period']=$_POST['period'];
            $data['place']=$_POST['place'];
            $data['subject']=$_POST['subject'];
            $data['sh']=1;
            break;

        default:
         $data['sh']=1;

    }



$db->save($data);

to("../backend.php?do=$table");

?>
