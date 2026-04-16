<?php
/* Smarty version 3.1.36, created on 2020-10-16 21:28:36
  from '/var/www/html/surveyfotos.com/public_html/setup/templates/welcome.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f89bc24645608_21229150',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6f053e814a89137f6b9f0a55a1d77064200d917c' => 
    array (
      0 => '/var/www/html/surveyfotos.com/public_html/setup/templates/welcome.tpl',
      1 => 1602862105,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f89bc24645608_21229150 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript" src="assets/js/sections/welcome.js"><?php echo '</script'; ?>
>
<form id="welcome" action="?action=welcome" method="post">
<div>
    <h2><?php echo $_smarty_tpl->tpl_vars['_lang']->value['welcome'];?>
</h2>
    <?php echo $_smarty_tpl->tpl_vars['_lang']->value['welcome_message'];?>

    <br />
</div>

<?php if (@constant('MODX_SETUP_KEY') != '@traditional@') {?>
<p><?php echo $_smarty_tpl->tpl_vars['_lang']->value['config_key_change'];?>
</p>

<div id="cck-div">
    <h3><?php echo $_smarty_tpl->tpl_vars['_lang']->value['config_key'];?>
</h3>
    <p><small><?php echo $_smarty_tpl->tpl_vars['_lang']->value['config_key_override'];?>
</small></p>
    <div class="labelHolder">
        <label for="config_key"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['config_key'];?>
</label>
        <input type="text" name="config_key" id="config_key" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config_key']->value, ENT_QUOTES, 'UTF-8', true);?>
" style="width:250px" />
        <br />
        <?php if ($_smarty_tpl->tpl_vars['writableError']->value) {?>
        <span class="field_error"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['config_not_writable_err'];?>
</span>
        <?php }?>
    </div>
</div>
<?php }?>
<div class="setup_navbar">
    <input type="submit" name="proceed" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['next'];?>
" autofocus="autofocus" />
    <input type="button" onclick="MODx.go('language');" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['back'];?>
" />
</div>
</form>
<?php }
}
