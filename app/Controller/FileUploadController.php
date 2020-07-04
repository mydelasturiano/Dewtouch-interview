<?php

class FileUploadController extends AppController {
	public function index() {
		$this->set('title', __('File Upload Answer'));

                if ($this->request->is('post')) {
                        $filename = $this->request->data['FileUpload']['file']['name'];
                        if(!empty($this->request->data['FileUpload']['file'])){
                                $upload_path = 'uploads/files/';
                                $upload_file = $upload_path . $filename;
                                if(move_uploaded_file($this->request->data['FileUpload']['file']['tmp_name'], $upload_file)){
                                        ini_set('auto_detect_line_endings',true);
                                        // Open the file for reading
                                        if (($handle = fopen($upload_file, "r")) !== FALSE){
                                                // Convert each line into the local $data variable
                                                $row = 1;
                                                while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) 
                                                {
                                                        if($row == 1){ $row++; continue; } 
                                                        // Read the data from a single line
                                                        $upload_data = array(
                                                                'name' => $data[0],
                                                                'email' => $data[1],
                                                                'created' => date('Y-m-d'),
                                                                'modified' => date('Y-m-d')
                                                        );
                                                        $this->FileUpload->saveAll($upload_data);
                                                        $upload_data = "";
                                                }       
                                                // Close the file
                                                fclose($handle);
                                        }
                                }
                        }
                }

		$file_uploads = $this->FileUpload->find('all');
		$this->set(compact('file_uploads'));
	}
}