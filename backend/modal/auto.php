<h3>新增自傳</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
<table>
    <tr>
        <td>內容</td>
        <td><textarea name="text" id="" cols="50" rows="8"></textarea></td>
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