
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <!-- Scale the content inside the device  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/st.css" type="text/css">
    <title>Index/Login Page</title>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<style media="screen">
.login-page {
  padding: 8% 0 0;
}
</style>

<body>

<div class="login-page">
  <div class="form">

    <form class="login-form" action="includes/formsubmission.inc.php" method="POST">
      <h1 class"title">H & H Nail Spa</h1>
      <h2 class="address">13492 Research Blvd Ste 180 Austin, TX 78750</h2>
      <hr/>
      <h2 class="title"><strong>COVID-19 NAILS SALON SERVICE CONSENT FORM</strong></h2>
      <?php
        if (isset($_GET['form'])) {
          if ($_GET['form'] == 'submitted') {
            echo '<p class="submitsuccess"> Form Submitted Successfully!</p>';
          }
        }

        elseif (isset($_GET['error'])) {
          if ($_GET['error'] == 'sqlerror') {
            echo '<p class="submiterror"> Error With DB!</p>';
          }
        }

      ?>
      <input type="text" name="firstname" required placeholder="First Name"/>
      <input type="text" name = "lastname" required placeholder="Last Name"/>
      <input type="tel" name="phonenum" required placeholder="Phone Number">
      <label>Date Consent</label>
      <input type="date" name="dateconsent">
      <label>Time</label>
      <div class="row">
          <div class="col-sm-4">
            <select name="hours">
                <option disabled="disabled" selected="selected">Hours</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
            <div class="select-dropdown"></div>
          </div>
          <div class="col-sm-4">
                <select name="minutes">
                    <option disabled="disabled" selected="selected">Minutes</option>
                    <option value="00">00</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                </select>
                <div class="select-dropdown"></div>
          </div>
          <div class="col-sm-4">
                <select name="ampm">
                    <option value="am">AM</option>
                    <option value="pm">PM</option>
                </select>
                <div class="select-dropdown"></div>
          </div>
      </div>
      <hr>
      <p><strong>To prevent the spread of contagious viruses and to help protect each other, I understand that I will have to follow the salon’s strict guidelines. Required to wear a mask at all time.</strong></p>
      <label class="radio-container">By checking this box I understand and accept this statement.
          <input type="radio" value="Yes" name="q1">
      </label>
      <hr>

      <p><strong>I knowingly and willingly consent to have a nails, pedicure, waxing treatment during the Covid-19 pandemic.</strong></p>
      <label class="radio-container">By checking this box I understand and accept this statement.
          <input type="radio" value="Yes" name="q2">
      </label>
      <hr>

      <p><strong>I understand that air travel is significant increases my risk of contracting and transmitting the COVID-19 virus. I know that the CDC, OSHA and ILLINOIS STATE BOARD of cosmetology recommend cocial distancing of at least 6 feet.</strong></p>
      <label class="radio-container">By checking this box I understand and accept this statement.
          <input type="radio" value="Yes" name="q3">
      </label>
      <hr>

      <p><strong>I understand the COVID-19 virus has a long incubation period during which carries of the virus may not show symptoms and still be highly contagious. It is impossible to determine who has it, and who does not give the current limits in virus testing, therefore I will not hold the salon responsible if I were to contract COVID-19 infection around and during the time of services.</strong></p>
      <label class="radio-container">By checking this box I understand and accept this statement.
          <input type="radio" value="Yes" name="q4">
      </label>
      <hr>

      <p><strong>I understand that due to the frequency of visits of other clients, the characteristics of the virus, and the characteristics of nail, pedicure, or waxing services, that I have elevated the risk of contracting the virus by merely being in the salon.</strong></p>
      <label class="radio-container">By checking this box I understand and accept this statement.
          <input type="radio" value="Yes" name="q5">
      </label>
      <hr>

      <p><strong>Have you traveled outside the United States in the past 14 days to countries that have been affected by COVID-19?</strong></p>
      <div class="p-t-10">
          <label class="radio-container m-r-45">Yes
              <input type="radio" value="Yes" name="q6">
          </label>
          <label class="radio-container">No
              <input type="radio" value="No" name="q6">
          </label>
      </div>
      <hr>

      <p><strong>Have you traveled domestically within the United States by commercial airline, bus or train within the past 14 days?</strong></p>
      <div class="p-t-10">
          <label class="radio-container m-r-45">Yes
              <input type="radio" value="Yes" name="q7">
          </label>
          <label class="radio-container">No
              <input type="radio" value="No" name="q7">
          </label>
      </div>
      <hr>

      <p><strong>Have you been in contact with a person with COVID-19, in quarantine, or have symptoms of COVID-19 within the past 14 days?</strong></p>
      <div class="p-t-10">
          <label class="radio-container m-r-45">Yes
              <input type="radio" value="Yes" name="q8">
          </label>
          <label class="radio-container">No
              <input type="radio" value="No" name="q8">
          </label>
      </div>

      <hr>
      <h2>IN SALON TEMPERATURE POLICY</h2>
      <p class="temp-policy">I'm willing to take a temperature check during my vist to the salon before the service are started, and I agree not to come in the salon with the following symptom of COVID-19 listed below:Fever 99 degree or higher, cough, shortness of breath, chest pain, headache, loss of sense of taste smell, runny nose, sore throat, muscle pain, diarrhea, nausea/vormiting.</p>
      <hr>
      <p class="verify"><strong>I understand, read, and completed this questionnaire truthfully. I agree that this constitutes full disclosure and that it supersedes any previous verbal or written disclosures. I understand that this document is to provide the best possible guest experience when visiting.</strong></p>
      <div class="p-t-10">
          <label class="radio-container m-r-45">Yes
              <input type="radio" checked="checked" value="Yes" name="verify">
          </label>
          <label class="radio-container">No
              <input type="radio" value="No" name="verify">
          </label>
      </div>

      <button type="submit" name="form-submit">Submit</button>

    </form>


  </div>
</div>

</body>
</html>
