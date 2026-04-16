<?php
/* Smarty version 3.1.36, created on 2020-10-16 21:28:34
  from '/var/www/html/surveyfotos.com/public_html/setup/templates/footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f89bc2263d6f0_25238861',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b50f515f777db3b0be4484a07f050ddc72953f26' => 
    array (
      0 => '/var/www/html/surveyfotos.com/public_html/setup/templates/footer.tpl',
      1 => 1602862104,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f89bc2263d6f0_25238861 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/surveyfotos.com/public_html/core/model/smarty/plugins/modifier.replace.php','function'=>'smarty_modifier_replace',),));
?>
        </div>
        <!-- end content -->
        <div class="clear">&nbsp;</div>
    </div>
</div>

<!-- start footer -->
<div id="footer">
    <div id="footer-inner">
    <div class="container_12">
        <p><?php ob_start();
echo date('Y');
$_prefixVariable1 = ob_get_clean();
echo smarty_modifier_replace($_smarty_tpl->tpl_vars['_lang']->value['modx_footer1'],'[[+current_year]]',$_prefixVariable1);?>
</p>
        <p><?php echo $_smarty_tpl->tpl_vars['_lang']->value['modx_footer2'];?>
</p>
    </div>
    </div>
</div>

<div class="post_body">

</div>
<!-- end footer -->
</body>
</html><?php }
}
