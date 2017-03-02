<?php


Class Customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_customer');
	}

	public function index()
	{

		

	}

	public function payment_confirmation($invoice_id = 0)
	{

		$this->form_validation->set_rules('amount', 'Amount Transferred', 'required|integer');
		$this->form_validation->set_rules('invoice_id', 'Invoice ID', 'required|integer');

		if ($this->form_validation->run() == FALSE)
		{

			if($this->input->post('invoice_id'))
			{

				$data['invoice_id'] = set_value('invoice_id');
			} else {

				$data['invoice_id'] = $invoice_id;
			}

			$this->load->view('customer/form_payment_confirmation',$data);
		} else {

			//proceed to mark the record on database table
			$isValid = $this->Model_customer->mark_invoice_confirmed(set_value('invoice_id'),
																			 set_value('amount'));

			if ($isValid) 
			{

				$this->session->set_flashdata('message','Thanks We Will check your payent confirmation');
				redirect('customer/shopping_history');
			} else {

				$this->session->set_flashdata('error', 'Wrong amount of invoice ID, please try again');
				redirect('customer/payment_confirmation/'. set_value('invoice_id'));
			}

			redirect('customer/shopping_history');
		}
	}

	public function shopping_history()
	{

		$user = $this->session->userdata('username');
		$data['history'] = $this->Model_customer->get_shopping_history($user);
		$this->load->view('customer/shopping_history_list', $data);
	}

}