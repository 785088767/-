<?php
defined('ABSPATH') or exit;
if ($_POST['update_pluginoptions'] == 'true') {
    live2d_options_update();
    echo '<div id="message" class="updated"><h4>设置已成功保存</a></h4></div>';
}
?>
<style>
    input[type='color']{
        width: 25px;
        height: 25px;
        padding: .1px 2px;
    }
    textarea{
        width: 60%;
        height: 230px;
    }
</style>
<div class="wrap">
<h2>PoiLive2D 插件控制面板</h2>
<form method="POST" action="">
<input type="hidden" name="update_pluginoptions" value="true" />
    <h3>基本设置</h3>
    <div style="margin-left: 50px">
        <input type="color" name="main-color" id="main-color" value="<?php echo get_option('live2d_maincolor'); ?>" /> 对话框主体颜色<p>
        <input type="checkbox" name="no-hitokoto" id="no-hitokoto" <?php echo get_option('live2d_nohitokoto'); ?> /> 关闭一言显示<p>
        <input type="checkbox" name="no-specialtip" id="no-specialtip" <?php echo get_option('live2d_nospecialtip'); ?> /> 关闭特殊显示<p>
    </div>
    <h3>高级设置</h3>
    <div style="margin-left: 50px">
    自定义提示<p> <textarea name="custom-msg" id="custom-msg"><?php echo get_option('live2d_custommsg'); ?></textarea>
    请自行校验json有效性，不需要的话请填写{}
    </div>
    <input type="submit" class="button-primary" value="保存设置" style="margin: 20px 0;" /> &nbsp; PoiLive2D 版本 <?php
    echo LIVE2D_VERSION; ?> &nbsp; 插件作者 <a href="https://daidr.me">戴兜</a> &nbsp; <a href="https://daidr.me/archives/code-176.html">点击获取最新版本 & 说明</a>
</form>

<?php
function live2d_options_update()
{
    update_option('live2d_maincolor', $_POST['main-color']);

    if ($_POST['no-hitokoto'] == 'on') {
        $display = 'checked';
    } else {
        $display = '';
    }
    update_option('live2d_nohitokoto', $display);

    if ($_POST['no-specialtip'] == 'on') {
        $display = 'checked';
    } else {
        $display = '';
    }
    update_option('live2d_nospecialtip', $display);
    update_option('live2d_custommsg', stripslashes($_POST['custom-msg']));
}
?>