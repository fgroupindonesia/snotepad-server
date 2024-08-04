<?php

namespace App\Controllers;

use App\Models\DataModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('landing_page');
    }

    public function tutorialInstalasi(): string
    {
        return view('tutorial_instalasi');
    }

    public function tutorialPenggunaan(): string
    {
        return view('tutorial_penggunaan');
    }

     public function tutorialSettings(): string
    {
        return view('tutorial_settings');
    }
	
	public function random()
    {
    	 $this->response->setContentType('application/json');
       $data = [
            'name' => 'John Doe',
            'age' => 30,
            'email' => 'johndoe@example.com'
        ];

         echo json_encode($data);
    }

	 public function test()
    {
        return view('upload');
    }
	
	
	public function sendData(){
		$fd = "A";
		$fn = "B";
		$ip = "123";
		$os = "win";
		
		$model = new DataModel();
		
		$insertData = array(
			'folder' => $fd,
			'filename' => $fn,
			'ip_address' => $ip,
			'os' 		=> $os
		);
		
        $insertedId = $model->insertData($insertData);
	}
	
}
