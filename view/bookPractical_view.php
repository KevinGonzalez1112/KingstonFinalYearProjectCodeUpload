<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book a Practical Test</title>
        <link rel="stylesheet" href="../css/styling.css">
    </head>

    <body>
        <div class = "bookPracticalTopLevel">
            <div class = "headerContainer">
                <header>
                    <a href = "../controller/homePage.php"><img class = "govLogo" src = "../images/gibraltar-gov-logo.png" alt = "Gibraltar Government Logo" /></a>
                </header>
            </div>
            <section>
                <form class = "personalDetailsForm" action = "../controller/bookPractical.php" method = "POST">
                    <div class = "step step-1 active" id = "step-1">
                        <h2 class = "applicationLabel"> Application for a Driving Practical test </h2>
                        <p class = "paragraphP">
                            "If you find you cannot keep the appointment given to you, you should notify the chief examiner at the motor vehicle test centre, giving at least three clear days notice, otherwise you may be required to pay 
                            a further fee if you want another appointment. </br></br> You are required on the date of your appointment to show a valid learner licence to drive the category of vehicle in respect of which you are applying. 
                            </br></br> There shall be a clearly displayed in a conspicous manner on the front and back of the vehicle driven by the learner a distinguishing marker, consisting of the letter "L" in red colour on a white 
                            background, which shall confirm with reg 85 (3) of the traffic (lic & reg) regulations. </br></br> If you possess a foreign driving licence relating to the category of vehicle specified in your application
                            please bring it with you when you keep your appointment. </br></br> You are ineligible to take a driving test within 14 days of a previous test in a vehicle within the same category."</br></br> <b>Eligibility:</b> 
                            </br></br> In addition to the qualifying period of 185 days, applicants must also possess legal residence in Gibraltar, i.e. Permit of Residence or ID Card.
                        </p>
                        <button type = "button" class = "nextButton"> Proceed </button>
                    </div>
                    <div class = "step step-2" id = "step-2">
                        <h2 class = "personalDetailsLabel"> Personal Details </h2>
                        <div class = "formField">
                            <label> ID Number: </label>
                            <input name = "idNumber" required minLength = "9" maxlength = "9" type = "text" value = "<?= $_SESSION["national_id_number"]; ?>">
                        </div>
                        <div class = "formField">
                            <label> First Name(s): </label>
                            <input name = "firstName" required maxlength = "30" type = "text" value = "<?= $_SESSION["first_name"]; ?>">
                        </div>
                        <div class = "formField">
                            <label> Surname: </label>
                            <input name = "surname" required maxlength = "30" type = "text" value = "<?= $_SESSION["surname"] ?>">
                        </div>
                        <div class = "formField">
                            <label> Date of Birth: </label>
                            <input name = "dateOfBirth" required type = "date" value = "<?= $_SESSION["date_of_birth"] ?>">
                        </div>
                        <div class = "formField">
                            <label> Place of Birth: </label>
                            <input name = "placeOfBirth" required maxlength = "30" type = "text" value = "<?= $_SESSION["place_of_birth"] ?>">
                        </div>
                        <div class = "formField">
                            <label> Address: </label>
                            <input name = "address" required maxlength = "255" type = "text" value = "<?= $_SESSION["address"] ?>">
                        </div>
                        <div class = "formField">
                            <label> E-mail: </label>
                            <input name = "email" required maxlength = "255" type = "text" value = "<?= $_SESSION["email_address"] ?>">
                        </div>
                        <div class = "formField">
                            <label> Home Telephone: </label>
                            <input name = "homeTelephone" maxlength = "8" type = "number" value = "<?= $_SESSION["home_telephone"] ?>">
                        </div>
                        <div class = "formField">
                            <label> Work Telephone: </label>
                            <input name = "workTelephone" maxlength = "30" type = "number" value = "<?= $_SESSION["work_telephone"] ?>">
                        </div>
                        <button type = "button" class = "nextButton"> Next </button>
                    </div>
                    <div class = "step step-3" id = "step-3">
                        <h2 class = "questionsLabel"> Questions </h2>
                        <div class = "formField">
                            <p> What Test are you applying for? Please (State/Select) category</p>
                            <select name = "testCategory">
                                <option value = "-" > - </option>
                                <option value = "A"> Category A </option>
                                <option value = "B"> Category B </option>
                                <option value = "C"> Category C </option>
                                <option value = "D"> Category D </option>
                                <option value = "B+E"> Category B + Trailer </option>
                                <option value = "C+E"> Category C + Trailer </option>
                                <option value = "D+E"> Category D + Trailer </option>
                                <option value = "F-J"> Categories F - J </option>
                                <option value = "PSV 8+1 seat"> PSV 8 + 1 Seat (Taxi) </option>
                                <option value = "PSV over 8 seats"> PSV over 8 seats (Bus) </option>
                            </select>
                        </div>
                        <div class = "formField">
                            <p> Have you previously taken a test in Gibraltar, Great Britain or Northern Ireland in a vehicle of the same category </p>
                            <select name = "previouslyTakenTest">
                                <option> - </option>
                                <option value = "Yes"> Yes </option>
                                <option value = "No"> No </option>
                            </select>
                        </div>
                        <div class = "formField">
                            <p> Are you disqualified by a court from holding or obtaining a driving licence </p>
                            <select name = "disqualified" class = "disqualified">
                                <option> - </option>
                                <option value = "Yes"> Yes </option>
                                <option value = "No"> No </option>
                            </select>
                        </div>
                        <div class = "formField">
                            <p> Are you the holder of any other licence? If yes, please state category and country of issue </p>
                            <input name = "otherLicences" required minlength = "2" maxlength = "50" type = "text">
                        </div>
                        <div class = "formField">
                            <p> Have you lived in Gibraltar, Great Britain or Northern Ireland for atleast 185 days in the past 12 months </p>
                            <select name = "livingRequirements">
                                <option> - </option>
                                <option value = "Yes"> Yes </option>
                                <option value = "No"> No </option>
                            </select>
                        </div>
                        <div class = "formField">
                            <p> If you are a student have you been attending a course of study in Gibraltar, Great Britain or Northern Ireland for at least 6 months </p>
                            <select name = "studentRequirements">
                                <option> - </option>
                                <option value = "Yes"> Yes </option>
                                <option value = "No"> No </option>
                            </select>
                        </div>
                        <button type = "button" class = "previousButton"> Previous </button>
                        <button type = "button" class = "nextButton"> Next </button>
                    </div>

                    <div class = "step step-4" id = "step-4">
                        <h2 class = "questionsLabel"> Vision Questioniare </h2>
                        <div class = "formField">
                            <p> Do you need to wear glasses or corrective lenses when driving? </p>
                            <select name = "requireGlasses">
                                <option> - </option>
                                <option value = "Yes"> Yes </option>
                                <option value = "No"> No </option>
                            </select>
                        </div>
                        <div class = "formField">
                            <p> Can you see at a distance of 23 metres (with glasses or contact lenses) a car number plate </p>
                            <select name = "visionRange">
                                <option> - </option>
                                <option value = "Yes"> Yes </option>
                                <option value = "No"> No </option>
                            </select>
                        </div>
                        <button type = "button" class = "previousButton"> Previous </button>
                        <button type = "button" class = "nextButton"> Next </button>
                    </div>
                    <div class = "step step-5" id = "step-5">
                        <h2 class = "questionsLabel"> Health Questions </h2>

                        <div class = "formField">
                            <p> An epileptic attack or epilepsy: </p>
                            <select name = "epilepsy">
                                <option> - </option>
                                <option value = "Yes"> Yes </option>
                                <option value = "No"> No </option>
                            </select>
                        </div>
                        <div class = "formField">
                            <p> Sudden attacks of disabling giddiness, fainting or blackouts: </p>
                            <select name = "fainting">
                                <option> - </option>
                                <option value = "Yes"> Yes </option>
                                <option value = "No"> No </option>
                            </select>
                        </div>
                        <div class = "formField">
                            <p> A pacemaker or electronical device fitted to your heart </p>
                            <select name = "electronics">
                                <option> - </option>
                                <option value = "Yes"> Yes </option>
                                <option value = "No"> No </option>
                            </select>
                        </div>
                        <div class = "formField">
                            <p> Diabetes controlled by insulin </p>
                            <select name = "diabetesInsulin">
                                <option> - </option>
                                <option value = "Yes"> Yes </option>
                                <option value = "No"> No </option>
                            </select>
                        </div>
                        <div class = "formField">
                            <p> Diabetes controlled by tablets: </p>
                            <select name = "diabetesTablets">
                                <option> - </option>
                                <option value = "Yes"> Yes </option>
                                <option value = "No"> No </option>
                            </select>
                        </div>
                        <div class = "formField">
                            <p> Parkinson's Disease: </p>
                            <select name = "parkinsons">
                                <option> - </option>
                                <option value = "Yes"> Yes </option>
                                <option value = "No"> No </option>
                            </select>
                        </div>
                        <div class = "formField">
                            <p> Multiple sclerosis: </p>
                            <select name = "multipleSclerosis">
                                <option> - </option>
                                <option value = "Yes"> Yes </option>
                                <option value = "No"> No </option>
                            </select>
                        </div>
                        <div class = "formField">
                            <p> Severe mental handicap: </p>
                            <select name = "disability">
                                <option> - </option>
                                <option value = "Yes"> Yes </option>
                                <option value = "No"> No </option>
                            </select>
                        </div>
                        <div class = "formField">
                            <p> Angina (heart pain) while driving: </p>
                            <select name = "heartIssues">
                                <option> - </option>
                                <option value = "Yes"> Yes </option>
                                <option value = "No"> No </option>
                            </select>
                        </div>
                        <div class = "formField">
                            <p> A major or minor stroke </p>
                            <select name = "stroke">
                                <option> - </option>
                                <option value = "Yes"> Yes </option>
                                <option value = "No"> No </option>
                            </select>
                        </div>
                        <div class = "formField">
                            <p> Any type of brain surgery, brain tumour or severe head injury involving hospital impatient treatment </p>
                            <select name = "brainConditions">
                                <option> - </option>
                                <option value = "Yes"> Yes </option>
                                <option value = "No"> No </option>
                            </select>
                        </div>
                        <div class = "formField">
                            <p> Any severe psychiatric illness or mental disorder </p>
                            <select name = "mentalIllness">
                                <option> - </option>
                                <option value = "Yes"> Yes </option>
                                <option value = "No"> No </option>
                            </select>
                        </div>
                        <div class = "formField">
                            <p> Continuing / permanent difficulty in the use of your arms or legs for driving </p>
                            <select name = "armsLegsIssues">
                                <option> - </option>
                                <option value = "Yes"> Yes </option>
                                <option value = "No"> No </option>
                            </select>
                        </div>
                        <div class = "formField">
                            <p> Have you been dependant on, or misused alcohol, illicit drugs or chemical substances in the past three years </p>
                            <select name = "addiction">
                                <option> - </option>
                                <option value = "Yes"> Yes </option>
                                <option value = "No"> No </option>
                            </select>
                        </div>
                        <div class = "formField">
                            <p> Do you suffer from any serious defect in hearing </p>
                            <select name = "hearing">
                                <option> - </option>
                                <option value = "Yes"> Yes </option>
                                <option value = "No"> No </option>
                            </select>
                        </div>
                        <div class = "formField">
                            <p> Any eye disease or disorder in BOTH eyes other than needing glasses or contact lenses </p>
                            <select name = "eyeCondition">
                                <option> - </option>
                                <option value = "Yes"> Yes </option>
                                <option value = "No"> No </option>
                            </select>
                            <p> If you answered yes to last question, what is it? </p>
                            <input name = "eyeConditionExplanation" maxlength = "255" type = "text">
                        </div>

                        <button type = "button" class = "previousButton"> Previous </button>
                        <button type = "button" class = "nextButton"> Next </button>
                    </div>
                    <div class = "step step-5" id = "step-6">
                        <h2 class = "questionsLabel"> Pick your booking slot: </h2>
                        <div class = "formField">
                            <label> Test time: </label>
                            <select name = "practicalBookingSlot">
                                <option value = "-"> - </option> 
                                <?php foreach ($practicalBookingTestSlot as $pbts): ?>
                                    <option value = <?= $pbts->test_details_id ?> >
                                        DATE: <?= $pbts->test_date ?> || TIME: <?= $pbts->test_time ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <button type = "button" class = "previousButton"> Previous </button>
                        <button type = "button" class = "nextButton"> Next </button>
                    </div>

                    <div class = "step step-7">
                        <h2 class = "questionsLabel"> Enter your payment details: </h2>
                        <div class = "formField">
                            <label> Card Name: </label>
                            <input name = "cardName" required type = "text">
                        </div>
                        <div class = "formField">
                            <label> Card Number: </label>
                            <input name = "cardNumber" required type = "text">
                        </div>
                        <div class = "formField">
                            <label> Card Expiry Date: </label>
                            <input name = "cardExpiryDate" required type = "text">
                        </div>
                        <div class = "formField">
                            <label> Card Security Code: </label>
                            <input name = "cardSecurityCode" required type = "text">
                        </div>
                        <button type = "button" class = "previousButton"> Previous </button>
                        <button type = "submit" class = "submitButton"> Submit </button>
                    </div>
                </form>
            </section>
            <div class = "socialsContainer">
                <h2 class = "socialsHeader"> Find us on social media *ADD IN SOCIAL BUTTONS IN THIS BAR*</h2>
            </div>
            <div class = "footerContainer">
                <h2 class = "footerHeader"> Information and FAQ's: </h2>
                <a class = "infoAndFaqsA" href = "../view/feesTable_view.php"> Fees Table </a>
            </div>
        </div>
    </body>
    <script type = "text/javascript" src = "../javascript/javascript.js"></script>
</html>

