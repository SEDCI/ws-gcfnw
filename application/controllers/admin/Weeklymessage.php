<?php
class Weeklymessage extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		$this->load->helper('loadview');
		$this->load->library('email');
		$this->load->model('members_model');
		$this->load->model('weeklymessage_model');
	}

	public function showList()
	{
		$data['title'] = 'Weekly Message';
		$data['actlnk_weekly'] = ' class="gcf-active"';
		$data['pagemsg'] = $this->session->flashdata('pagemsg');

		$data['allmessages'] = $this->weeklymessage_model->getAllmessages();

		load_view_admin('pages/weeklymessagelist', $data, 'pages_nav');
	}

	public function viewMessage($message_id)
	{
		$data['title'] = 'Weekly Message';
		$data['actlnk_weekly'] = ' class="gcf-active"';
		$data['message_id'] = $message_id;

		$data['message'] = $this->weeklymessage_model->getMessage($message_id);
		$data['comments'] = $this->weeklymessage_model->getAllcomments($message_id);

		load_view_admin('pages/weeklymessageview', $data, 'pages_nav');
	}

	public function addMessage()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');

		$this->form_validation->set_rules('wmverse', 'Verse', 'trim|required');
		$this->form_validation->set_rules('wmmessage', 'Message', 'trim|required');

		if ($this->input->post()) {
			if ($this->form_validation->run() === true) {
				$upload_error = array();
				$ppt_filename = '';
				$ios_filename = '';
				$pdf_filename = '';
				$doc_filename = '';

				$config['upload_path'] = './files/weeklymessage/';
				$config['file_ext_tolower'] = true;
				$config['encrypt_name'] = true;

				if ($_FILES['wmfileppt']['name'] != '' && $_FILES['wmfileppt']['size'] > 0) {
					$config['allowed_types'] = 'ppt|pptx';

					$this->upload->initialize($config);

					if (!$this->upload->do_upload('wmfileppt')) {
						$upload_error['ppt'] = $this->upload->display_errors();
					} else {
						$ppt_filename = $this->upload->data('file_name');
					}
				}

				if ($_FILES['wmfileios']['name'] != '' && $_FILES['wmfileios']['size'] > 0) {
					$config['allowed_types'] = 'ppt';

					$this->upload->initialize($config);

					if (!$this->upload->do_upload('wmfileios')) {
						$upload_error['ios'] = $this->upload->display_errors();
					} else {
						$ios_filename = $this->upload->data('file_name');
					}
				}

				if ($_FILES['wmfilepdf']['name'] != '' && $_FILES['wmfilepdf']['size'] > 0) {
					$config['allowed_types'] = 'pdf';

					$this->upload->initialize($config);

					if (!$this->upload->do_upload('wmfilepdf')) {
						$upload_error['pdf'] = $this->upload->display_errors();
					} else {
						$pdf_filename = $this->upload->data('file_name');
					}
				}

				if ($_FILES['wmfiledoc']['name'] != '' && $_FILES['wmfiledoc']['size'] > 0) {
					$config['allowed_types'] = 'doc|docx';

					$this->upload->initialize($config);

					if (!$this->upload->do_upload('wmfiledoc')) {
						$upload_error['doc'] = $this->upload->display_errors();
					} else {
						$doc_filename = $this->upload->data('file_name');
					}
				}

				if (empty($upload_error)) {
					$message_data = array(
						'verse' => $this->input->post('wmverse'),
						'content' => $this->input->post('wmmessage'),
						'ppt_file' => $ppt_filename,
						'ios_file' => $ios_filename,
						'pdf_file' => $pdf_filename,
						'doc_file' => $doc_filename,
						'date_added' => date('Y-m-d H:i:s')
					);

					$this->weeklymessage_model->saveMessage($message_data);
		
					$this->session->set_flashdata('pagemsg', '<div class="alert alert-success">A message has been successfully added.</div>');

					redirect('admin/pages/weeklymessage');
				} else {
					$data['pagemsg'] = '<div class="alert alert-danger">'.implode($upload_error).'</div>';
				}
			} else {
				$data['pagemsg'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		$data['title'] = 'Add Weekly Message';
		$data['actlnk_weekly'] = ' class="gcf-active"';

		load_view_admin('pages/weeklymessageform', $data, 'pages_nav');
	}

	public function editMessage($message_id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');

		$data['message'] = $this->weeklymessage_model->getMessage($message_id);

		if ($this->input->post()) {
			$this->form_validation->set_rules('wmverse', 'Verse', 'trim|required');
			$this->form_validation->set_rules('wmmessage', 'Message', 'trim|required');

			if ($this->form_validation->run() === true) {
				$upload_error = array();
				$ppt_filename = $data['message']['ppt_file'];
				$ios_filename = $data['message']['ios_file'];
				$pdf_filename = $data['message']['pdf_file'];
				$doc_filename = $data['message']['doc_file'];

				$config['upload_path'] = './files/weeklymessage/';
				$config['file_ext_tolower'] = true;
				$config['encrypt_name'] = true;


				/**
				 * Upload/Remove Powerpoint
				 *
				 */
				if (isset($_FILES['wmfileppt'])) {
					if ($_FILES['wmfileppt']['name'] != '' && $_FILES['wmfileppt']['size'] > 0) {
						$config['allowed_types'] = 'ppt|pptx';

						$this->upload->initialize($config);

						if (!$this->upload->do_upload('wmfileppt')) {
							$upload_error['ppt'] = $this->upload->display_errors();
						} else {
							$ppt_filename = $this->upload->data('file_name');
						}
					} else {
						if (!empty($ppt_filename)) {
							unlink($config['upload_path'].$ppt_filename);
						}

						$ppt_filename = '';
					}
				}

				/**
				 * Upload/Remove iOS Presentation
				 *
				 */
				if (isset($_FILES['wmfileios'])) {
					if ($_FILES['wmfileios']['name'] != '' && $_FILES['wmfileios']['size'] > 0) {
						$config['allowed_types'] = 'pdf';

						$this->upload->initialize($config);

						if (!$this->upload->do_upload('wmfileios')) {
							$upload_error['ios'] = $this->upload->display_errors();
						} else {
							$ios_filename = $this->upload->data('file_name');
						}
					} else {
						if (!empty($ios_filename)) {
							unlink($config['upload_path'].$ios_filename);
						}

						$ios_filename = '';
					}
				}

				/**
				 * Upload/Remove PDF
				 *
				 */
				if (isset($_FILES['wmfilepdf'])) {
					if ($_FILES['wmfilepdf']['name'] != '' && $_FILES['wmfilepdf']['size'] > 0) {
						$config['allowed_types'] = 'pdf';

						$this->upload->initialize($config);

						if (!$this->upload->do_upload('wmfilepdf')) {
							$upload_error['pdf'] = $this->upload->display_errors();
						} else {
							$pdf_filename = $this->upload->data('file_name');
						}
					} else {
						if (!empty($pdf_filename)) {
							unlink($config['upload_path'].$pdf_filename);
						}

						$pdf_filename = '';
					}
				}

				/**
				 * Upload/Remove Word Document
				 *
				 */
				if (isset($_FILES['wmfiledoc'])) {
					if ($_FILES['wmfiledoc']['name'] != '' && $_FILES['wmfiledoc']['size'] > 0) {
						$config['allowed_types'] = 'doc|docx';

						$this->upload->initialize($config);

						if (!$this->upload->do_upload('wmfiledoc')) {
							$upload_error['doc'] = $this->upload->display_errors();
						} else {
							$doc_filename = $this->upload->data('file_name');
						}
					} else {
						if (!empty($doc_filename)) {
							unlink($config['upload_path'].$doc_filename);
						}

						$doc_filename = '';
					}
				}

				if (empty($upload_error)) {
					$message_data = array(
						'verse' => $this->input->post('wmverse'),
						'content' => $this->input->post('wmmessage'),
						'ppt_file' => $ppt_filename,
						'ios_file' => $ios_filename,
						'pdf_file' => $pdf_filename,
						'doc_file' => $doc_filename
					);

					$this->weeklymessage_model->updateMessage($message_id, $message_data);
		
					$this->session->set_flashdata('pagemsg', '<div class="alert alert-success">A message has been successfully updated.</div>');

					redirect('admin/pages/weeklymessage');
				} else {
					$data['pagemsg'] = '<div class="alert alert-danger">'.implode($upload_error).'</div>';
				}
			} else {
				$data['pagemsg'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		$data['title'] = 'Edit Weekly Message';
		$data['actlnk_weekly'] = ' class="gcf-active"';
		$data['wmid'] = $message_id;

		load_view_admin('pages/weeklymessageedit', $data, 'pages_nav');
	}

	public function removeMessage($message_id)
	{
		$message_data = $this->weeklymessage_model->getMessage($message_id);

		$this->weeklymessage_model->deleteMessage($message_id);

		if (!empty($message_data['ppt_file'])) {
			unlink('./files/weeklymessage/'.$message_data['ppt_file']);
		}

		if (!empty($message_data['ios_file'])) {
			unlink('./files/weeklymessage/'.$message_data['ios_file']);
		}

		if (!empty($message_data['pdf_file'])) {
			unlink('./files/weeklymessage/'.$message_data['pdf_file']);
		}

		if (!empty($message_data['doc_file'])) {
			unlink('./files/weeklymessage/'.$message_data['doc_file']);
		}

		redirect('admin/pages/weeklymessage');
	}

	public function showComments($message_id)
	{
		$this->weeklymessage_model->getAllcomments($message_id);
	}

	public function removeComment($comment_id)
	{
		$this->weeklymessage_model->deleteComment($comment_id, $this->session->userdata('adminuser'));
	}

	public function emailNotif($recipient, $subject, $message)
	{
		$this->email->from('no-reply@gcfnw.org', 'GCF-no-reply');
		$this->email->to($recipient);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
	}
}
