<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReportsController
 *
 * @author Hp
 */
class ReportsController  extends BaseController {
    
    public function users() {
        
        $pdf = App::make('dompdf');

        $html = <<< REPORT
                <html>
                <head>
                    <style>
                        body{
                            font-family: 'sans serif';
                            color: red;
                        }
                    </style>
                </head>
                <body>
                    <H1>This is a pdf report using heredoc</h1>
                    <a href="/login" class="waves-effect waves-light btn">Login</a></li>
                    <h1>Hello Tayong</h1>
                </body>
                </html>
REPORT;
                
        $pdf->loadHTML($html);
        return $pdf->stream();
    }
}
