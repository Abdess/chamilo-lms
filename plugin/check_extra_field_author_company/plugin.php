<?php
/**
 * This script is a configuration file for the date plugin. You can use it as a master for other platform plugins
 * (course plugins are slightly different).
 * These settings will be used in the administration interface for plugins (Chamilo configuration settings->Plugins).
 *
 * @package chamilo.plugin
 *
 * @author Julio Montoya <gugli100@gmail.com>
 */
/**
 * Plugin details (must be present).
 */

$plugin_info['title'] = 'Informes more';
$plugin_info['comment'] = "Comentario breve de lo que hace el plugin";
$plugin_info['version'] = '1.0'; // o la versión que corresponda
$plugin_info['author'] = 'Autor o autores que hayan participado en el desarrollo';

 /*
//the plugin configuration
$form = new FormValidator('add_cas_button_form');
$form->addElement('text', 'cas_button_label', 'CAS connexion title', '');
$form->addElement('text', 'cas_button_comment', 'CAS connexion description', '');
$form->addElement('text', 'cas_image_url', 'Logo URL if any (image, 50px height)');
$form->addButtonSave(get_lang('Save'), 'submit_button');
//get default value for form
$tab_default_add_cas_login_button_cas_button_label = api_get_setting('add_cas_login_button_cas_button_label');
$tab_default_add_cas_login_button_cas_button_comment = api_get_setting('add_cas_login_button_cas_button_comment');
$tab_default_add_cas_login_button_cas_image_url = api_get_setting('add_cas_login_button_cas_image_url');
$defaults = [];
if ($tab_default_add_cas_login_button_cas_button_label) {
    $defaults['cas_button_label'] = $tab_default_add_cas_login_button_cas_button_label['add_cas_login_button'];
}
if ($tab_default_add_cas_login_button_cas_button_comment) {
    $defaults['cas_button_comment'] = $tab_default_add_cas_login_button_cas_button_comment['add_cas_login_button'];
}
if ($tab_default_add_cas_login_button_cas_image_url) {
    $defaults['cas_image_url'] = $tab_default_add_cas_login_button_cas_image_url['add_cas_login_button'];
}
$form->setDefaults($defaults);
//display form
$plugin_info['settings_form'] = $form;
*/
