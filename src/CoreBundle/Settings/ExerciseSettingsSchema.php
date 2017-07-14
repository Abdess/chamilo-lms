<?php
/* For licensing terms, see /license.txt */

namespace Chamilo\CoreBundle\Settings;

use Sylius\Bundle\SettingsBundle\Schema\SchemaInterface;
use Sylius\Bundle\SettingsBundle\Schema\SettingsBuilderInterface;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class ExerciseSettingsSchema
 * @package Chamilo\CoreBundle\Settings
 */
class ExerciseSettingsSchema extends AbstractSettingsSchema
{
    /**
     * {@inheritdoc}
     */
    public function buildSettings(SettingsBuilderInterface $builder)
    {
        $builder
            ->setDefaults(
                array(
                    'exercise_min_score' => '0',
                    'exercise_max_score' => '20',
                    'enable_quiz_scenario' => 'true',
                    'allow_coach_feedback_exercises' => 'true',
                    'show_official_code_exercise_result_list' => 'false',
                    'email_alert_manager_on_new_quiz' => 'true',
                    'exercise_max_ckeditors_in_page' => '0',
                    'configure_exercise_visibility_in_course' => 'false',
                    'exercise_invisible_in_session' => 'false'
                )
            )
        ;
        $allowedTypes = array(
            'exercise_min_score' => array('string'),
            'exercise_max_score' => array('string'),
            'enable_quiz_scenario' => array('string'),
        );
        $this->setMultipleAllowedTypes($allowedTypes, $builder);
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder)
    {
        $builder
            ->add('exercise_min_score')
            ->add('exercise_max_score')
            ->add('enable_quiz_scenario', 'yes_no')
            ->add('allow_coach_feedback_exercises', 'yes_no')
            ->add('show_official_code_exercise_result_list', 'yes_no')
            ->add('email_alert_manager_on_new_quiz', 'yes_no')
            ->add('exercise_max_ckeditors_in_page')
            ->add('configure_exercise_visibility_in_course', 'yes_no')
            ->add('exercise_invisible_in_session', 'yes_no')
        ;
    }
}
