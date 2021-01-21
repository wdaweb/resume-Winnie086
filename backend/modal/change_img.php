<?php include_once "../base.php";?>
<h3>更換作品集的照片</h3>
<hr>
<form action="./api/upload.php" method="post" enctype="multipart/form-data">
<table>
    <tr>
        <td><input type="file" name="img" id=""></td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="hidden" name="table" value="<?=$_GET['table'];?>">
            <input type="hidden" name="id" value="<?=$_GET['id'];?>">
            <input type="submit" value="修改">
            <input type="reset" value="重置">
        </td>

    </tr>
</table>
    
    

</form>
