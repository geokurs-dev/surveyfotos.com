<?php
/* Smarty version 3.1.36, created on 2020-10-16 21:28:34
  from '/var/www/html/surveyfotos.com/public_html/setup/templates/language.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f89bc22635389_17300644',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f4ea39ee84e917a47e20164f0430abcd91dc59eb' => 
    array (
      0 => '/var/www/html/surveyfotos.com/public_html/setup/templates/language.tpl',
      1 => 1602862105,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f89bc22635389_17300644 (Smarty_Internal_Template $_smarty_tpl) {
?><form id="install" action="?" method="post">

<?php if ($_smarty_tpl->tpl_vars['restarted']->value) {?>
    <br class="clear" />
    <br class="clear" />
    <p class="note"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['restarted_msg'];?>
</p>
<?php }?>

<div class="setup_navbar" style="border-top: 0;">
    <p class="title"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['choose_language'];?>
:
        <select name="language" autofocus="autofocus">
            <?php echo $_smarty_tpl->tpl_vars['languages']->value;?>

    	</select>
    </p>

    <input type="submit" name="proceed" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['next'];?>
" />
</div>
</form>
<?php }
}
