<?php

if (isset($_POST['form-submit'])) {

  include 'dbh.inc.php';

  $firstName = $_POST['firstname'];
  $lastName = $_POST['lastname'];
  $phoneNum = $_POST['phonenum'];
  $dateConsent = $_POST['dateconsent'];
  $hour = $_POST['hours'];
  $minute = $_POST['minutes'];
  $ampm = $_POST['ampm'];

  $timeConsent = $hour. ":" . $minute . " " . $ampm;

  $q1 = $_POST['q1'];
  $q2 = $_POST['q2'];
  $q3 = $_POST['q3'];
  $q4 = $_POST['q4'];
  $q5 = $_POST['q5'];
  $q6 = $_POST['q6'];
  $q7 = $_POST['q7'];
  $q8 = $_POST['q8'];
  $verify = $_POST['verify'];

  $sql = "INSERT INTO formsubmit (userFirst, userLast, userPhone, userDateConsent, userTimeConsent, q1,q2,q3,q4,q5,q6,q7,q8,verify) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../project.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "ssssssssssssss", $firstName, $lastName, $phoneNum, $dateConsent,$timeConsent, $q1, $q2, $q3, $q4, $q5, $q6, $q7, $q8, $verify);
      mysqli_stmt_execute($stmt);
      header("Location: ../index.php?form=submitted");
      exit();
    }

}
else {
  header("Location: ../index.php");
  exit();
}


// CREATE TABLE formsubmit (
// 	userId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
//     userFirst varchar(200) NOT NULL,
//     userLast varchar(200) NOT NULL,
//     userPhone varchar(20) NOT NULL,
//     userDateConsent DATETIME,
// 	userTimeConsent varchar(10),
//     q1 varchar(10) NOT NULL,
//     q2 varchar(10) NOT NULL,
//     q3 varchar(10) NOT NULL,
//     q4 varchar(10) NOT NULL,
//     q5 varchar(10) NOT NULL,
//     q6 varchar(10) NOT NULL,
//     q7 varchar(10) NOT NULL,
//     q8 varchar(10) NOT NULL,
//     verify varchar(10) NOT NULL
// );
