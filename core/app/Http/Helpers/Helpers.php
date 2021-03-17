<?php
use Illuminate\Support\Facades\Session;


 function  send_email($to, $name, $subject, $message) {

        $settings = \App\GeneralSetting::first();
        $template = $settings->email_template;
        $from = $settings->email_sent_form;

            $headers = "From:$settings->websiteTitle  <$from> \r\n";
            $headers .= "Reply-To: $settings->websiteTitle <$from> \r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $mm = str_replace("{{name}}", $name, $template);
            $message = str_replace("{{message}}", $message, $mm);

            mail($to, $subject, $message, $headers);

    }

if (!function_exists('send_sms')) {

    function send_sms($to, $message) {
        $settings = \App\GeneralSetting::first();

        if ($settings->SMSVerification == 1) {

            $sendtext = urlencode($message);

            $appi = $settings->sms_api;

            $appi = str_replace("{{number}}", $to, $appi);
            $appi = str_replace("{{message}}", $sendtext, $appi);
            $result = file_get_contents($appi);
        }
    }

}

//    chart
if (!function_exists('month_arr')) {

    function month_arr() {
        return [
            1=>'January',
            2=>'February',
            3=>'March',
            4=>'April',
            5=>'May',
            6=>'June',
            7=>'July',
            8=>'August',
            9=>'September',
            10=>'October',
            11=>'November',
            12=>'December'
        ];
    }

}




