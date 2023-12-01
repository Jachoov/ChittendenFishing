<?php
include 'top.php';

$anglerExperiences = array('Newbie','Beginner','Novice','Intermediate','Advanced','Expert');

$dataIsGood = false;
$errorMessage = '';
$message = '';

$anglerExperience = '';
$attraction = '';
$firstName = '';
$email = '';
$resident = '';
$trout = 1;
$bass = 0;
$sunfish = 0;




function getData($field) {
    if (!isset($_POST[$field])) {
        $data = "";
    } else {
        $data = trim($_POST[$field]);
        $data = htmlspecialchars($data);
    }
    return $data;
}

function verifyAlphaNum($testString) {
    // Check for letters, numbers and dash, period, space and single quote only.
    // added & ; and # as a single quote sanitized with html entities will have 
    // this in it bob's will be come bob's
    return (preg_match ("/^([[:alnum:]]|-|\.| |\'|&|;|#)+$/", $testString));
}


if($_SERVER["REQUEST_METHOD"] == 'POST'){

    print PHP_EOL . '<!-- Starting Sanitation -->' . PHP_EOL;
    $anglerExperience = getData('lstAnglerExperience');
    $attraction = getData('txtAttraction');
    $firstName = getData('txtFirstName');
    $email = getData('txtEmail');
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $resident = getData('radResident');
    $trout = (int) getData('chkTrout');
    $bass = (int) getData('chkBass');
    $sunfish = (int) getData('chkSunfish');




    print PHP_EOL . '<!-- Starting Validation -->' . PHP_EOL;
    $dataIsGood = true;

    if($anglerExperience == ''){
        $errorMessage .= '<p class="mistake">Please choose an experience level</p>';
        $dataIsGood = false;
    } elseif(!in_array($anglerExperience, $anglerExperiences)){
        $errorMessage .= '<p class="mistake">Please choose an experience level</p>';
        $dataIsGood = false;
    }
    if($attraction == ''){
        $errorMessage .= '<p class="mistake">Please tell us why you are interested in fishing Chittenden County</p>';
        $dataIsGood = false;
    } elseif(!verifyAlphaNum($attraction)){
        $errorMessage .= '<p class="mistake">Your reason for interest in fishing Chittenden County contains invalid charachters, please just use letters.</p>';
        $dataIsGood = false;
    }


    if($firstName == ''){
        $errorMessage .= '<p class="mistake">Please type in your first name.</p>';
        $dataIsGood = false;
    } elseif(!verifyAlphaNum($firstName)){
        $errorMessage .= '<p class="mistake">Your first name contains invalid charachters, please just use letters.</p>';
        $dataIsGood = false;
    }

    if($email == ''){
        $errorMessage .= '<p class="mistake">Please type in your email address</p>';
        $dataIsGood = false;
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errorMessage .= '<p class="mistake">Your email address contains invalid charachters.</p>';
        $dataIsGood = false;
    }









    if($resident != "Full-time Resident" AND $resident != "Non-Resident" AND $resident != "Seasonal Resident") {
        $errorMessage .= '<p class="mistake">Please tell us your resident status</p>';
        $dataIsGood = false;
    }

    $totalChecked = 0;

    if($trout != 1) $trout = 0;
    $totalChecked += $trout;

    if($bass != 1) $bass = 0;
    $totalChecked += $bass;

    if($sunfish != 1) $sunfish = 0;
    $totalChecked += $sunfish;




    if($totalChecked == 0){
        $errorMessage .= '<p class="mistake">Please choose at least one checkbox that describes the species of fish you want to catch.</p>';
        $dataIsGood = false;
    }

    print '<!-- Starting Saving -->';
    if($dataIsGood){
        $sql = 'INSERT INTO tblAnglerInfo 
        (fldAnglerExperience, fldAttraction, fldFirstName, fldEmail, fldResident, fldTrout, fldBass, fldSunfish)';
        $sql .= 'VALUES (?, ?, ?, ?, ?, ?, ?, ?)';

        $data = array($anglerExperience, $attraction, $firstName, $email, $resident, $trout, $bass, $sunfish);

        try{
            $statement = $pdo->prepare($sql);
            if($statement->execute($data)){
                $message .= '<h2>Thank you</h2>';
                $message .= '<p>Your information was successfully saved.</p>';
            } else {
                $message .= '<p>Record was NOT successfully saved.</p>';
            }
        } catch(PDOException $e){
            $message .= '<p>Couldn\t insert the record, please contact someone</p>';
        }
    }
}
?>
<main>
<h1>Angler Survey</h1>
    <section>
        <h2>Survey</h2>
        <p>We are collecting information about anglers interested in fishing Chittenden County.</p>
    </section> 
    <div>
