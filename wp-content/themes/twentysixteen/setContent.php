<?php function customSetting(){ ?>
<div class="wrap">
<h2>通用内容设置</h2>
<?php
if ($_POST['update_options']=='true') {//若提交了表单，则保存变量
    update_option('site-content', $_POST['site-content']);
    //若值为空，则删除这行数据
    if( empty($_POST['site-content']) ) delete_option('site-content' );
    echo '<div id="message" class="updated below-h2"><p>Saved!</p></div>';//保存完毕显示文字提示
}
//下面开始界面表单
?>
<form method="POST" action="">
    <input type="hidden" name="update_options" value="true" />
    <table class="form-table">
        <tr>
          <th scope="row">网站介绍</th>
          <td colspan="">网站描述：
              <textarea name="site-content"id="site-content" value="<?php echo get_option('site-content'); ?>"><?php echo get_option('site-content'); ?></textarea>
          </td>
        </tr>
    </table>
    <p><input type="submit" class="button-primary" name="admin_options" value="Update"/></p>
</form>
</div>
<?php //add_action('admin_menu', 'customSetting');
}
?>

<?php 
function customTrainingOrganization() {
?>
<div>
sd 第三方
</div>
<?php
}
?>