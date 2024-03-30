<?php

class download_helper
{
    
	/**
	 * Force Download
	 *
	 * Generates headers that force a download to happen
	 *
	 * @param	string	filename
	 * @param	mixed	the data to be downloaded
	 * @param	bool	whether to try and send the actual file MIME type
	 * @return	void
	 */
	function force_download($file)
	{
        
        // block any attempt to the filesystem
        if(isset($file))
        {

            $filename = urldecode($file);

        } 
        else 
        {

            $filename = NULL;

        } 

        // define error message
        $err = '<p style="color:#990000">Sorry, the file you are requesting is unavailable.</p>'; 
        if (!$filename) {

        // if variable $filename is NULL or false display the message
        echo $err;

        } else {

       $path = UPLOAD_DIR."/$filename";
        // check that file exists and is readable
        if (file_exists($path) && is_readable($path)) 
        {

        // get the file size and send the http headers
        $size = filesize($path);
        header('Content-Type: application/octet-stream');
        header('Content-Length: '.$size);
        header('Cache-Control: max-age=0');
        header('Content-Disposition: attachment; filename="'.$filename."");
        header('Content-Transfer-Encoding: binary');

        // open the file in binary read-only mode
        // display the error messages if the file can´t be opened
        $file = @ fopen($path, 'rb');

        if ($file) {

        // stream the file and exit the script when complete
        fpassthru($file);
        exit;

        } else {

        echo $err;

        }

        } else {

        echo $err;

        }

        }
	}
}