<?php

namespace App\Controllers;

use CodeIgniter\Files\File;
use App\Models\DataModel;

class Works extends BaseController
{
	
	protected $helpers = ['form', 'filesystem', 'directory'];
	
	private function generateDigitRandom($manyDigit){
		
		$X = $manyDigit;
	
	$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$generatedString = '';
	$charactersLength = strlen($characters);
	$angka1 = mt_rand(0, 9);
	$angka2 = mt_rand(0, 9);
	
	for ($i = 0; $i < $X; $i++) {
			
			$generatedString .= $characters[rand(0, $charactersLength - 1)];			
		}
		
		return $generatedString ;
	}
	
	private function renameFile($first, $last){
		
		$stat = false;
		
		if (rename($first, $last)) {
            $stat = true;
        } 
		
		return $stat;
		
	}
	
	public function displayFile(){
		
		$idGiven = $this->request->getGet('q');
		
		$filename = $idGiven . ".snpad";
		
		// pass the reference into Model (DB)
		$model = new DataModel();
		
		$result = $model->selectData($filename);

		$lang = 'plaintext';
		$data = array();
		
		if($result !== null){
			$foldername = WRITEPATH . "uploads/" . $result[0]->folder; 
			$konten = file_get_contents($foldername . "/" . $filename);
			
			$lang = $result[0]->language;
			$datena = $result[0]->date_created;
			$timestamp = strtotime($datena);

			// Format the output
			$date_created = date('l, j F Y, \a\t h:i a', $timestamp);

			if(strlen($idGiven) == 9){
				// this is nonsecured file
				// as the main doc says : the code would be 9 characters
				$decrypted = $this->decrypt($konten, self::$secretKey, self::$salt);
				$konten = $decrypted;
				// this is defined in css 
				$data['hide_btn'] = "btn_hide";

				// as we know non-secured
				$data['title'] = "Decryption Notes:";
				$data['status_data'] = "decrypted";
				
			}else{
				$data['title'] = "Encryption Notes:";
				$data['status_data'] = "encrypted";

				$data['hide_btn'] = "";
			}

			// store the next variable
			$data['konten'] 	= $konten;
			$data['q'] 			= $idGiven;
			$data['language'] 	= $lang;
			$data['date_created'] = $date_created;

			return view('viewer_page', $data);
		}
		
		
		echo "failed!";
	}
	
	private function convertShortURL($url) {
	
		return file_get_contents('http://tinyurl.com/api-create.php?url='.$url);
	
	}
	
	private function getOS() {
	$userAgent = $_SERVER['HTTP_USER_AGENT'];	
		
    $osList = [
        'Windows' => '(Windows NT|WinNT|Win16)',
        'Linux' => '(Linux|X11)',
        'Mac' => '(Mac_PowerPC|Macintosh|Mac)',
        'Unix' => '(UNIX)',
        'BSD' => '(BSD)',
        'Android' => '(Android)',
        'iOS' => '(iPhone|iPad|iPod)'
    ];
    foreach ($osList as $os => $pattern) {
        if (preg_match('/' . $pattern . '/i', $userAgent)) {
            return $os;
        }
    }
	
    return 'Unknown';

}
		
    public function sendFile()
    {

        $fileNa = $this->request->getFile('dokumen');

        if (! $fileNa->hasMoved()) {
			
			$dirPath = WRITEPATH . 'uploads/';
            $filepath =  $dirPath . $fileNa->store();
			$sevenDigitKode = $this->generateDigitRandom(7);
			$filerenamed = $sevenDigitKode . ".snpad";
			
			$newName = $fileNa->getTempName() . "/" . $filerenamed;

            $data = ['uploaded_fileinfo' => new File($filepath)];
			
			$this->renameFile($filepath, $newName);

			// pass the reference into Model (DB)
			$model = new DataModel();
		
			$ip = $this->request->getIPAddress();
			$os = $this->getOS();
			$fd = basename(rtrim($fileNa->getTempName(), "/"));
		
			$insertData = array(
				'folder' => $fd,
				'filename' => $filerenamed,
				'ip_address' => $ip,
				'os' 		=> $os
			);
			
			$insertedId = $model->insertData($insertData);
			
            //echo "Success!";
        }

        $aURL = "https://snpad.fgroupindonesia.com/view/?q=" . $sevenDigitKode;
        $finalURL = $this->convertShortURL($aURL);

 		$data = [
            'url' => $finalURL,
            'origin_url' => $aURL
        ];

         $this->response->setContentType('application/json');
         echo json_encode($data);

		//echo "<br> /?q=" . $sevenDigitKode;
		
       // $data = ['errors' => 'The file has already been moved.'];
	   //echo "<br>" . var_dump($data);
    }

    private static $secretKey = "MySecretKey";
    private static $salt = "MySalt";
    private static $keyLength = 256;
    private static $iterationCount = 65536;

