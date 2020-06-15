<?php

function save_ticket()
{

       // echo 'HELLOOO';
        $curl = curl_init();

        $oauthtoken_dept = "2e4740934d006ac74de79025ce3ed073";  //Get the oauth token using the api "https://accounts.zoho.com/oauth/v2/token" passing the client id client secret etc.
        $authorization = 'Authorization:'.trim($oauthtoken_dept);
        $orgid = 'orgId:60001280952';
        $header = [
                        'Content-Type: application/json',
                        $authorization,
                        $orgid
        ];

        $data = array(
            'email' => $_POST['email'],
            'subject' => $_POST['subject'],
            'status' => $_POST['status'],
            'statusType' => $_POST['status'],
            'category' => $_POST['category'],
            'channel' => $_POST['channel'],
            'departmentId' => $_POST['dept'],
            'contactId' => $_POST['contactid'],
            'assigneeId' => $_POST['assigneeid'],
            'description' =>$_POST['description'],
            'priority' => $_POST["priority"]
        );
        $postdata = json_encode($data);
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://desk.zoho.in/api/v1/tickets",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_SSL_VERIFYPEER=>false,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>$postdata,
            CURLOPT_HTTPHEADER => $header,
        ));

        $response = curl_exec($curl);
        //var_dump($response);
        //var_dump('curl_error',curl_error($curl));
        //echo 'HIEEEE';
        //print_r($response);
        curl_close($curl);
        //echo 'HIEEE111';
        echo $response;
            
}


function get_departments(){

    //echo 'hello Departments';

    
        // Get cURL resource

            $curl = curl_init();
            $oauthtoken_dept = "2e4740934d006ac74de79025ce3ed073";  //Get the oauth token using the api "https://accounts.zoho.com/oauth/v2/token" passing the client id client secret etc.
         $authorization = 'Authorization:'.trim($oauthtoken_dept);
         $orgid = 'orgId:60001280952';
         $header = [
            //'Content-Type: application/json',
                         $authorization,
                         $orgid
         ];
            // Set some options - we are passing in a useragent too here
            curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => 'https://desk.zoho.in/api/v1/tickets',
                CURLOPT_SSL_VERIFYPEER=>false,
                CURLOPT_HTTPHEADER => $header,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_TIMEOUT => 30
            ]);
           // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            // Send the request & save response to $resp
            $resp = curl_exec($curl);
            //print_r($resp);
            //var_dump($resp);
            //var_dump('curl_error',curl_error($curl));
            $aResponse = json_decode($resp,true);
            //$aResponse=json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $resp), true );
            //echo json_last_error();

            // Close request to clear up some resources
            curl_close($curl);
            $output_data = $aResponse['data'];
            //print_r($aResponse);
            //die;

    

}

function get_all_tickets(){

        
            // Get cURL resource

            $curl = curl_init();
            $oauthtoken_dept = "2e4740934d006ac74de79025ce3ed073";  //Get the oauth token using the api "https://accounts.zoho.com/oauth/v2/token" passing the client id client secret etc.
         $authorization = 'Authorization:'.trim($oauthtoken_dept);
         $orgid = 'orgId:60001280952';
         $header = [
            //'Content-Type: application/json',
                         $authorization,
                         $orgid
         ];
            // Set some options - we are passing in a useragent too here
            curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => 'https://desk.zoho.in/api/v1/tickets',
                CURLOPT_SSL_VERIFYPEER=>false,
                CURLOPT_HTTPHEADER => $header,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_TIMEOUT => 30
            ]);
           // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            // Send the request & save response to $resp
            $resp = curl_exec($curl);
            //print_r($resp);
            //var_dump($resp);
            //var_dump('curl_error',curl_error($curl));
            $aResponse = json_decode($resp,true);
            //$aResponse=json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $resp), true );
            //echo json_last_error();

            // Close request to clear up some resources
            curl_close($curl);
            $output_data = $aResponse['data'];
            //print_r($aResponse);
            //die;


}