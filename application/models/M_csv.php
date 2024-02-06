<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_csv extends CI_Model
{

    public function read($url)

    {

        // $this->load->helper('file');
        $file_path = base_url($url); // Update with your CSV file path
        $csv_data = $this->read_csv_file($file_path);
        return $csv_data; // Output the array (you can handle it as needed)
        // if (file_exists($file_path)) {
        // } else {
        //     echo "CSV file not found.";
        // }
    }

    private function read_csv_file($file_path)
    {
        $csv_data = array();
        $handle = fopen($file_path, 'r');

        if ($handle !== FALSE) {
            while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
                $csv_data[] = $row;
            }

            fclose($handle);
        } else {
            echo "Error opening the CSV file.";
        }

        return $csv_data;
    }
}


/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */