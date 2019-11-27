<?php
function paywall_form($form, &$form_state) {
	$form['paywall_main'] = array(
	    '#type' => 'fieldset',
	    '#title' => t('Paywall main settings'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	  );

	$form['paywall_main']['paywall_main_subscribe_page'] = array(
		'#type' => 'textfield',
		'#title' => t('Subscribe Page Slug'),
		'#default_value' => variable_get('paywall_main_subscribe_page', ''),
		'#maxlength' => 255,
		'#size' => 128,
		'#description' => t('Enter Subscription page slug. e.g: subscription'),
		'#required' => TRUE,
	);

	$form['paywall_main']['paywall_main_student_subscribe_page'] = array(
		'#type' => 'textfield',
		'#title' => t('Student Subscribe Page Slug'),
		'#default_value' => variable_get('paywall_main_student_subscribe_page', ''),
		'#maxlength' => 255,
		'#size' => 128,
		'#description' => t('Enter Student Subscription page slug. e.g: subscription-student'),
		'#required' => TRUE,
	);

	$form['paywall_main']['paywall_main_subscribe_page_christmas'] = array(
		'#type' => 'checkbox',
		'#title' => '',
		'#default_value' => variable_get('paywall_main_subscribe_page_christmas', ''),
		'#field_prefix' => t('Main subscribe page for Christmas'),
		'#description' => t('Enable Christmas Main Subscribe page (also includes subscribeCLF).'),
	);

	$form['paywall_main']['paywall_main_subscribe_page_gift_offer'] = array(
		'#type' => 'checkbox',
		'#title' => '',
		'#default_value' => variable_get('paywall_main_subscribe_page_gift_offer', ''),
		'#field_prefix' => t('Gift offer for subscription page'),
		'#description' => t('Select for Subscription gift offer functionality.'),
	);

	$form['paywall_main']['paywall_main_subscribe_page_america'] = array(
	    '#type' => 'fieldset',
	    '#title' => t('Subscription page for America'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	  );

		$form['paywall_main']['paywall_main_subscribe_page_america']['paywall_main_subscribe_page_us'] = array(
			'#type' => 'textfield',
			'#title' => t('Subscribe Page for America'),
			'#default_value' => variable_get('paywall_main_subscribe_page_us', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter Subscription page for America. e.g: /us/subscription'),
		);

		$form['paywall_main']['paywall_main_subscribe_page_america']['paywall_main_student_subscribe_page_us'] = array(
			'#type' => 'textfield',
			'#title' => t('Student Subscribe Student Page '),
			'#default_value' => variable_get('paywall_main_student_subscribe_page_us', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter Student Subscription page for America. e.g: /us/subscription-student'),
		);


	$form['paywall_main']['paywall_main_icDomain'] = array(
		'#type' => 'textfield',
		'#title' => t('icDomain'),
		'#default_value' => variable_get('paywall_main_icDomain', ''),
		'#maxlength' => 255,
		'#size' => 128,
		'#description' => t('Enter evolok\'s icDomain. e.g: https://cmp.uat.evolok.net/ic/api'),
		'#required' => TRUE,
	);

	$form['paywall_main']['paywall_em_url'] = array(
		'#type' => 'textfield',
		'#title' => t('url'),
		'#default_value' => variable_get('paywall_em_url', ''),
		'#maxlength' => 255,
		'#size' => 128,
		'#description' => t('Enter evolok\'s meter URL. e.g: https://cmp.uat.evolok.net/acd/api/3.0'),
		'#required' => TRUE,
	);

	$form['paywall_main']['paywall_em_sidCookieDomain'] = array(
		'#type' => 'textfield',
		'#title' => t('sidCookieDomain'),
		'#default_value' => variable_get('paywall_em_sidCookieDomain', ''),
		'#maxlength' => 255,
		'#size' => 128,
		'#description' => t('Enter evolok\'s meter sidCookieDomain. e.g: .hiran-2-new-statesman.pantheonsite.io'),
		'#required' => TRUE,
	);

	$form['paywall_social'] = array(
	    '#type' => 'fieldset',
	    '#title' => t('Paywall social keys'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	  );

	$form['paywall_social']['paywall_social_icDomain'] = array(
		'#type' => 'textfield',
		'#title' => t('Social icDomain'),
		'#default_value' => variable_get('paywall_social_icDomain', ''),
		'#maxlength' => 255,
		'#size' => 128,
		'#description' => t('Enter icDomain for social. e.g: https://cmp.uat.evolok.net/evolok-idm-web/api'),
		'#required' => TRUE,
	);
/*
	$form['paywall_social']['paywall_social_redirectUri'] = array(
		'#type' => 'textfield',
		'#title' => t('Redirect URI'),
		'#default_value' => variable_get('paywall_social_redirectUri', ''),
		'#maxlength' => 255,
		'#size' => 128,
		'#description' => t('Enter redirect uri for social login. e.g: /my-account'),
		'#required' => TRUE,
	);
*/
	$form['paywall_social']['paywall_social_facebook'] = array(
		'#type' => 'textfield',
		'#title' => t('facebook'),
		'#default_value' => variable_get('paywall_social_facebook', ''),
		'#maxlength' => 255,
		'#size' => 128,
		'#description' => t('Enter facebook api key. e.g: 1871536649541722'),
		'#required' => FALSE,
	);

	$form['paywall_social']['paywall_social_google'] = array(
		'#type' => 'textfield',
		'#title' => t('google'),
		'#default_value' => variable_get('paywall_social_google', ''),
		'#maxlength' => 255,
		'#size' => 128,
		'#description' => t('Enter google api key. e.g: 953076679075-la44rrsmn4jqmqqoai4tb4c8h44fv7l9.apps.googleusercontent.com'),
		'#required' => FALSE,
	);

	$form['paywall_social']['paywall_social_twitter'] = array(
		'#type' => 'textfield',
		'#title' => t('twitter'),
		'#default_value' => variable_get('paywall_social_twitter', ''),
		'#maxlength' => 255,
		'#size' => 128,
		'#description' => t('Enter twitter api key.'),
		'#required' => FALSE,
	);

	$form['paywall_social']['paywall_social_linkedin'] = array(
		'#type' => 'textfield',
		'#title' => t('linkedin'),
		'#default_value' => variable_get('paywall_social_linkedin', ''),
		'#maxlength' => 255,
		'#size' => 128,
		'#description' => t('Enter linkedin api key. e.g: 953076679075-la44rrsmn4jqmqqoai4tb4c8h44fv7l9.apps.googleusercontent.com'),
		'#required' => FALSE,
	);

	$form['paywall_PM']['paywall_PM_stripeKey'] = array(
		'#type' => 'textfield',
		'#title' => t('Stripe Key'),
		'#default_value' => variable_get('paywall_PM_stripeKey', ''),
		'#maxlength' => 255,
		'#size' => 128,
		'#description' => t('Enter stripe key. e.g: pk_test_u1PiyRSnYl32b38YctzporQX'),
		'#required' => TRUE,
	);

  return system_settings_form($form);
}

function paywall_form_pm($form, &$form_state) {
	$form['paywall_PM'] = array(
	    '#type' => 'fieldset',
	    '#title' => t('Paywall product management'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	  );

	$form['paywall_PM']['paywall_PM_pmDomain'] = array(
		'#type' => 'textfield',
		'#title' => t('pmDomain'),
		'#default_value' => variable_get('paywall_PM_pmDomain', ''),
		'#maxlength' => 255,
		'#size' => 128,
		'#description' => t('Enter evolok\'s Product management pmDomain. e.g: https://cmp.uat.evolok.net/pm/api/v2'),
		'#required' => TRUE,
	);

	$form['paywall_PM']['paywall_PM_dd_plans'] = array(
		'#type' => 'textfield',
		'#title' => t('DirectDebit plans'),
		'#default_value' => variable_get('paywall_PM_dd_plans', ''),
		'#maxlength' => 255,
		'#size' => 128,
		'#description' => t('Enter Evolok\'s direct debit(goCardless) payment plan here, e.g. plan_1,plan_2,plan_3'),
		'#required' => FALSE,
	);

	$form['paywall_PM']['paywall_PM_offer'] = array(
	    '#type' => 'fieldset',
	    '#title' => t('Offers'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	  );

	$form['paywall_PM']['paywall_PM_offer']['paywall_PM_offer_print'] = array(
	    '#type' => 'fieldset',
	    '#title' => t('Print'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	  );

	  $form['paywall_PM']['paywall_PM_offer']['paywall_PM_offer_print']['paywall_PM_offer_print_name'] = array(
			'#type' => 'textfield',
			'#title' => t('Print offer Name'),
			'#default_value' => variable_get('paywall_PM_offer_print_name', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product Print ID. e.g: print_only_new_offer'),
			'#required' => TRUE,
		);

		$form['paywall_PM']['paywall_PM_offer']['paywall_PM_offer_print']['paywall_PM_offer_print_id'] = array(
			'#type' => 'textfield',
			'#title' => t('Print offer ID'),
			'#default_value' => variable_get('paywall_PM_offer_print_id', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product Print offer ID. e.g: 5be01dc125c6122705134d8b'),
			'#required' => TRUE,
		);

		$form['paywall_PM']['paywall_PM_offer']['paywall_PM_offer_print']['paywall_PM_offer_plans'] = array(
			'#type' => 'textfield',
			'#title' => t('Plan Name'),
			'#default_value' => variable_get('paywall_PM_offer_plans', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product plan names. e.g. plan_1'),
			'#required' => TRUE,
		);

	$form['paywall_PM']['paywall_PM_adult'] = array(
	    '#type' => 'fieldset',
	    '#title' => t('Adult'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	  );

	$form['paywall_PM']['paywall_PM_adult']['paywall_PM_adult_print'] = array(
	    '#type' => 'fieldset',
	    '#title' => t('Print'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	  );

		$form['paywall_PM']['paywall_PM_adult']['paywall_PM_adult_print']['paywall_PM_adult_print_name'] = array(
			'#type' => 'textfield',
			'#title' => t('Print Product Name'),
			'#default_value' => variable_get('paywall_PM_adult_print_name', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product Print ID. e.g: print_only'),
			'#required' => TRUE,
		);

		$form['paywall_PM']['paywall_PM_adult']['paywall_PM_adult_print']['paywall_PM_adult_print_id'] = array(
			'#type' => 'textfield',
			'#title' => t('Print Product ID'),
			'#default_value' => variable_get('paywall_PM_adult_print_id', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product Print ID. e.g: 5ace1a6725c6126c0eaf497c'),
			'#required' => TRUE,
		);

	$form['paywall_PM']['paywall_PM_adult']['paywall_PM_adult_print_digital'] = array(
	    '#type' => 'fieldset',
	    '#title' => t('Print & Digital'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	  );

		$form['paywall_PM']['paywall_PM_adult']['paywall_PM_adult_print_digital']['paywall_PM_adult_print_digital_name'] = array(
			'#type' => 'textfield',
			'#title' => t('Print & Digital Name'),
			'#default_value' => variable_get('paywall_PM_adult_print_digital_name', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product Print ID. e.g: Bundle'),
			'#required' => TRUE,
		);

		$form['paywall_PM']['paywall_PM_adult']['paywall_PM_adult_print_digital']['paywall_PM_adult_print_digital_id'] = array(
			'#type' => 'textfield',
			'#title' => t('Print & Digital ID'),
			'#default_value' => variable_get('paywall_PM_adult_print_digital_id', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product Print ID. e.g: 5ad5e44d25c61223d55b25cb'),
			'#required' => TRUE,
		);

	$form['paywall_PM']['paywall_PM_adult']['paywall_PM_adult_digital'] = array(
	    '#type' => 'fieldset',
	    '#title' => t('Digital'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	  );

		$form['paywall_PM']['paywall_PM_adult']['paywall_PM_adult_digital']['paywall_PM_adult_digital_name'] = array(
			'#type' => 'textfield',
			'#title' => t('Digital Product Name'),
			'#default_value' => variable_get('paywall_PM_adult_digital_name', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product Print ID. e.g: Digital_only_'),
			'#required' => TRUE,
		);

		$form['paywall_PM']['paywall_PM_adult']['paywall_PM_adult_digital']['paywall_PM_adult_digital_id'] = array(
			'#type' => 'textfield',
			'#title' => t('Digital Product ID'),
			'#default_value' => variable_get('paywall_PM_adult_digital_id', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product Print ID. e.g: 5acdfcdf25c6126c0eaf4964'),
			'#required' => TRUE,
		);

	$form['paywall_PM']['paywall_PM_student'] = array(
	    '#type' => 'fieldset',
	    '#title' => t('Student'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	  );

		$form['paywall_PM']['paywall_PM_student']['paywall_PM_student_print'] = array(
		    '#type' => 'fieldset',
		    '#title' => t('Print'),
		    '#collapsible' => FALSE,
		    '#collapsed' => FALSE,
		  );

			$form['paywall_PM']['paywall_PM_student']['paywall_PM_student_print']['paywall_PM_student_print_name'] = array(
				'#type' => 'textfield',
				'#title' => t('Print Product Name'),
				'#default_value' => variable_get('paywall_PM_student_print_name', ''),
				'#maxlength' => 255,
				'#size' => 128,
				'#description' => t('Enter evolok\'s Product Student print Name. e.g: print_only_student'),
				'#required' => TRUE,
			);

			$form['paywall_PM']['paywall_PM_student']['paywall_PM_student_print']['paywall_PM_student_print_id'] = array(
				'#type' => 'textfield',
				'#title' => t('Print ID'),
				'#default_value' => variable_get('paywall_PM_student_print_id', ''),
				'#maxlength' => 255,
				'#size' => 128,
				'#description' => t('Enter evolok\'s Product Student print ID. e.g: 5ace2dcf25c6126c0eaf4986'),
				'#required' => TRUE,
			);


		$form['paywall_PM']['paywall_PM_student']['paywall_PM_student_print_digital'] = array(
		    '#type' => 'fieldset',
		    '#title' => t('Print & Digital'),
		    '#collapsible' => FALSE,
		    '#collapsed' => FALSE,
		  );

			$form['paywall_PM']['paywall_PM_student']['paywall_PM_student_print_digital']['paywall_PM_student_print_digital_name'] = array(
				'#type' => 'textfield',
				'#title' => t('Print & Digital Name'),
				'#default_value' => variable_get('paywall_PM_student_print_digital_name', ''),
				'#maxlength' => 255,
				'#size' => 128,
				'#description' => t('Enter evolok\'s Product Student Print & Digital Name. e.g: student_bundle_'),
				'#required' => TRUE,
			);

			$form['paywall_PM']['paywall_PM_student']['paywall_PM_student_print_digital']['paywall_PM_student_print_digital_id'] = array(
				'#type' => 'textfield',
				'#title' => t('Print & Digital ID'),
				'#default_value' => variable_get('paywall_PM_student_print_digital_id', ''),
				'#maxlength' => 255,
				'#size' => 128,
				'#description' => t('Enter evolok\'s Product Student Print & Digital ID. e.g: 5ad5e6a025c61223d55b25d7'),
				'#required' => TRUE,
			);


		$form['paywall_PM']['paywall_PM_student']['paywall_PM_student_digital'] = array(
		    '#type' => 'fieldset',
		    '#title' => t('Digital'),
		    '#collapsible' => FALSE,
		    '#collapsed' => FALSE,
		  );

			$form['paywall_PM']['paywall_PM_student']['paywall_PM_student_digital']['paywall_PM_student_digital_name'] = array(
				'#type' => 'textfield',
				'#title' => t('Digital Product Name'),
				'#default_value' => variable_get('paywall_PM_student_digital_name', ''),
				'#maxlength' => 255,
				'#size' => 128,
				'#description' => t('Enter evolok\'s Product Student Digital Name. e.g: Student_digital'),
				'#required' => TRUE,
			);

			$form['paywall_PM']['paywall_PM_student']['paywall_PM_student_digital']['paywall_PM_student_digital_id'] = array(
				'#type' => 'textfield',
				'#title' => t('Digital Product ID'),
				'#default_value' => variable_get('paywall_PM_student_digital_id', ''),
				'#maxlength' => 255,
				'#size' => 128,
				'#description' => t('Enter evolok\'s Product Student Digital ID. e.g: 5ace110225c6126c0eaf4970'),
				'#required' => TRUE,
			);
			$form['paywall_PM']['paywall_PM_free'] = array(
				'#type' => 'fieldset',
				'#title' => t('Free Trails'),
				'#collapsible' => FALSE,
				'#collapsed' => FALSE,
			  );

			  $form['paywall_PM']['paywall_PM_free']['paywall_PM_free_digital'] = array(
				'#type' => 'fieldset',
				'#title' => t('Digital'),
				'#collapsible' => FALSE,
				'#collapsed' => FALSE,
			  );
	
				$form['paywall_PM']['paywall_PM_free']['paywall_PM_free_digital']['paywall_PM_free_digital_name'] = array(
					'#type' => 'textfield',
					'#title' => t('Digital Product Name'),
					'#default_value' => variable_get('paywall_PM_free_digital_name', ''),
					'#maxlength' => 255,
					'#size' => 128,
					//'#description' => t('Enter evolok\'s Product Free Trail Digital Name. e.g: Student_digital'),
					'#required' => TRUE,
				);
	
				$form['paywall_PM']['paywall_PM_free']['paywall_PM_free_digital']['paywall_PM_free_digital_id'] = array(
					'#type' => 'textfield',
					'#title' => t('Digital Product ID'),
					'#default_value' => variable_get('paywall_PM_free_digital_id', ''),
					'#maxlength' => 255,
					'#size' => 128,
					//'#description' => t('Enter evolok\'s Product Free Trail Digital ID. e.g: 5ace110225c6126c0eaf4970'),
					'#required' => TRUE,
				);
				
				
				
	$form['paywall_PM']['paywall_PM_election'] = array(
		'#type' => 'fieldset',
		'#title' => t('Election 2019'),
		'#collapsible' => FALSE,
		'#collapsed' => FALSE,
	  );

	$form['paywall_PM']['paywall_PM_election']['paywall_PM_election_print'] = array(
	    '#type' => 'fieldset',
	    '#title' => t('Print'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	  );

		$form['paywall_PM']['paywall_PM_election']['paywall_PM_election_print']['paywall_PM_election_print_name'] = array(
			'#type' => 'textfield',
			'#title' => t('Print Product Name'),
			'#default_value' => variable_get('paywall_PM_election_print_name', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product Print ID. e.g: print_only'),
			'#required' => TRUE,
		);

		$form['paywall_PM']['paywall_PM_election']['paywall_PM_election_print']['paywall_PM_election_print_id'] = array(
			'#type' => 'textfield',
			'#title' => t('Print Product ID'),
			'#default_value' => variable_get('paywall_PM_adult_print_id', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product Print ID. e.g: 5ace1a6725c6126c0eaf497c'),
			'#required' => TRUE,
		);

	$form['paywall_PM']['paywall_PM_election']['paywall_PM_election_print_digital'] = array(
	    '#type' => 'fieldset',
	    '#title' => t('Print & Digital'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	  );

		$form['paywall_PM']['paywall_PM_election']['paywall_PM_election_print_digital']['paywall_PM_election_print_digital_name'] = array(
			'#type' => 'textfield',
			'#title' => t('Print & Digital Name'),
			'#default_value' => variable_get('paywall_PM_election_print_digital_name', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product Print ID. e.g: Bundle'),
			'#required' => TRUE,
		);

		$form['paywall_PM']['paywall_PM_election']['paywall_PM_election_print_digital']['paywall_PM_election_print_digital_id'] = array(
			'#type' => 'textfield',
			'#title' => t('Print & Digital ID'),
			'#default_value' => variable_get('paywall_PM_election_print_digital_id', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product Print ID. e.g: 5ad5e44d25c61223d55b25cb'),
			'#required' => TRUE,
		);

	$form['paywall_PM']['paywall_PM_election']['paywall_PM_election_digital'] = array(
	    '#type' => 'fieldset',
	    '#title' => t('Digital'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	  );

		$form['paywall_PM']['paywall_PM_election']['paywall_PM_election_digital']['paywall_PM_election_digital_name'] = array(
			'#type' => 'textfield',
			'#title' => t('Digital Product Name'),
			'#default_value' => variable_get('paywall_PM_election_digital_name', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product Print ID. e.g: Digital_only_'),
			'#required' => TRUE,
		);

		$form['paywall_PM']['paywall_PM_election']['paywall_PM_election_digital']['paywall_PM_election_digital_id'] = array(
			'#type' => 'textfield',
			'#title' => t('Digital Product ID'),
			'#default_value' => variable_get('paywall_PM_election_digital_id', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product Print ID. e.g: 5acdfcdf25c6126c0eaf4964'),
			'#required' => TRUE,
		);


	/* Code for Britain Elects Product settings */
	
	$form['paywall_PM']['paywall_PM_Britain_Elects'] = array(
		'#type' => 'fieldset',
		'#title' => t('Britain Elects'),
		'#collapsible' => FALSE,
		'#collapsed' => FALSE,
	  );

	$form['paywall_PM']['paywall_PM_Britain_Elects']['paywall_PM_election_elects_print'] = array(
	    '#type' => 'fieldset',
	    '#title' => t('Print'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	  );

		$form['paywall_PM']['paywall_PM_Britain_Elects']['paywall_PM_election_elects_print']['paywall_PM_election_elects_print_name'] = array(
			'#type' => 'textfield',
			'#title' => t('Print Product Name'),
			'#default_value' => variable_get('paywall_PM_election_elects_print_name', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product Print ID. e.g: print_only'),
			'#required' => TRUE,
		);

		$form['paywall_PM']['paywall_PM_Britain_Elects']['paywall_PM_election_elects_print']['paywall_PM_election_elects_print_id'] = array(
			'#type' => 'textfield',
			'#title' => t('Print Product ID'),
			'#default_value' => variable_get('paywall_PM_election_elects_print_id', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product Print ID. e.g: 5ace1a6725c6126c0eaf497c'),
			'#required' => TRUE,
		);

	

	$form['paywall_PM']['paywall_PM_Britain_Elects']['paywall_PM_election_elects_digital'] = array(
	    '#type' => 'fieldset',
	    '#title' => t('Digital'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	  );

		$form['paywall_PM']['paywall_PM_Britain_Elects']['paywall_PM_election_elects_digital']['paywall_PM_election_elects_digital_name'] = array(
			'#type' => 'textfield',
			'#title' => t('Digital Product Name'),
			'#default_value' => variable_get('paywall_PM_election_elects_digital_name', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product Print ID. e.g: Digital_only_'),
			'#required' => TRUE,
		);

		$form['paywall_PM']['paywall_PM_Britain_Elects']['paywall_PM_election_elects_digital']['paywall_PM_election_elects_digital_id'] = array(
			'#type' => 'textfield',
			'#title' => t('Digital Product ID'),
			'#default_value' => variable_get('paywall_PM_election_elects_digital_id', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product Print ID. e.g: 5acdfcdf25c6126c0eaf4964'),
			'#required' => TRUE,
		);
	
	/*Code End for Britain Elects Product */

	/* Code For Podcast Offer */
	
	$form['paywall_PM']['paywall_PM_podcast_offer'] = array(
		'#type' => 'fieldset',
		'#title' => t('Podcast Offer'),
		'#collapsible' => FALSE,
		'#collapsed' => FALSE,
	  );

	$form['paywall_PM']['paywall_PM_podcast_offer']['paywall_PM_podcast_offer_print'] = array(
	    '#type' => 'fieldset',
	    '#title' => t('Print'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	  );

		$form['paywall_PM']['paywall_PM_podcast_offer']['paywall_PM_podcast_offer_print']['paywall_PM_podcast_offer_print_name'] = array(
			'#type' => 'textfield',
			'#title' => t('Print Product Name'),
			'#default_value' => variable_get('paywall_PM_podcast_offer_print_name', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product Print ID. e.g: print_only'),
			'#required' => TRUE,
		);

		$form['paywall_PM']['paywall_PM_podcast_offer']['paywall_PM_podcast_offer_print']['paywall_PM_podcast_offer_print_id'] = array(
			'#type' => 'textfield',
			'#title' => t('Print Product ID'),
			'#default_value' => variable_get('paywall_PM_podcast_offer_print_id', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product Print ID. e.g: 5ace1a6725c6126c0eaf497c'),
			'#required' => TRUE,
		);

	$form['paywall_PM']['paywall_PM_podcast_offer']['paywall_PM_podcast_offer_print_digital'] = array(
	    '#type' => 'fieldset',
	    '#title' => t('Print & Digital'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	  );

		$form['paywall_PM']['paywall_PM_podcast_offer']['paywall_PM_podcast_offer_print_digital']['paywall_PM_podcast_offer_print_digital_name'] = array(
			'#type' => 'textfield',
			'#title' => t('Print & Digital Name'),
			'#default_value' => variable_get('paywall_PM_podcast_offer_print_digital_name', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product Print ID. e.g: Bundle'),
			'#required' => TRUE,
		);

		$form['paywall_PM']['paywall_PM_podcast_offer']['paywall_PM_podcast_offer_print_digital']['paywall_PM_podcast_offer_print_digital_id'] = array(
			'#type' => 'textfield',
			'#title' => t('Print & Digital ID'),
			'#default_value' => variable_get('paywall_PM_podcast_offer_print_digital_id', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product Print ID. e.g: 5ad5e44d25c61223d55b25cb'),
			'#required' => TRUE,
		);

	$form['paywall_PM']['paywall_PM_podcast_offer']['paywall_PM_podcast_offer_digital'] = array(
	    '#type' => 'fieldset',
	    '#title' => t('Digital'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	  );

		$form['paywall_PM']['paywall_PM_podcast_offer']['paywall_PM_podcast_offer_digital']['paywall_PM_podcast_offer_digital_name'] = array(
			'#type' => 'textfield',
			'#title' => t('Digital Product Name'),
			'#default_value' => variable_get('paywall_PM_podcast_offer_digital_name', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product Print ID. e.g: Digital_only_'),
			'#required' => TRUE,
		);

		$form['paywall_PM']['paywall_PM_podcast_offer']['paywall_PM_podcast_offer_digital']['paywall_PM_podcast_offer_digital_id'] = array(
			'#type' => 'textfield',
			'#title' => t('Digital Product ID'),
			'#default_value' => variable_get('paywall_PM_podcast_offer_digital_id', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product Print ID. e.g: 5acdfcdf25c6126c0eaf4964'),
			'#required' => TRUE,
		);
		
		/* Code End for Podcast Offer */
	

		

	return system_settings_form($form);
}

function paywall_form_pm_america($form, &$form_state) {
	$form['paywall_PM_america'] = array(
	    '#type' => 'fieldset',
	    '#title' => t('Paywall product management for America'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	  );

	$form['paywall_PM_america']['paywall_PM_adult_us'] = array(
	    '#type' => 'fieldset',
	    '#title' => t('Adult'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	  );

		$form['paywall_PM_america']['paywall_PM_adult_us']['paywall_PM_adult_us_print_plan_names'] = array(
			'#type' => 'textfield',
			'#title' => t('Print Payment Plan Names'),
			'#default_value' => variable_get('paywall_PM_adult_us_print_plan_names', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product plan names. e.g: print_only_yearly_USA, print_12for12_quarterly'),
			'#required' => TRUE,
		);

		$form['paywall_PM_america']['paywall_PM_adult_us']['paywall_PM_adult_us_print_digital_plan_names'] = array(
			'#type' => 'textfield',
			'#title' => t('Print & Digital Payment Plan Names'),
			'#default_value' => variable_get('paywall_PM_adult_us_print_digital_plan_names', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product plan names. e.g: print_digital_yearly_USA'),
			'#required' => TRUE,
		);

		$form['paywall_PM_america']['paywall_PM_adult_us']['paywall_PM_adult_us_digital_plan_names'] = array(
			'#type' => 'textfield',
			'#title' => t('Digital Payment Plan Names'),
			'#default_value' => variable_get('paywall_PM_adult_us_digital_plan_names', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product plan names. e.g: digital_only_yearly_USA'),
			'#required' => TRUE,
		);

	$form['paywall_PM_america']['paywall_PM_student_us'] = array(
	    '#type' => 'fieldset',
	    '#title' => t('Student'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	  );

		$form['paywall_PM_america']['paywall_PM_student_us']['paywall_PM_student_us_print_plan_names'] = array(
			'#type' => 'textfield',
			'#title' => t('Print Payment Plan Names'),
			'#default_value' => variable_get('paywall_PM_student_us_print_plan_names', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product plan names. e.g: print_only_yearly_student_USA'),
			'#required' => FALSE,
		);

		$form['paywall_PM_america']['paywall_PM_student_us']['paywall_PM_student_us_print_digital_plan_names'] = array(
			'#type' => 'textfield',
			'#title' => t('Print & Digital Payment Plan Names'),
			'#default_value' => variable_get('paywall_PM_student_us_print_digital_plan_names', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product plan names. e.g: print_digital_yearly_student_USA'),
			'#required' => FALSE,
		);

		$form['paywall_PM_america']['paywall_PM_student_us']['paywall_PM_student_us_digital_plan_names'] = array(
			'#type' => 'textfield',
			'#title' => t('Digital Payment Plan Names'),
			'#default_value' => variable_get('paywall_PM_student_us_digital_plan_names', ''),
			'#maxlength' => 255,
			'#size' => 128,
			'#description' => t('Enter evolok\'s Product plan names. e.g: digital_only_student_USA'),
			'#required' => FALSE,
		);

	return system_settings_form($form);
}

function paywall_form_other_settings($form, &$form_state) {
	$form['paywall_other_settings_marketing'] = array(
	    '#type' => 'fieldset',
	    '#title' => t('Marketing options'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	  );

	$form['paywall_other_settings_marketing']['paywall_other_settings_marketing_newsletter_special'] = array(
		'#type' => 'textfield',
		'#title' => t('Newsletter special offer'),
		'#default_value' => variable_get('paywall_other_settings_marketing_newsletter_special', ''),
		'#maxlength' => 255,
		'#size' => 255,
		'#description' => t('Enter text for newsletter special offer. E.g. Send me exclusive offers from the New Statesman'),
		'#required' => TRUE,
	);

	$form['paywall_other_settings_marketing']['paywall_other_settings_marketing_newsletter_weekly'] = array(
		'#type' => 'textfield',
		'#title' => t('Newsletter weekly offer'),
		'#default_value' => variable_get('paywall_other_settings_marketing_newsletter_weekly', ''),
		'#maxlength' => 255,
		'#size' => 255,
		'#description' => t('Enter text for newsletter special offer. E.g. Send me the editor\'s Weekly Highlights email'),
		'#required' => TRUE,
	);

	$form['paywall_other_settings_marketing']['paywall_other_settings_marketing_newsletter_morning_call'] = array(
		'#type' => 'textfield',
		'#title' => t('Newsletter Morning call'),
		'#default_value' => variable_get('paywall_other_settings_marketing_newsletter_morning_call', ''),
		'#maxlength' => 255,
		'#size' => 255,
		'#description' => t('Enter text for newsletter special offer. E.g. Send me the Morning Call email from Stephen Bush'),
		'#required' => TRUE,
	);

	$form['paywall_other_settings_marketing']['paywall_other_settings_marketing_newsletter_culture'] = array(
		'#type' => 'textfield',
		'#title' => t('Newsletter Culture'),
		'#default_value' => variable_get('paywall_other_settings_marketing_newsletter_culture', ''),
		'#maxlength' => 255,
		'#size' => 255,
		'#description' => t('Enter text for newsletter special offer. E.g. Send me the Culture newsletter emails'),
		'#required' => TRUE,
	);


	$form['paywall_other_settings_captcha'] = array(
	    '#type' => 'fieldset',
	    '#title' => t('Captcha settings'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	  );

	$form['paywall_other_settings_captcha']['paywall_other_settings_captcha_site_key'] = array(
		'#type' => 'textfield',
		'#title' => t('Site key'),
		'#default_value' => variable_get('paywall_other_settings_captcha_site_key', ''),
		'#maxlength' => 255,
		'#size' => 255,
		'#description' => t('Enter site key. E.g. 6LcHrpAUAAAAAGAkDcosec3_d7Ssqggm8j9bz5e2'),
		'#required' => TRUE,
	);


  return system_settings_form($form);
}

?>