	public function translate_to_code() {
		$someText = $this->request->getPost('text');

		// this is for non-secured request
		$mode = $this->request->getPost('mode');

		// get the content type
		$lan = $this->request->getPost('language');

			$data_lines = str_ireplace(['<p><br></p>', '<br/>', '<br />', '</p><p>', '<p>    </p>'], "\n", $someText);
			$datana = strip_tags($data_lines);
	        $encrypted = $this->encrypt($datana, self::$secretKey, self::$salt);
	        // return $encrypted;

 			// we store this message on both server (folder)
 			// and also DB (on the server)
 			$dateNow = date('Ymd');
 			$dirPath = WRITEPATH . 'uploads/';
            $filepath =  $dirPath . '/' . $dateNow;

			$sevenDigitKode = $this->generateDigitRandom(7);
			$nineDigitKode = $this->generateDigitRandom(9);

			$filerenamed = $sevenDigitKode . ".snpad";

			//echo var_dump($mode);

			// this is for non-secured request as the main character 9 digits
			if(isset($mode) && !empty($mode)){
				$filerenamed = $nineDigitKode . ".snpad";
			}
			
			$completePath = $filepath . '/' . $filerenamed;
			//echo $completePath;

			if (!is_dir($filepath)) {
			    mkdir($filepath, 0777, true);
			 }

			  // Create the file inside the directory
			  file_put_contents($completePath, $encrypted);

			// pass the reference into Model (DB)
			$model = new DataModel();
		
			$ip = $this->request->getIPAddress();
			$os = $this->getOS();
			$fd = $dateNow;
		
			$insertData = array(
				'folder' 	=> $fd,
				'filename' 	=> $filerenamed,
				'ip_address'=> $ip,
				'os' 		=> $os,
				'language' 	=> $lan
			);
			
			$insertedId = $model->insertData($insertData);

			$result = array();

        $result['status'] 	= 'success';
        $result['data'] 	= $encrypted;

      if(isset($mode) && !empty($mode)){
        	$result['q'] 		= $nineDigitKode;        
      }else{
			$result['q'] 		= $sevenDigitKode;        
      }

       echo json_encode($result);

    }

    public function update_passkey(){

    	$q = $this->request->getPost('q');
    	$pass = $this->request->getPost('passkey');
    	$fname = $q . ".snpad";

    	$data = array(
    		'passkey' => $pass
    	);

    	// pass the reference into Model (DB)
		$model = new DataModel();

		$dataRaw = $model->selectData($fname);
		$id = $dataRaw[0]->id;

		$resultData = $model->updateData($id, $data);

		if($resultData > 0){
			echo "success";
		}else{
			echo "none";
		}
		
    }

    public function translate_from_code() {
    	$someCode = $this->request->getPost('code');
    	$q = $this->request->getPost('q');
    	$pass = $this->request->getPost('passkey');

    	$filename = $q . ".snpad";
    	

    	// pass the reference into Model (DB)
			$model = new DataModel();

		$resultData = $model->selectData($filename);
		$mayWork = false;

		// as default
		$lang = 'plaintext';

		if($resultData != false){
			if($resultData[0]->passkey == $pass){
				$mayWork = true;
				$lang = $resultData[0]->language;
			}
		}


		if($mayWork){

		$decrypted = $this->decrypt($someCode, self::$secretKey, self::$salt);
        //return $decrypted;
    
	 		$result = array(
	        	'status' 	=> 'success',
	        	'data' 		=> $decrypted,
	        	'language' 	=> $lang
	        );

		}else{
			$result = array(
	        	'status' => 'failed',
	        	'data' => 'none'
	        );
		}
        

        echo json_encode($result);

    }

    private function encrypt($strToEncrypt, $secretKey, $salt) {
        $iv = openssl_random_pseudo_bytes(16);
        $ivspec = $iv;

        $key = hash_pbkdf2("sha256", $secretKey, $salt, self::$iterationCount, self::$keyLength / 8, true);
        $cipher = "AES-256-CBC";
        $options = 0;

        $encrypted = openssl_encrypt($strToEncrypt, $cipher, $key, $options, $ivspec);
        $encryptedData = $iv . $encrypted;
        return base64_encode($encryptedData);
    }

    private function decrypt($strToDecrypt, $secretKey, $salt) {
        $encryptedData = base64_decode($strToDecrypt);
        $iv = substr($encryptedData, 0, 16);
        $cipherText = substr($encryptedData, 16);

        $key = hash_pbkdf2("sha256", $secretKey, $salt, self::$iterationCount, self::$keyLength / 8, true);
        $cipher = "AES-256-CBC";
        $options = 0;

        $decrypted = openssl_decrypt($cipherText, $cipher, $key, $options, $iv);
        return $decrypted;
    }


}
