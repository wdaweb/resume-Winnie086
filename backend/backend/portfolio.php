
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$tstr[$do];?></p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody style="text-align:center">
                <tr class="dkb">

                    <td width="16%">分類</td>
                    <td width="18%">名稱</td>
                    <td width="20%">連結</td>
                    <td width="18%">圖片</td>
                    <td width="18%">描述</td>
                    <td width="5%">顯示</td>
                    <td width="5%">刪除</td>
                    <td></td>
                </tr>
                <?php
                 $all=$Portfolio->count();
                 $div=5;
                 $pages=ceil($all/$div);
                 $now=(isset($_GET['p']))?$_GET['p']:1;
                 $start=($now-1)*$div;
                 $rows=$Portfolio->all("limit $start,$div");

                $rows=$Portfolio->all();

                foreach($rows as $row){
                ?>
                <tr>

                    <td ><input type="text" name="category[]" value="<?=$row['category'];?>" style="width:95%"></td>
                    <td ><input type="text" name="name[]" value="<?=$row['name'];?>" style="width:95%"></td>
                    <td ><input type="text" name="href[]" value="<?=$row['href'];?>" style="width:95%"></td>
                    <td ><img src="./img/<?=$row['img'];?>"  style="width:100px;height:68px"  value="更換圖片" onclick="op('#cover','#cvr','./modal/change_img.php?table=<?=$do;?>&id=<?=$row['id'];?>')"></td>
                    <td >
                      <textarea name="text[]" type="text" style="width:7em;height:3em"><?=$row['text'];?></textarea>
                    </td>
                    <td ><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>></td>
                    <td ><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
                    <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

        <div class="cent">
      <?php
        if(($now-1)>0){
        ?>
      <a class="bl" style="font-size:30px;" href="?do=portfolio&p=<?=$now-1;?>">&lt;&nbsp;</a>
      <?php
        } 
        ?>
      <?php
        for($i=1;$i<=$pages;$i++){

            if($i==$now){
                $font="40px";
            }else{
                $font="30px";
            }

             echo "<a href='?do=portfolio&p=$i' style='font-size:$font;text-decoration:none'> ";
             echo $i;
             echo " </a>";
        }
      ?>
      <?php
        if($now+1<=$pages){
        ?>
      <a class="bl" style="font-size:30px;" href="?do=portfolio&p=<?=$now+1;?>">&nbsp;&gt;</a>
      <?php
        }
        ?>

    </div>





        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?=$do;?>">
                    <td width="200px">
                     <input type="button"
                            onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/<?=$do;?>.php?table=<?=$do;?>&#39;)"
                            value="<?=$addstr[$do];?>"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>