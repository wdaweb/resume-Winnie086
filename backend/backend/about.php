<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli"><?=$tstr[$do];?></p>
  <form method="post" action="./api/edit.php">
    <table width="100%">
      <tbody>
                 <?php
                $rows=$About->all();

                foreach($rows as $row){
                ?>
      <tr>
        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
　      <td style="background:#173b6c;color:#fff;text-align:center;width:15%">生日</td>
　      <td><input type="text" name="birthday" value="<?=$row['birthday'];?>" style="width:80%"></td>
　      <td style="background:#173b6c;color:#fff;text-align:center;width:15%">畢業學校</td>
　      <td><input type="text" name="college" value="<?=$row['college'];?>" style="width:80%"></td>
　      </tr>

　      <tr>
　      <td style="background:#173b6c;color:#fff;text-align:center;width:15%">故鄉</td>
　      <td><input type="text" name="hometown" value="<?=$row['hometown'];?>" style="width:80%"></td>
　      <td style="background:#173b6c;color:#fff;text-align:center;width:15%">科系</td>
　      <td><input type="text" name="department" value="<?=$row['department'];?>" style="width:80%"></td>
　     </tr>

　      <tr>
　      <td style="background:#173b6c;color:#fff;text-align:center;width:15%">年齡</td>
　      <td><input type="text" name="age" value="<?=$row['age'];?>" style="width:80%"></td>
　      <td style="background:#173b6c;color:#fff;text-align:center;width:15%">Email</td>
　      <td><input type="text" name="email" value="<?=$row['email'];?>" style="width:80%"></td>
　     </tr>

　      <tr>
　      <td style="background:#173b6c;color:#fff;text-align:center;width:15%">簡短自我介紹</td>
        <td >
        <textarea name="intro" style="width:14.5em;height:9.4em"><?=$row['intro'];?></textarea>
        </td>
　     </tr>

       </tbody>

       <?php
         }
         ?>


    </table>
    <table style="margin:0 auto; width:70%;">
      <tbody>
        <tr>
          <input type="hidden" name="table" value="<?=$do;?>">
          <td class="cent"><input type="submit" value="修改確定">
          <input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>

  </form>
</div>