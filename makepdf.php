<?php

require_once __DIR__ . '/vendor/autoload.php';
include 'includes/dbh.inc.php';
$mpdf = new \Mpdf\Mpdf(['tempDir' => '/tmp']);
$data = "";

if (isset($_POST['request-submit'])) {
  $phoneNum = $_POST['phonenum'];

  $sql = "SELECT *, DATE_FORMAT(convert_tz(dateSubmitted, '+0:00', '-05:00'), '%m/%d/%Y %r') AS dateFormatted FROM formsubmit WHERE userPhone = ?;";

  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../project.php?error=sqlerror");
    exit();
  }
  else {
    mysqli_stmt_bind_param($stmt, "s", $phoneNum);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_array($result)) {
      $data .= '<h1> COVID-19 Consent Form </h1>';
      $data .= '<h2>H & H Nail Spa</h2>';
      $data .= '<h3>13492 Research Blvd Ste 180 Austin, TX 78750</h3>';

      //Add SDO_DAS_DataObject
      $data .= '<strong>Cusomter Name: </strong>' . $row['userFirst'] . " ". $row['userLast']. '<br/>';
      $data .= '<strong>Phone Number: </strong>' . $row['userPhone'] . '<br/>';
      $data .= '<strong>Date Consented: </strong>' . $row['dateFormatted'] . '<br/>';
      $data .= '<hr>';
      $data .= '<p>To prevent the spread of contagious viruses and to help protect each other, I understand that I will have to follow the salon’s strict guidelines. Required to wear a mask at all time.</p>';
      $data .= '<p><strong>'.$row['q1'].'</strong></p>';
      $data .= '<hr>';
      $data .= '<p>I knowingly and willingly consent to have a nails, pedicure, waxing treatment during the Covid-19 pandemic.</p>';
      $data .= '<p><strong>'.$row['q2'].'</strong></p>';
      $data .= '<hr>';
      $data .= '<p>I understand that air travel is significant increases my risk of contracting and transmitting the COVID-19 virus. I know that the CDC, OSHA and TEXAS STATE BOARD of cosmetology recommend social distancing of at least 6 feet.</p>';
      $data .= '<p><strong>'.$row['q3'].'</strong></p>';
      $data .= '<hr>';
      $data .= '<p>I understand the COVID-19 virus has a long incubation period during which carries of the virus may not show symptoms and still be highly contagious. It is impossible to determine who has it, and who does not give the current limits in virus testing, therefore I will not hold the salon responsible if I were to contract COVID-19 infection around and during the time of services.</p>';
      $data .= '<p><strong>'.$row['q4'].'</strong></p>';
      $data .= '<hr>';
      $data .= '<p>I understand that due to the frequency of visits of other clients, the characteristics of the virus, and the characteristics of nail, pedicure, or waxing services, that I have elevated the risk of contracting the virus by merely being in the salon.</p>';
      $data .= '<p><strong>'.$row['q5'].'</strong></p>';
      $data .= '<hr>';
      $data .= '<p>Have you traveled outside the United States in the past 14 days to countries that have been affected by COVID-19?</p>';
      $data .= '<p><strong>'.$row['q6'].'</strong></p>';
      $data .= '<hr>';
      $data .= '<p>Have you traveled domestically within the United States by commercial airline, bus or train within the past 14 days?</p>';
      $data .= '<p><strong>'.$row['q7'].'</strong></p>';
      $data .= '<hr>';
      $data .= '<p>Have you been in contact with a person with COVID-19, in quarantine, or have symptoms of COVID-19 within the past 14 days?</p>';
      $data .= '<p><strong>'.$row['q8'].'</strong></p>';
      $data .= '<hr>';

      $data .= '<h2>IN SALON TEMPERATURE POLICY</h2>';
      $data .= "<p>I'm willing to take a temperature check during my vist to the salon before the service are started, and I agree not to come in the salon with the following symptom of COVID-19 listed below:Fever 99 degree or higher, cough, shortness of breath, chest pain, headache, loss of sense of taste smell, runny nose, sore throat, muscle pain, diarrhea, nausea/vormiting.</p>";
      $data .= '<hr>';


      $data .= '<p>I understand, read, and completed this questionnaire truthfully. I agree that this constitutes full disclosure and that it supersedes any previous verbal or written disclosures. I understand that this document is to provide the best possible guest experience when visiting.</p>';
      $data .= '<p><strong>'.$row['verify'].'</strong></p>';
      $data .= '<hr>';



    }

  }
  //Write PDF
  $mpdf->WriteHTML($data);

  //Output to browser
  $mpdf->Output('consentform.pdf', 'D'); //D for download
}
else {
  header("Location: ../index.php");
  exit();
}
