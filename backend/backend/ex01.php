
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$tstr[$do];?></p>
        <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <h4 style="text-align:center">學歷</h4>
                <tr class="dkb">
                    <td width="30%">時間</td>
                    <td width="30%">單位</td>
                    <td width="30%">內容</td>
                    <td width="5%">顯示</td>
                    <td width="5%">刪除</td>
                </tr>
                
                <?php
                  $all=$Ex01->count();
                  $div=5;
                  $pages=ceil($all/$div);
                  $now=(isset($_GET['p']))?$_GET['p']:1;
                  $start=($now-1)*$div;
                  $rows=$Ex01->all(" limit $start,$div");

                $rows=$Ex01->all();

                foreach($rows as $row){
                ?>
                <tr>
                    <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                    <td><input style="width:98%" type="text" name="period[]" value="<?=$row['period'];?>";?></td>
                    <td><input style="width:98%" type="text" name="place[]" value="<?=$row['place'];?>";?></td>
                    <td><textarea name="subject[]" style="width:100%;height:4em"><?=$row['subject'];?></textarea> </td>
                    <td><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>></td>
                    <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
                </tr>

                <?php
                    }
                    ?>
        </table>
      
        
    <div class="cent">
      <?php
        if(($now-1)>0){
        ?>
      <a class="bl" style="font-size:30px;" href="?do=ex01&p=<?=$now-1;?>">&lt;&nbsp;</a>
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

             echo "<a href='?do=ex01&p=$i' style='font-size:$font;text-decoration:none'> ";
             echo $i;
             echo " </a>";
        }
      ?>
      <?php
        if($now+1<=$pages){
        ?>
      <a class="bl" style="font-size:30px;" href="?do=ex01&p=<?=$now+1;?>">&nbsp;&gt;</a>
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

  
</div>
</form>