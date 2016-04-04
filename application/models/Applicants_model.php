<?php
class Applicants_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function saveForm()
	{
		/**
		* Personal Information
		*/
		$last_application = $this->getLastapplication();
		$registration_number = (count($last_application) > 0) ? $last_application['registration_number'] + 1 : 1;
		$date_married = (empty($this->input->post('dmmonth')) && empty($this->input->post('dmday')) && empty($this->input->post('dmyear'))) ? null : nice_date($this->input->post('dmmonth').'-'.$this->input->post('dmday').'-'.$this->input->post('dmyear'), 'Y-m-d');
		$s_birthdate = (empty($this->input->post('sbdmonth')) && empty($this->input->post('sbdday')) && empty($this->input->post('sbdyear'))) ? null : nice_date($this->input->post('sbdmonth').'-'.$this->input->post('sbdday').'-'.$this->input->post('sbdyear'), 'Y-m-d');
		$civil_status_others = ($this->input->post('civilstatus') == 'O') ? $this->input->post('ocivilstatus') : '';

		$personal_info = array(
			'registration_code' => 'AM'.date('Ym'),
			'registration_number' => $registration_number,
			'last_name' => $this->input->post('lastname'),
			'first_name' => $this->input->post('firstname'),
			'middle_name' => $this->input->post('middlename'),
			'nick_name' => $this->input->post('nickname'),
			'home_address' => $this->input->post('homeaddress'),
			'date_of_birth' => nice_date($this->input->post('bdmonth').'-'.$this->input->post('bdday').'-'.$this->input->post('bdyear'), 'Y-m-d'),
			'place_of_birth' => $this->input->post('placeofbirth'),
			'home_number' => $this->input->post('homenumber'),
			'cellphone' => $this->input->post('cellphone'),
			'email_address' => $this->input->post('emailaddress'),
			'company_office' => $this->input->post('companyoffice'),
			'occupation' => $this->input->post('occupation'),
			'office_number' => $this->input->post('officenumber'),
			'fax' => $this->input->post('fax'),
			'office_email' => $this->input->post('officeemail'),
			'civil_status' => $this->input->post('civilstatus'),
			'civil_status_others' => $civil_status_others,
			'hobbies_skills' => $this->input->post('hobbyskill'),
			'date_first_visit' => $this->input->post('datefirstvisit'),
			'invited_by' => $this->input->post('invitedby'),
			'ministry_involvement' => implode(',', $this->input->post('ministry')),
			's_last_name' => $this->input->post('slastname'),
			's_first_name' => $this->input->post('sfirstname'),
			's_middle_name' => $this->input->post('smiddlename'),
			's_nick_name' => $this->input->post('snickname'),
			'date_married' => $date_married,
			's_birthdate' => $s_birthdate,
			'father_name' => $this->input->post('fathername'),
			'father_age' => $this->input->post('fatherage'),
			'mother_name' => $this->input->post('mothername'),
			'mother_age' => $this->input->post('motherage'),
			'date_received' => date('Y-m-d H:i:s'),
			'application_type' => $this->input->post('applicationtype'),
			'status' => 'N'
		);

		$this->db->insert('m_personal', $personal_info);
		$m_personal_id = $this->db->insert_id();

		/**
		* Children
		*/
		$cname = $this->input->post('cname');
		$cbirthday = $this->input->post('cbirthday');

		for ($c = 0; $c < count($cname); $c++) {
			if (!empty($cname[$c])) {
				$children = array(
					'm_personal_id' => $m_personal_id,
					'name' => $cname[$c],
					'birthdate' => nice_date($cbirthday[$c], 'Y-m-d')
				);

				$this->db->insert('m_children', $children);
			}
		}

		/**
		* Educational Background
		*/
		$school_levels_array = array('h', 'c', 'g', 'p');

		foreach ($school_levels_array as $school_level) {
			$nameschool = $this->input->post($school_level.'nameschool');
			$course = $this->input->post($school_level.'course');
			$incyears = $this->input->post($school_level.'incyears');

			for ($s = 0; $s < count($nameschool); $s++) {
				if (!empty($nameschool[$s])) {
					$education = array(
						'm_personal_id' => $m_personal_id,
						'level' => $school_level,
						'school_name' => $nameschool[$s],
						'course' => $course[$s],
						'inclusive_years' => $incyears[$s]
					);

					$this->db->insert('m_education', $education);
				}
			}
		}

		/**
		* Religious Background
		*/
		$religious = array(
			'm_personal_id' => $m_personal_id,
			'bg1_when' => ($this->input->post('rel1when')) ? nice_date($this->input->post('rel1when'), 'Y-m-d') : '',
			'bg1_where' => $this->input->post('rel1where'),
			'bg1_whom' => $this->input->post('rel1whom'),
			'bg2_yesno' => $this->input->post('rel2yesno'),
			'bg2_when' => ($this->input->post('rel2when')) ? nice_date($this->input->post('rel2when'), 'Y-m-d') : '',
			'bg2_where' => $this->input->post('rel2where'),
			'bg2_minister' => $this->input->post('rel2minister'),
			'bg3_church' => $this->input->post('rel3church'),
			'bg3_years' => $this->input->post('rel3years'),
			'bg3_pastor' => $this->input->post('rel3pastor'),
			'bg3_address' => $this->input->post('rel3address'),
			'bg3_telno' => $this->input->post('rel3telno'),
			'bg3_positions' => $this->input->post('rel3positions'),
			'bg4_reasons' => $this->input->post('rel4reasons'),
			'bg5_yesno' => $this->input->post('rel5yesno'),
			'bg5_question' => $this->input->post('rel5question')
		);

		$this->db->insert('m_religious', $religious);
	}

	public function getLastapplication()
	{
		$criteria = array('registration_code' => 'AM'.date('Ym'));
		$this->db->select('registration_number');
		$this->db->where($criteria);
		$this->db->order_by('registration_number', 'DESC');
		$this->db->limit(1, 0);
		$result = $this->db->get('m_personal');
		return $result->row_array();
	}

	public function getApplicationslist($criteria = '')
	{
		if (!empty($criteria)) {
			$this->db->where($criteria);
		}

		$this->db->select("CONCAT(registration_code,'-',LPAD(registration_number, 5, '0')) AS registration_id, last_name, first_name, middle_name, nick_name, home_address, cellphone, email_address");
		$this->db->order_by('application_date', 'DESC');
		$result = $this->db->get('m_personal');
		return $result->result_array();
	}

	public function getApplicantinfo($criteria)
	{
		if (!empty($criteria)) {
			$result_personal = $this->db->get_where('m_personal', $criteria);
			$result_personal = $result_personal->row_array();
			$m_personal_id = $result_personal['id'];

			$where = array('m_personal_id' => $m_personal_id);

			$result_children = $this->db->get_where('m_children', $where);

			$school_levels_array = array(
				'h' => 'High School',
				'c' => 'College',
				'g' => 'Graduate School',
				'p' => 'Post Graduate School'
			);

			foreach ($school_levels_array as $school_level => $school_level_label) {
				$where_education = array('m_personal_id' => $m_personal_id, 'level' => $school_level);
				$this->db->select('school_name, course, inclusive_years');
				$result = $this->db->get_where('m_education', $where_education);
				$result_education[$school_level_label] = $result->result_array();
			}

			$result_religious = $this->db->get_where('m_religious', $where);
			return array('personal' => $result_personal, 'children' => $result_children->result_array(), 'education' => $result_education, 'religious' => $result_religious->row_array());
		}

		return false;
	}

	public function getPersonal($criteria, $fields = '')
	{
		if (!empty($criteria)) {
			$this->db->where($criteria);

			if (!empty($fields)) {
				$this->db->select($fields);
			}

			$result = $this->db->get('m_personal');
			return $result->row_array();
		}

		return false;
	}

	public function updatePersonal($data, $criteria)
	{
		$this->db->where($criteria);
		return $this->db->update('m_personal', $data);
	}
}
