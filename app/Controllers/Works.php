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
		
		if($result !== null){
			$foldername = WRITEPATH . "uploads/" . $result[0]->folder; 
			$konten = file_get_contents($foldername . "/" . $filename);
			$data = array('konten' => $konten);
			return view('viewer_page', $data);
		}
		
		
		echo "failed!";
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
			
            echo "Success!";
        }

		echo "<br> /?q=" . $sevenDigitKode;
		
       // $data = ['errors' => 'The file has already been moved.'];
	   //echo "<br>" . var_dump($data);
    }
}
