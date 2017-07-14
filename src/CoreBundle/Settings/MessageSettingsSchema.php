<?php
/* For licensing terms, see /license.txt */

namespace Chamilo\CoreBundle\Settings;

use Sylius\Bundle\SettingsBundle\Schema\SchemaInterface;
use Sylius\Bundle\SettingsBundle\Schema\SettingsBuilderInterface;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class MessageSettingsSchema
 * @package Chamilo\CoreBundle\Settings
 */
class MessageSettingsSchema extends AbstractSettingsSchema
{
    /**
     * {@inheritdoc}
     */
    public function buildSettings(SettingsBuilderInterface $builder)
    {
        $builder
            ->setDefaults(
                array(
                    'allow_message_tool' => 'true',
                    'allow_send_message_to_all_platform_users' => 'false',
                    'message_max_upload_filesize' => '20971520',

                )
            );
        $allowedTypes = array(
            'allow_message_tool' => array('string'),
            'message_max_upload_filesize' => array('string'),
        );
        $this->setMultipleAllowedTypes($allowedTypes, $builder);
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder)
    {
        $builder
            ->add('allow_message_tool', 'yes_no')
            ->add('allow_send_message_to_all_platform_users', 'yes_no')
            ->add('message_max_upload_filesize');
    }
}