<?php
print $message;
print $errorMessage;

print '<p>Post Array:</p><pre>';
print_r($_POST);
print '</pre>';
?>
        <figure class="rounded">
            
            <img class="rounded" alt="Richmond Smallmouth" src="images/richmond-fish.png">
            <figcaption>Winooski River Smallmouth Bass<cite>Photo by Ty Joe</cite></figcaption>
                    
        </figure>
    </div> 
    <section>
        <h2>This survey will help those in Chittenden County catch fish for generations to come!</h2>
        
        <form action="#" id="frmAnglers" method="post">

            <fieldset class="listbox">
                <legend>Angler Experience Level</legend>
                <p>
                    <select id="lstAnglerExperience" name="lstAnglerExperience" tabindex="120">
                        <option
                        <?php if($anglerExperience == "Newbie") print 'selected'; ?>
                            value="Newbie">Newbie</option>
                        <option
                        <?php if($anglerExperience == "Beginner") print 'selected'; ?>
                        value="Beginner">Beginner</option>
                        <option
                        <?php if($anglerExperience == "Novice") print 'selected'; ?>
                        value="Novice">Novice</option>
                        <option
                        <?php if($anglerExperience == "Intermediate") print 'selected'; ?>
                        value="Intermediate">Intermediate</option>
                        <option
                        <?php if($anglerExperience == "Advanced") print 'selected'; ?>
                        value="Advanced">Advanced</option>
                        <option
                        <?php if($anglerExperience == "Expert") print 'selected'; ?>
                        value="Expert">Expert</option>
                    </select>
                </p>
            </fieldset>








            <fieldset class="textarea">
                <p>
                    <label for="txtAttraction">What interests you about fishing in Chittenden County?</label>
                    <textarea id="txtAttraction" name="txtAttraction" tabindex="200"><?php print $attraction; ?></textarea>
                </p>
            </fieldset>

            <fieldset class="contact">
                <legend>Your Info</legend>
                <p>
                    <label class="required" for="txtFirstName">First Name</label>
                    <input id="txtFirstName" maxlength="30" name="txtFirstName" onfocus="this.select()" tabindex="300" type="text" value="<?php print $firstName; ?>" required>
                </p>

                <p>
                    <label class="required" for="txtEmail">Email</label>
                    <input id="txtEmail" maxlength="30" name="txtEmail" onfocus="this.select()" tabindex="305" type="email" value="<?php print $email; ?>" required>
                </p>
            </fieldset>

            <fieldset class="radio">
                <legend>Are you from Chittenden County?</legend>
                <p>
                    <input type="radio" id="radFullResident"
                    name="radResident" value="Full-time Resident" tabindex="410"
                    <?php if($resident == "Full-time Resident") print 'checked'; ?>
                    required>
                    <label class="radio-field"
                    for="radFullResident">Full-time Resident</label>
                </p>

                <p>
                    <input type="radio" id="radNonResident"
                    name="radResident" value="Non-Resident" tabindex="430"
                    <?php if($resident == "Non-Resident") print 'checked'; ?>
                    required>
                    <label class="radio-field"
                    for="radNonResident">Non-Resident</label>
                </p>

                <p>
                    <input type="radio" id="radSznResident"
                    name="radResident" value="Seasonal Resident" tabindex="440"
                    <?php if($resident == "Seasonal Resident") print 'checked'; ?>
                    required>
                    <label class="radio-field"
                    for="radSznResident">Seasonal Resident</label>
                </p>
            </fieldset>                    

            <fieldset class="checkbox">
                <legend>Which type(s) of fish you most interested in catching? (choose at least one)</legend>
                <p>
                    <input id="chkTrout" name="chkTrout" tabindex="510"
                    <?php if($trout) print 'checked'; ?>
                    type="checkbox" value="1">
                    <label for="chkTrout">Trout</label>
                </p>

                <p>
                <input id="chkBass" name="chkBass" tabindex="520"
                    <?php if($bass) print 'checked'; ?>
                    type="checkbox" value="1">
                    <label for="chkBass">Bass</label>
                </p>

                <p>
                <input id="chkSunfish" name="chkSunfish" tabindex="530"
                    <?php if($sunfish) print 'checked'; ?>
                    type="checkbox" value="1">
                    <label for="chkSunfish">Sunfish</label>
                </p>
            </fieldset>
            
            <fieldset class="buttons">
                <input id="btnSubmit" name="btnSubmit" tabindex="900"
                type="submit" value="Submit">
            </fieldset>
        </form>
    </section>
</main>
<?php
include 'footer.php';
?>