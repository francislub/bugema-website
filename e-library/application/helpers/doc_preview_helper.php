<?php
class doc_preview_helper
{
    function display_document($file)
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
        return $err;
        }
        else
        {
       $path = UPLOAD_DIR."$filename";
       $urlPath = URL.$path;
        // check that file exists and is readable
        if (file_exists($path) && is_readable($path)) 
        {
        /*echo'
        <html>
            <head>
                <title>PREVIEW - '.$filename.'</title>
                <script src="../js/jquery-2.1.0.min.js"></script>
                <link  href="../css/bootstrap.min.css" rel="stylesheet">
                <link  href="viewer/viewer.min.css" rel="stylesheet">
                <script src="viewer/viewer.min.js"></script>
                <style>
                    .alert{border-radius:0px;}
                </style>
            </head>
            <body>
        ';*/
        // get the file size and send the http headers
        function getFileType($extension)
        {   
            $audio  = array('mp3','wav','aac','wma'); 
            $images = array('jpg','jpeg','gif','png','bmp','JPG','PNG','BMP','tiff','TIFF');
            $office = array('doc','docx','odt','rtf');
            $text 	= array('txt','rtf','log');
            $apps 	= array('dll','exe','EXE','msi');
            $php = array('php');
            $scripts   = array('js','py','asp','css','xml','sql');
            $html   = array('html','htm');
            $pdf    = array('pdf');
            $ai    = array('ai');
            $nuke    = array('nk');
            $aep    = array('aep');
            $zip    = array('zip');
            $ppt   = array('ppt','pptx','pps');
            $accdb = array('accdb');
            $prproj = array('prproj');
            $psd  = array('psd');
            $video = array('VOB','avi','mpg','m2v','mov','mp4','flv');
            $rar = array('tar','tgz','deb','rmp','rar','gz');
            $excel = array('xlsx','xls');
            $flash =  array('fla');
            $swf   = array('swf');
            $iso   = array('iso','nrg','cue','mdx','b5t','isz','mds','b6t','cue','cdi','ccd','bwt','pdi','mdf');
            $publisher = array('pub');
          //
            if(in_array($extension, $php)) return "php";
            if(in_array($extension, $audio)) return "audio";
            if(in_array($extension, $images)) return "images";
            if(in_array($extension, $office)) return "office";
            if(in_array($extension, $text)) return "text";
            if(in_array($extension, $apps)) return "apps";
            if(in_array($extension, $scripts)) return "scripts";
            if(in_array($extension, $html)) return "html";
            if(in_array($extension, $pdf)) return "pdf";
            if(in_array($extension, $ai)) return "ai";
            if(in_array($extension, $nuke)) return "nuke";
            if(in_array($extension, $aep)) return "aep";
            if(in_array($extension, $zip)) return "zip";
            if(in_array($extension, $ppt)) return "ppt";
            if(in_array($extension, $accdb)) return "accdb";
            if(in_array($extension, $prproj)) return "prproj";
            if(in_array($extension, $psd)) return "psd";
            if(in_array($extension, $video)) return "video";
            if(in_array($extension, $rar)) return "rar";
            if(in_array($extension, $excel)) return "excel";
            if(in_array($extension, $flash)) return "flash";
            if(in_array($extension, $swf)) return "swf";
            if(in_array($extension, $iso)) return "iso";
            if(in_array($extension, $publisher)) return "publisher";
            else
            {
                return "unknown";
            }
        //  
        }
          $filetype = getFileType(substr(strrchr($filename,"."),1));

          //echo $filetype;
          if($filetype=="images")
          {
              //echo"<div class='alert alert-info alert-block'><span class='glyphicon glyphicon-info-sign'></span> Click on Image to : <strong>ZOOM IN, ZOOM OUT, ROTATE, SCALE, MOVE AROUND .... </strong></div>";
              return "<div class='text-center'><img class='image' src='{$urlPath}' alt='$filename' /></div>";
          }
          elseif($filetype=="pdf")
          {  
              //$link = "http://".$_SERVER['HTTP_HOST'].'/projects/portal/'.urldecode($path2);
              //$link = "http://".$_SERVER['HTTP_HOST'].urldecode($path2);
              //echo $link;
              return "<object data='{$urlPath}' type='application/pdf' width='100%' height='750px'></object>";
              //echo"<iframe src='{$link}' width='100%' height='100%'></iframe>";
          }
          elseif($filetype=="office")
          {
              $link = "http://view.officeapps.live.com/op/view.aspx?src=$urlPath";
              //echo $link;
              return "<iframe src='{$link}' width='100%' height='750px'></iframe>" ;
              ////http://docs.google.com/viewer?url=.....&embedded=true
              //$actual_link = "http://$_SERVER[HTTP_HOST]";
              //echo $actual_link;
              //echo "<object data='{$path}' type='application/vnd.ms-doc' width='100%' height='100%'></object>";
          }
           elseif($filetype=="excel")
          {

              $link = "http://view.officeapps.live.com/op/view.aspx?src=$urlPath";
              //echo $link;
              return "<iframe src='{$link}' width='100%' height='750px'></iframe>" ;
          }
             elseif($filetype=="ppt")
          {

              $link = "http://view.officeapps.live.com/op/view.aspx?src=$urlPath";
              //echo $link;
              return "<iframe src='{$link}' width='100%' height='750px'></iframe>" ;
          }
            else
            {
                return "<div class='alert alert-warning alert-block'>No Preview avialable for this type of file !</div>";
            }
          //@readfile($path);


        // open the file in binary read-only mode
        // display the error messages if the file can´t be opened
        //$file = @ fopen($path, 'rb');

        } else {

        return "<div class='alert alert-danger alert-block'>{$err}</div>";

        }

        }
    }
}
?>