<?php
include "../base.php";
// print_r($_POST);
$table=$_POST['table'];
$db=new DB($table);

foreach($_POST['id'] as $key => $id){
    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){

        $db->del($id);

    }else{

        $row=$db->find($id);
        
        if(!empty($_POST['text'])){

            $row['text']=$_POST['text'][$key];
        }

        switch($table){
            case "title":
                $row['sh']=($id==$_POST['sh'])?1:0;
            break;

            case "about":
                $row['birthday']=$_POST['birthday'];
                $row['college']=$_POST['college'];
                $row['hometown']=$_POST['hometown'];
                $row['department']=$_POST['department'];
                $row['age']=$_POST['age'];
                $row['email']=$_POST['email'];
                $row['intro']=$_POST['intro'];
            break;
            
            case "ex":
                $row['period']=$_POST['period'][$key];
                $row['place']=$_POST['place'][$key];
                $row['subject']=$_POST['subject'][$key];
                $row['sh']=(in_array($id,$_POST['sh']))?1:0;
            break;
            
            case "ex01":
                $row['period']=$_POST['period'][$key];
                $row['place']=$_POST['place'][$key];
                $row['subject']=$_POST['subject'][$key];
                $row['sh']=(in_array($id,$_POST['sh']))?1:0;
            break;

            case "bottom":
                $row['bottom']=$_POST['bottom'];
            break;

            case "portfolio":
                $row['category']=$_POST['category'][$key];
                $row['name']=$_POST['name'][$key];
                $row['href']=$_POST['href'][$key];
                $row['text']=$_POST['text'][$key];
                $row['sh']=(in_array($id,$_POST['sh']))?1:0;
                $row['href']=$_POST['href'][$key];
            break;

            case "menu":
                $row['sh']=(in_array($id,$_POST['sh']))?1:0;
                $row['href']=$_POST['href'][$key];
            break;

            case "admin":
                $row['acc']=$_POST['acc'][$key];
                $row['pw']=$_POST['pw'][$key];
            break;

            case "skill":
                $row['skill']=$_POST['skill'][$key];
                $row['percent']=$_POST['percent'][$key];
                $row['sh']=(in_array($id,$_POST['sh']))?1:0;
            break;

            default:
            $row['sh']=(in_array($id,$_POST['sh']))?1:0;

        }

        /* 
        case "total":
            $row['total']=$_POST['total'];
        break;
        case "bottom":
            $row['bottom']=$_POST['bottom'];
        break; 
        
        可以改寫成
        case "total":
        case "bottom":    
            $row['$table]=$_POST[$table];
        break; */

        $db->save($row);

    }


}

// print_r($row);
to("../backend.php?do=$table");
?>
