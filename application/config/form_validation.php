<?php
$config = array(
	'member_data' => array(
		/*array(
			'field' => 'datereceived',
			'label' => 'Date received by Edifying Ministry',
			'rules' => 'trim|required|alpha_numeric|min_length[5]|max_length[20]|is_unique[registrants.username]',
			'errors' => array(
				'required' => 'required',
				'alpha_numeric' => 'alpha-numeric characters only',
				'min_length' => 'must have at least 5 characters',
				'max_length' => 'maximum of 20 characters only',
				'is_unique' => 'already in use'
			)
		),*/
		array(
			'field' => 'applicationtype',
			'label' => 'Membership Category',
			'rules' => array(
				'trim',
				'required',
				array(
					'valid_category',
					function ($str)
					{
						return ($str == 'B' || $str == 'T' || $str == 'M') ? true : false;
					}
				)
			),
			'errors' => array(
				'required' => 'required',
				'valid_gender' => 'invalid'
			)
		),
		// PERSONAL INFORMATION
		array(
			'field' => 'lastname',
			'label' => 'Last Name',
			//'rules' => 'trim|required|alpha_dash|min_length[2]|max_length[50]',
			'rules' => 'trim|required|min_length[2]|max_length[50]',
			'errors' => array(
				'required' => 'required',
				//'alpha_dash' => 'alpha-numeric, dash and underscore characters only',
				'min_length' => 'must have at least 2 characters',
				'max_length' => 'maximum of 50 characters only'
			)
		),
		array(
			'field' => 'firstname',
			'label' => 'First Name',
			//'rules' => 'trim|required|alpha_dash|min_length[2]|max_length[50]',
			'rules' => 'trim|required|min_length[2]|max_length[50]',
			'errors' => array(
				'required' => 'required',
				//'alpha_dash' => 'alpha-numeric, dash and underscore characters only',
				'min_length' => 'must have at least 2 characters',
				'max_length' => 'maximum of 50 characters only'
			)
		),
		array(
			'field' => 'middlename',
			'label' => 'Middle Name',
			//'rules' => 'trim|alpha_dash|min_length[2]|max_length[50]',
			'rules' => 'trim|min_length[2]|max_length[50]',
			'errors' => array(
				//'alpha_dash' => 'alpha-numeric, dash and underscore characters only',
				'min_length' => 'must have at least 2 characters',
				'max_length' => 'maximum of 50 characters only'
			)
		),
		array(
			'field' => 'nickname',
			'label' => 'Nickname',
			//'rules' => 'trim|alpha_dash|min_length[2]|max_length[30]',
			//'rules' => 'trim|min_length[2]|max_length[30]',
			'rules' => 'trim|max_length[30]',
			'errors' => array(
				//'alpha_dash' => 'alpha-numeric, dash and underscore characters only',
				//'min_length' => 'must have at least 2 characters',
				'max_length' => 'maximum of 30 characters only'
			)
		),
		array(
			'field' => 'homeaddress',
			'label' => 'Home Address',
			'rules' => 'trim|required|max_length[150]',
			'errors' => array(
				'required' => 'required',
				'max_length' => 'maximum of 150 characters only'
			)
		),
		array(
			'field' => 'bdmonth',
			'label' => 'Birthdate Month',
			'rules' => 'trim'
		),
		array(
			'field' => 'bdday',
			'label' => 'Birthdate Day',
			'rules' => 'trim|callback_checkBirthdate',
			'errors' => array(
				'required' => 'required',
				'checkBirthdate' => 'invalid date'
			)
		),
		array(
			'field' => 'bdyear',
			'label' => 'Birthdate Year',
			'rules' => 'trim'
		),
		array(
			'field' => 'placeofbirth',
			'label' => 'Place of Birth',
			'rules' => 'trim|required|max_length[150]',
			'errors' => array(
				'required' => 'required',
				'max_length' => 'maximum of 150 characters only'
			)
		),
		array(
			'field' => 'homenumber',
			'label' => 'Home Number',
			'rules' => 'trim|required|max_length[30]',
			'errors' => array(
				'required' => 'required',
				'max_length' => 'maximum of 30 characters only'
			)
		),
		array(
			'field' => 'cellphone',
			'label' => 'Cellphone',
			'rules' => 'trim|required|exact_length[11]',
			'errors' => array(
				'required' => 'required',
				'exact_length' => 'should be 11 characters'
			)
		),
		array(
			'field' => 'emailaddress',
			'label' => 'Personal E-Mail Address',
			//'rules' => 'trim|required|valid_email|is_unique[m_personal.email_address]',
			'rules' => 'trim|required|valid_email|callback_checkEmail',
			'errors' => array(
				'required' => 'required',
				'valid_email' => 'not a valid email',
				//'is_unique' => 'already in use'
				'checkEmail' => 'already in use'
			)
		),
		array(
			'field' => 'companyoffice',
			'label' => 'Company/Office',
			'rules' => 'trim'
		),
		array(
			'field' => 'occupation',
			'label' => 'Occupation',
			'rules' => 'trim'
		),
		array(
			'field' => 'officenumber',
			'label' => 'Office Number',
			'rules' => 'trim|max_length[30]',
			'errors' => array(
				'max_length' => 'maximum of 30 characters only'
			)
		),
		array(
			'field' => 'fax',
			'label' => 'Fax',
			'rules' => 'trim|max_length[15]',
			'errors' => array(
				'max_length' => 'maximum of 15 characters only'
			)
		),
		array(
			'field' => 'officeemail',
			'label' => 'Office E-Mail Address',
			'rules' => 'trim|valid_email',
			'errors' => array(
				'required' => 'required',
				'valid_email' => 'not a valid email'
			)
		),
		array(
			'field' => 'civilstatus',
			'label' => 'Civil Status',
			'rules' => array(
				'trim',
				'required',
				array(
					'valid_civilstatus',
					function ($str)
					{
						return ($str == 'S' || $str == 'M' || $str == 'O') ? true : false;
					}
				)
			),
			'errors' => array(
				'required' => 'required',
				'valid_civilstatus' => 'invalid'
			)
		),
		array(
			'field' => 'ocivilstatus',
			'label' => 'Other Civil Status',
			'rules' => 'trim|callback_checkOthercivilstatus',
			'errors' => array(
				'checkOthercivilstatus' => 'enter civil status'
			)
		),
		array(
			'field' => 'datefirstvisit',
			'label' => 'Date First Visited GCF',
			'rules' => 'trim'
		),
		array(
			'field' => 'invitedby',
			'label' => 'Invited By',
			'rules' => 'trim'
		),
		// FAMILY BACKGROUND
		array(
			'field' => 'slastname',
			'label' => 'Last Name',
			//'rules' => 'trim|alpha_dash|min_length[2]|max_length[50]',
			'rules' => 'trim|min_length[2]|max_length[50]',
			'errors' => array(
				//'alpha_dash' => 'alpha-numeric, dash and underscore characters only',
				'min_length' => 'must have at least 2 characters',
				'max_length' => 'maximum of 50 characters only'
			)
		),
		array(
			'field' => 'sfirstname',
			'label' => 'First Name',
			//'rules' => 'trim|alpha_dash|min_length[2]|max_length[50]',
			'rules' => 'trim|min_length[2]|max_length[50]',
			'errors' => array(
				//'alpha_dash' => 'alpha-numeric, dash and underscore characters only',
				'min_length' => 'must have at least 2 characters',
				'max_length' => 'maximum of 50 characters only'
			)
		),
		array(
			'field' => 'smiddlename',
			'label' => 'Middle Name',
			//'rules' => 'trim|alpha_dash|min_length[2]|max_length[50]',
			'rules' => 'trim|min_length[2]|max_length[50]',
			'errors' => array(
				//'alpha_dash' => 'alpha-numeric, dash and underscore characters only',
				'min_length' => 'must have at least 2 characters',
				'max_length' => 'maximum of 50 characters only'
			)
		),
		array(
			'field' => 'snickname',
			'label' => 'Nickname',
			//'rules' => 'trim|alpha_dash|min_length[2]|max_length[30]',
			//'rules' => 'trim|min_length[2]|max_length[30]',
			'rules' => 'trim|max_length[30]',
			'errors' => array(
				//'alpha_dash' => 'alpha-numeric, dash and underscore characters only',
				//'min_length' => 'must have at least 2 characters',
				'max_length' => 'maximum of 30 characters only'
			)
		),
		array(
			'field' => 'dmmonth',
			'label' => 'Marriage Month',
			'rules' => 'trim'
		),
		array(
			'field' => 'dmday',
			'label' => 'Marriage Day',
			'rules' => 'trim|callback_checkMarrieddate',
			'errors' => array(
				'checkMarrieddate' => 'invalid date'
			)
		),
		array(
			'field' => 'dmyear',
			'label' => 'Marriage Year',
			'rules' => 'trim'
		),
		array(
			'field' => 'sbdmonth',
			'label' => 'Spouse Birthdate Month',
			'rules' => 'trim'
		),
		array(
			'field' => 'sbdday',
			'label' => 'Spouse Birthdate Day',
			'rules' => 'trim|callback_checkSpousebirthdate',
			'errors' => array(
				'checkSpousebirthdate' => 'invalid date'
			)
		),
		array(
			'field' => 'sbdyear',
			'label' => 'Spouse Birthdate Year',
			'rules' => 'trim'
		),
		array(
			'field' => 'cname[]',
			'label' => 'Child Name',
			'rules' => 'trim'
		),
		array(
			'field' => 'cbirthday[]',
			'label' => 'Child Birthdate',
			'rules' => 'trim'
		),
		array(
			'field' => 'fathername',
			'label' => 'Father Name',
			'rules' => 'trim'
		),
		array(
			'field' => 'fatherage',
			'label' => 'Father Age',
			'rules' => 'trim'
		),
		array(
			'field' => 'mothername',
			'label' => 'Mother Name',
			'rules' => 'trim'
		),
		array(
			'field' => 'motherage[]',
			'label' => 'Mother Age',
			'rules' => 'trim'
		),
		array(
			'field' => 'hnameschool[]',
			'label' => 'Name of School',
			'rules' => 'trim'
		),
		array(
			'field' => 'hcourse[]',
			'label' => 'Course',
			'rules' => 'trim'
		),
		array(
			'field' => 'hincyears[]',
			'label' => 'Inclusive Years',
			'rules' => 'trim'
		),
		array(
			'field' => 'cnameschool[]',
			'label' => 'Name of School',
			'rules' => 'trim'
		),
		array(
			'field' => 'ccourse[]',
			'label' => 'Course',
			'rules' => 'trim'
		),
		array(
			'field' => 'cincyears[]',
			'label' => 'Inclusive Years',
			'rules' => 'trim'
		),
		array(
			'field' => 'gnameschool[]',
			'label' => 'Name of School',
			'rules' => 'trim'
		),
		array(
			'field' => 'gcourse[]',
			'label' => 'Course',
			'rules' => 'trim'
		),
		array(
			'field' => 'gincyears[]',
			'label' => 'Inclusive Years',
			'rules' => 'trim'
		),
		array(
			'field' => 'pnameschool[]',
			'label' => 'Name of School',
			'rules' => 'trim'
		),
		array(
			'field' => 'pcourse[]',
			'label' => 'Course',
			'rules' => 'trim'
		),
		array(
			'field' => 'pincyears[]',
			'label' => 'Inclusive Years',
			'rules' => 'trim'
		),
		array(
			'field' => 'rel1when',
			'label' => 'When did you receive Christ as your Savior?',
			'rules' => 'trim'
		),
		array(
			'field' => 'rel1where',
			'label' => 'Where?',
			'rules' => 'trim'
		),
		array(
			'field' => 'rel1whom',
			'label' => 'Through whom?',
			'rules' => 'trim'
		),
		array(
			'field' => 'rel2yesno',
			'label' => 'Have you been baptized by immersion?',
			'rules' => 'trim'
		),
		array(
			'field' => 'rel2when',
			'label' => 'When?',
			'rules' => 'trim'
		),
		array(
			'field' => 'rel2where',
			'label' => 'Where?',
			'rules' => 'trim'
		),
		array(
			'field' => 'rel2minister',
			'label' => 'Officiating Minister',
			'rules' => 'trim'
		),
		array(
			'field' => 'rel3church',
			'label' => 'Church Name',
			'rules' => 'trim'
		),
		array(
			'field' => 'rel3years',
			'label' => 'Inclusive Years',
			'rules' => 'trim'
		),
		array(
			'field' => 'rel3pastor',
			'label' => 'Pastor',
			'rules' => 'trim'
		),
		array(
			'field' => 'rel3address',
			'label' => 'Address',
			'rules' => 'trim'
		),
		array(
			'field' => 'rel3telno',
			'label' => 'Tel. No.',
			'rules' => 'trim'
		),
		array(
			'field' => 'rel3positions',
			'label' => 'Positions Held',
			'rules' => 'trim'
		),
		array(
			'field' => 'rel4reasons',
			'label' => 'Reason(s) for leaving your previous church and joining GCF?',
			'rules' => 'trim'
		),
		array(
			'field' => 'rel5yesno',
			'label' => 'Have you come to a point in your spiritual life that you know for sure that if you were to die today, you would get to heaven?',
			'rules' => 'trim'
		),
		array(
			'field' => 'rel5question',
			'label' => 'If you were to die today and stand before God, what would you tell Him if He asks you, why should I let you in to My heaven?',
			'rules' => 'trim'
		)

/*




		array(
			'field' => 'registerUsername',
			'label' => 'Username',
			'rules' => 'trim|required|alpha_numeric|min_length[5]|max_length[20]|is_unique[registrants.username]',
			'errors' => array(
				'required' => 'required',
				'alpha_numeric' => 'alpha-numeric characters only',
				'min_length' => 'must have at least 5 characters',
				'max_length' => 'maximum of 20 characters only',
				'is_unique' => 'already in use'
			)
		),
		array(
			'field' => 'registerPassword',
			'label' => 'Password',
			'rules' => 'trim|required|min_length[8]',
			'errors' => array(
				'required' => 'required',
				'min_length' => 'must have at least 8 characters'
			)
		),
		array(
			'field' => 'registerCpassword',
			'label' => 'Confirm Password',
			'rules' => 'trim|required|matches[registerPassword]',
			'errors' => array(
				'required' => 'required',
				'matches' => 'confirmation failed'
			)
		),
		array(
			'field' => 'registerName',
			'label' => 'Name',
			'rules' => 'trim|required|alpha_numeric_spaces|min_length[5]',
			'errors' => array(
				'required' => 'required',
				'alpha_numeric_spaces' => 'alpha-numeric characters and spaces only',
				'min_length' => 'must have at least 5 characters'
			)
		),
		array(
			'field' => 'registerAge',
			'label' => 'Age',
			'rules' => 'trim|required|integer|max_length[2]',
			'errors' => array(
				'required' => 'required',
				'integer' => 'alpha-numeric characters and spaces only',
				'max_length' => 'maximum of 2 characters only'
			)
		),
		array(
			'field' => 'registerEmail',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email|is_unique[registrants.email]',
			'errors' => array(
				'required' => 'required',
				'valid_email' => 'not a valid email',
				'is_unique' => 'already in use'
			)
		),
		array(
			'field' => 'registerGender',
			'label' => 'Gender',
			'rules' => array(
				'trim',
				'required',
				array(
					'valid_gender',
					function ($str)
					{
						return ($str == 'M' || $str == 'F') ? true : false;
					}
				)
			),
			'errors' => array(
				'required' => 'required',
				'valid_gender' => 'invalid'
			)
		),
		array(
			'field' => 'registerContact',
			'label' => 'Contact Number',
			'rules' => 'trim|required|numeric',
			'errors' => array(
				'required' => 'required',
				'numeric' => 'numeric characters only'
			)
		),*/
	)
);
		/*$this->form_validation->set_rules('registerUsername', 'Username', 'trim|required|alpha_numeric|min_length[5]|max_length[20]|is_unique[registrants.username]');
		$this->form_validation->set_rules('registerPassword', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('registerCpassword', 'Confirm Password', 'trim|required|matches[registerPassword]');
		$this->form_validation->set_rules('registerName', 'Name', 'trim|required|alpha_numeric_spaces|min_length[5]');
		$this->form_validation->set_rules('registerAge', 'Age', 'trim|required|integer|min_length[1]|max_length[2]');
		$this->form_validation->set_rules('registerEmail', 'Email', 'trim|required|valid_email|is_unique[registrants.email]');
		$this->form_validation->set_rules('registerGender', 'Gender', 'trim|required|alpha|exact_length[1]');
		$this->form_validation->set_rules('registerContact', 'Contact Number', 'trim|required|numeric');*/
