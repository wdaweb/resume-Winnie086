<h3>新增作品</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
<table>
    <tr>
        <td>分類</td>
        <td><input type="text" name="category" id=""></td>
    </tr>
    <tr>
        <td>名稱</td>
        <td><input type="text" name="name" id=""></td>
    </tr>
    <tr>
        <td>連結</td>
        <td><input type="text" name="href" id="" style="width:18.5em"></td>
    </tr>
    <tr>
        <td>圖片</td>
        <td><input type="file" name="img" id=""></td>
    </tr>
    <tr>
        <td>作品描述</td>
        <td><textarea name="text" type="text" style="width:10em;height:4em"></textarea></td>

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
