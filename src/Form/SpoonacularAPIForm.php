<?php

/**
 * @file
 * Contains Drupal\recipe_nutrition\Form\SettingsForm.
 */

namespace Drupal\recipe_nutrition\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class SettingsForm.
 *
 * @package Drupal\recipe_nutrition\Form
 */
class SpoonacularAPIForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'recipe_nutrition.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'spoonacular_api_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('recipe_nutrition.settings');
    $form['spoonacular_api_key'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Enter Spoonacular API key'),
      '#default_value' => $config->get('spoonacular_api_key'),
    );
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('recipe_nutrition.settings')
      ->set('spoonacular_api_key', $form_state->getValue('spoonacular_api_key'))
      ->save();
  }

}