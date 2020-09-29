<?php

namespace App\Controllers\Snap;


use App\Libraries\Midtrans;
use App\Controllers\BaseController;



class Snap extends BaseController
{
    protected $options;
    protected $midtrans;
    public function __construct()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: PUT, GET, POST");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

        $this->midtrans = new Midtrans();
        $params = array('server_key' => 'Mid-server-cC02PaQTSi5AJewxI90aF8HT', 'production' => true);
        $this->midtrans->config($params);
        $this->loadHelpers('url');
    }

    public function index()
    {
        echo view('snap/index');
    }
    public function token()
    {
        $input = $this->request->getPost(null, FILTER_SANITIZE_STRING);


        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => $input['gross_amount'],
        );


        $item1_details = array(
            'id' =>  $input['id'],
            'price' => $input['price'],
            'quantity' => $input['quantity'],
            'name' => $input['name'],
        );


        $customer_details = array(
            'first_name'    => $input['first_name'],
            'last_name'     => "",
            'email'         => $input['email'],
            'phone'         => $input['phone'],
        );


        $credit_card['secure'] = true;


        $time = time();

        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'item_details'       => $item1_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card
        );
        $snapToken = $this->midtrans->getSnapToken($transaction_data);
        echo $snapToken;
    }
    public function finish()
    {
        echo view('donatur/pembayaran/pembayaran');
    }
}
