<?php
/* Smarty version 3.1.36, created on 2020-10-16 19:53:33
  from '/var/www/html/surveyfotos.com/public_html/setup/templates/database.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f89a5dda8c9e2_95067316',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ed64b3de0e268bbcc241b3ed3646c45d7181d1b' => 
    array (
      0 => '/var/www/html/surveyfotos.com/public_html/setup/templates/database.tpl',
      1 => 1602856375,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f89a5dda8c9e2_95067316 (Smarty_Internal_Template $_smarty_tpl) {
if ((($tmp = @$_smarty_tpl->tpl_vars['showHidden']->value)===null||$tmp==='' ? '' : $tmp)) {?>
    <?php echo '<script'; ?>
 type="text/javascript">MODx.showHidden = true;<?php echo '</script'; ?>
>
<?php }
echo '<script'; ?>
 type="text/javascript" src="assets/js/sections/database.js"><?php echo '</script'; ?>
>
<form id="install" action="?action=database" method="post">
    <h2><?php echo $_smarty_tpl->tpl_vars['_lang']->value['connection_title'];?>
</h2>

    <h3><?php echo $_smarty_tpl->tpl_vars['_lang']->value['connection_connection_and_login_information'];?>
</h3>

    <p><?php echo $_smarty_tpl->tpl_vars['_lang']->value['connection_connection_note'];?>
</p>

    <p class="error"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['error_message']->value)===null||$tmp==='' ? '' : $tmp);?>
</p>
    
    <div class="labelHolder">
        <label for="database-type"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['connection_database_type'];?>
</label>
        <select id="database-type" name="database_type" autofocus="autofocus">
            <option value="mysql"<?php if ((($tmp = @$_smarty_tpl->tpl_vars['config']->value['database_type'])===null||$tmp==='' ? '' : $tmp) == "mysql") {?> selected="selected"<?php }?>>mysql</option>
            <option value="sqlsrv"<?php if ((($tmp = @$_smarty_tpl->tpl_vars['config']->value['database_type'])===null||$tmp==='' ? '' : $tmp) == "sqlsrv") {?> selected="selected"<?php }?>>sqlsrv</option>
        </select>
        &nbsp;<span class="version-msg" id="database-type-error"></span>
    </div>
    <div class="labelHolder">
        <label for="database-server"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['connection_database_host'];?>
</label>
        <input id="database-server" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['config']->value['database_server'])===null||$tmp==='' ? '' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
" name="database_server" />
        &nbsp;<span class="field_error" id="database-server-error"></span>
    </div>
    <div class="labelHolder">
        <label for="database-user"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['connection_database_login'];?>
</label>
        <input id="database-user" name="database_user" value="" />
        &nbsp;<span class="field_error" id="database-user-error"></span>
    </div>
    <div class="labelHolder">
        <label for="database-password"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['connection_database_pass'];?>
</label>
        <input id="database-password" type="password" name="database_password"  value="" />
        &nbsp;<span class="field_error" id="database-password-error"></span>
    </div>
    <div class="labelHolder">
        <label for="dbase"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['connection_database_name'];?>
</label>
        <input id="dbase" value="" name="dbase" />
        &nbsp;<span class="field_error" id="dbase-error"></span>
    </div>
    <div class="labelHolder">
        <label for="table-prefix"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['connection_table_prefix'];?>
</label>
        <input id="table-prefix" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['config']->value['table_prefix'])===null||$tmp==='' ? '' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
" name="table_prefix" />
        &nbsp;<span class="field_error" id="tableprefix_error"></span>
    </div>
    <p>&rarr;&nbsp;<a href="javascript:void(0);" id="modx-testconn"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['db_test_conn_msg'];?>
</a></p>

    <div id="modx-db-step1-msg" class="modx-hidden2">
        <span><?php echo $_smarty_tpl->tpl_vars['_lang']->value['db_connecting'];?>
</span>&nbsp;<span class="connect-msg"></span>
    </div>
    <p id="modx-db-info">
        <br />- <?php echo $_smarty_tpl->tpl_vars['_lang']->value['mysql_version_server_start'];?>
<span id="modx-db-server-version"></span>
        <br />- <?php echo $_smarty_tpl->tpl_vars['_lang']->value['mysql_version_client_start'];?>
<span id="modx-db-client-version"></span>
    <hr />
    </p>
    <div id="modx-db-step2" class="modx-hidden2">
        <?php if ((($tmp = @$_smarty_tpl->tpl_vars['config']->value['database_type'])===null||$tmp==='' ? '' : $tmp) == "mysql") {?>
            <div class="labelHolder">
                <label for="database-connection-charset"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['connection_character_set'];?>
</label>
                <select id="database-connection-charset" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['database_connection_charset'], ENT_QUOTES, 'UTF-8', true);?>
" name="database_connection_charset"></select>
                &nbsp;<span class="field_error" id="database_connection_charset_error"></span>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['installmode']->value == 0) {?>
                <div class="labelHolder">
                    <label for="database-collation"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['connection_collation'];?>
</label>
                    <select id="database-collation" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['config']->value['database_collation'])===null||$tmp==='' ? '' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
" name="database_collation"></select>
                    &nbsp;<span class="field_error" id="database_collation_error"></span>
                </div>
            <?php }?>
        <?php }?>
        <br />
        <p>&rarr;&nbsp;<a href="javascript:void(0);" id="modx-testcoll"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['db_test_coll_msg'];?>
</a></p>

        <p id="modx-db-step2-msg" class="modx-hidden2"><span><?php echo $_smarty_tpl->tpl_vars['_lang']->value['db_check_db'];?>
</span>&nbsp;<span class="result"></span></p>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['installmode']->value == 0) {?>
        <div id="modx-db-step3" class="modx-hidden">
            <p class="title"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['connection_default_admin_user'];?>
</p>
            <p><?php echo $_smarty_tpl->tpl_vars['_lang']->value['connection_default_admin_note'];?>
</p>

            <div class="labelHolder">
                <label for="cmsadmin"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['connection_default_admin_login'];?>
</label>
                <input type="text" name="cmsadmin" id="cmsadmin" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['config']->value['cmsadmin'])===null||$tmp==='' ? '' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
" />
                &nbsp;<span class="field_error" id="cmsadmin_error"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['error_cmsadmin']->value)===null||$tmp==='' ? '' : $tmp);?>
</span>
            </div>
            <div class="labelHolder">
                <label for="cmsadminemail"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['connection_default_admin_email'];?>
</label>
                <input type="text" name="cmsadminemail" id="cmsadminemail" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['config']->value['cmsadminemail'])===null||$tmp==='' ? '' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
" />
                &nbsp;<span class="field_error" id="cmsadminemail_error"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['error_cmsadminemail']->value)===null||$tmp==='' ? '' : $tmp);?>
</span>
            </div>
            <div class="labelHolder">
                <label for="cmspassword"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['connection_default_admin_password'];?>
</label>
                <input type="password" id="cmspassword" name="cmspassword" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['config']->value['cmspassword'])===null||$tmp==='' ? '' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
" />
                &nbsp;<span class="field_error" id="cmspassword_error"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['error_cmspassword']->value)===null||$tmp==='' ? '' : $tmp);?>
</span>
            </div>
            <div class="labelHolder">
                <label for="cmspasswordconfirm"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['connection_default_admin_password_confirm'];?>
</label>
                <input type="password" id="cmspasswordconfirm" name="cmspasswordconfirm" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['config']->value['cmspasswordconfirm'])===null||$tmp==='' ? '' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
" />
                &nbsp;<span class="field_error" id="cmspasswordconfirm_error"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['error_cmspasswordconfirm']->value)===null||$tmp==='' ? '' : $tmp);?>
</span>
            </div>
        </div>
    <?php }?>
    <br />

    <?php if ((($tmp = @$_smarty_tpl->tpl_vars['config']->value['unpacked'])===null||$tmp==='' ? '' : $tmp) == 1) {?>
        <input type="hidden" id="unpacked" name="unpacked" value="1" />
    <?php }?>
    <?php if ((($tmp = @$_smarty_tpl->tpl_vars['config']->value['inplace'])===null||$tmp==='' ? '' : $tmp) == 1) {?>
        <input type="hidden" id="inplace" name="inplace" value="1" />
    <?php }?>
    <div class="setup_navbar">
        <input type="submit" name="proceed" id="modx-next" class="modx-hidden" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['next'];?>
" />
        <input type="button" onclick="MODx.go('options');" value="<?php echo $_smarty_tpl->tpl_vars['_lang']->value['back'];?>
" />
    </div>
</form>
<?php }
}
