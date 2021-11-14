<?php
//sample php code

//this will collect data from form
$provider_id = $_POST['provider_id']; 
$number = $_POST['number'];
$amount = $_POST['amount'];
$client_id = "09919190"; //(your system unique id. that you can check in pay2all);
//end of data collection from form


//check whether user enter some data or not
        if(empty($provider_id)){
        echo"select operator";
        exit;
        }
        if(empty($number)){
        echo"enter mobile number";
        exit;
        }
        if(empty($amount)){
        echo"enter amount";
        exit;
        }


        $parameters = array(
                'number' => $number,
                'provider_id' => $provider_id // Provider id check in pay2all
                'amount' => $amount, // Recharge or payment Amount
                'client_id' => $client_id // your system unique id
                'optional1' => '',
                'optional2' => '',
                'optional3' => '',
                'optional4' => ''
        );

        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyMDgiLCJqdGkiOiJlMjNjMDJiZDlmMjdlNTBkZWZlNmRkMzdkM2FjN2Y5Y2RiMDY1ZTVjNWI3MzBmMWZjMDdlZjc1OGU0YTEyZmI1ZDFkMTRiZTIzYTE3ZWM1NiIsImlhdCI6MTYzNjg2MDExOC4wNDA3MTIxMTgxNDg4MDM3MTA5Mzc1LCJuYmYiOjE2MzY4NjAxMTguMDQwNzE0OTc5MTcxNzUyOTI5Njg3NSwiZXhwIjoxNjUyNDk4NTE3Ljk5MDAzNjk2NDQxNjUwMzkwNjI1LCJzdWIiOiIzMTA4OCIsInNjb3BlcyI6W119.gVrkYxBGJ1l1SOfsjWyKAWohd-pgpF9VtIfVwMGF2MHlppnHqEBUBwdyfNyvCHOV_N6egx2ifrKDFo14Q3LtS6UBJyOo46dhwXsSKUFrMNy_x7Va8Z7-HwbkrOU87mn-xIEqW-n1bTTRMW5YT9zWWGfbnpNSyRs9KC7mr54-rgcej1fSsaBUI9C-YlpfHIfNcm7yOBALJtSEPLoBw-XQrUeJ1D3STHH_D09gmJNi-0m8wZOrNINVVOyDlzRfCsjOnbyGo0crQN7o6oNMeRuCx8SxxJgQaU0OZOQPm_p8O1eahuxbTo4qInHfK3SnHiGUieaLPAcRSWglvsDtjU4lYDxMJnjZP9uuRaxnMiyVrEo2AI5OT3rs7xAsltNhHQ7CUiruAoISPyQj10GSRLZ6DsaK8G_8-QzVcE3NVfqSuF66ky74XHl72JSccDufpo9TSE8qm9sGV9JtTvsr0cjjWNuXy4zViHzm2vrx_T4CLLxCn3FN2BCS2ONvxPzYLUGXxx51NP9eJwg45lPpve7Udb-R3RrIAR-mQMAVRH09GriKmlYY56wBd7Bn0GAVNLPQFUVDe4Ng-Kz6bDI3L_LgIm187FjsuO-dIvQcL3GANxqMLuJgbPsoec6naJroJ_C4AeRi-eiC9H-dN05EufZOYU8ZwW5eSqgNP8GJIqpTSMs"; //you have to add personal access token 

    

        $header = ["Accept:application/json", "Authorization:Bearer ".$access_token];

        $method = 'POST';

        $url = 'https://pay2all.in/api/v1/transaction';


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = curl_exec($ch);
        echo $response;  //[JSON RESPONSE]


     


?>
