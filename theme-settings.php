<?php
/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @param $form
 *   The form.
 * @param $form_state
 *   The form state.
 */
function creative_responsive_theme_form_system_theme_settings_alter(&$form, &$form_state) {

  $form['prof_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Professional Theme Settings'),
    '#collapsible' => FALSE,
    '#collapsed' => FALSE,
  );
  $form['prof_settings']['breadcrumbs'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show breadcrumbs in a page'),
    '#default_value' => theme_get_setting('breadcrumbs','creative_responsive_theme'),
    '#description'   => t("Check this option to show breadcrumbs in page. Uncheck to hide."),
  );
  $form['prof_settings']['top_social_link'] = array(
    '#type' => 'fieldset',
    '#title' => t('Social links in header'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['prof_settings']['top_social_link']['social_links'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show social icons (Facebook, Twitter and RSS) in header'),
    '#default_value' => theme_get_setting('social_links', 'creative_responsive_theme'),
    '#description'   => t("Check this option to show twitter, facebook, rss icons in header. Uncheck to hide."),
  );
  $form['prof_settings']['top_social_link']['twitter_username'] = array(
    '#type' => 'textfield',
    '#title' => t('Twitter Username'),
    '#default_value' => theme_get_setting('twitter_username', 'creative_responsive_theme'),
    '#description' => t("Enter your Twitter username."),
  );
  $form['prof_settings']['top_social_link']['facebook_username'] = array(
    '#type' => 'textfield',
    '#title' => t('Facebook Username'),
    '#default_value' => theme_get_setting('facebook_username', 'creative_responsive_theme'),
    '#description' => t("Enter your Facebook username."),
  );


  $form['front_page_section_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Home Page Settings'),
    '#collapsible' => FALSE,
    '#collapsed' => FALSE,
  );

  $form['front_page_section_settings']['front_page_section_settings_content'] = array(
    '#type' => 'fieldset',
    '#title' => t('Custom section content'),
    '#collapsible' => FALSE,
    '#collapsed' => FALSE,
  );

  $form['front_page_section_settings']['front_page_section_settings_content']['front_page_section_settings_content_magazine_id'] = array(
    '#type' => 'textfield',
    '#title' => t('Custom section magainze id'),
    '#default_value' => theme_get_setting('front_page_section_settings_content_magazine_id', 'creative_responsive_theme'),
    '#description' => t("Enter magazine id"),
    '#attributes' => array('maxlength' => 128),
    '#maxlength' => 128,
    '#required' => TRUE,
  );

  $form['front_page_section_settings']['front_page_section_settings_content']['front_page_section_settings_content_magazine_article_title'] = array(
    '#type' => 'textfield',
    '#title' => t('Custom section magainze article title'),
    '#default_value' => theme_get_setting('front_page_section_settings_content_magazine_article_title', 'creative_responsive_theme'),
    '#description' => t("Enter magazine article title"),
    '#attributes' => array('maxlength' => 255),
    '#maxlength' => 255,
    '#required' => TRUE,
  );

  $form['front_page_section_settings']['front_page_section_settings_content']['front_page_section_settings_content_magazine_article_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Custom section magazine article url'),
    '#default_value' => theme_get_setting('front_page_section_settings_content_magazine_article_url', 'creative_responsive_theme'),
    '#description' => t("Enter magazine article url"),
    '#attributes' => array('maxlength' => 255),
    '#maxlength' => 255,
    '#required' => TRUE,
  );


  $form['front_page_section_settings']['front_page_section_settings_content']['front_page_section_settings_content_description'] = array(
    '#type' => 'textfield',
    '#title' => t('Custom section magazine description'),
    '#default_value' => theme_get_setting('front_page_section_settings_content_description', 'creative_responsive_theme'),
    '#description' => t("Enter magazine description"),
    '#attributes' => array('maxlength' => 255),
    '#maxlength' => 255,
  );

  $form['front_page_section_settings']['front_page_section_settings_content']['front_page_section_settings_content_magazine_author'] = array(
    '#type' => 'textfield',
    '#title' => t('Custom section magazine author'),
    '#default_value' => theme_get_setting('front_page_section_settings_content_magazine_author', 'creative_responsive_theme'),
    '#description' => t("Enter magazine author"),
    '#attributes' => array('maxlength' => 255),
    '#maxlength' => 255,
  );

  $form['front_page_section_settings']['front_page_section_settings_content']['front_page_section_settings_content_subs_promo'] = array(
    '#type' => 'textfield',
    '#title' => t('Custom section subs promo text'),
    '#default_value' => theme_get_setting('front_page_section_settings_content_subs_promo', 'creative_responsive_theme'),
    '#description' => t("Enter subs promo text"),
    '#attributes' => array('maxlength' => 255),
    '#maxlength' => 255,
  );

  $form['front_page_section_settings']['front_page_section_settings_content']['front_page_section_settings_content_subs_promo_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Custom section subs promo link'),
    '#default_value' => theme_get_setting('front_page_section_settings_content_subs_promo_link', 'creative_responsive_theme'),
    '#description' => t("Enter subs promo link"),
    '#attributes' => array('maxlength' => 255),
    '#maxlength' => 255,
  );


  $form['front_page_section_settings']['front_page_section_footer_paywall_image'] = array(
    '#type' => 'textfield',
    '#title' => t('Home page paywall image url'),
    '#default_value' => theme_get_setting('front_page_section_footer_paywall_image', 'creative_responsive_theme'),
    '#description' => t("Enter image url for paywall to be displayed in the footer"),
    '#attributes' => array('maxlength' => 255),
    '#maxlength' => 255,
  );

  


}


