<?php

require_once './vendor/autoload.php';

date_default_timezone_set('Etc/UTC');

class GeneratePdf
{

    function __construct()
    {
        require_once './inc/certDompdf.php';

        $pdf = new Pdf('landscape', 'cm', 'a4', true, 'UTF-8', false, false);


        $fodase = file_get_contents('./sample.html');

        $data = array(
            'firstName' => 'Eduardo',
            'eventName' => 'Programação',
            'startDate' => '01/01/2019',
            'endDate' => '05/01/2019'
        );

        $row = [];
        foreach ($data as $key => $value) {
            $row[$key] = preg_replace('/\x{FEFF}/u', '', $value);
        }

        $pdf->create_pdf('./nomedopdf.pdf', $fodase, '', $row, 'a data fica aqui');
    }
}


new GeneratePdf();
