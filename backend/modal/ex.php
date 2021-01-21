<h3>新增經歷</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
<table>
    <tr>
        <td>時間</td>
        <td><input type="text" name="period" id=""></td>
    </tr>
    <tr>
        <td>單位</td>
        <td><input type="text" name="place" id=""></td>
    </tr>
    <tr>
        <td>內容</td>
        <td><textarea name="subject" id="" cols="30" rows="10"></textarea></td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="hidden" name="table" value="<?=$_GET['table'];?>">
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </td>

    </tr>
</table>
    
    

</form>