<?php
include 'top.php';
?>
<main>
    <h1>SQL</h1>

    <h2>Create a table lab 9 form</h2>
        <pre>
        CREATE TABLE tblAnglerInfo (
            pmkFishingSpotsId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            fldAnglerExperience varchar(12),
            fldAttraction text,
            fldFirstName varchar(40),
            fldEmail varchar(50),
            fldResident varchar(17),
            fldTrout tinyint(1),
            fldBass tinyint(1),
            fldSunfish tinyint(1)
        )
        </pre>




        <h2>Insert record</h2>
        <pre>
        INSERT INTO tblAnglerInfo 
        (fldAnglerExperience, fldAttraction, fldFirstName, fldEmail, fldResident, fldTrout, fldBass, fldSunfish) 
        VALUES
        ('Advanced', 'I am interested to fish Chittenden County because it is close to my apartment', 'Ty', 'tjoe@uvm.edu', 'Full-time Resident', '1', '1', '0')
        </pre>


<hr>
        <h2>Create table lab 8</h2>
        <pre>
        CREATE TABLE tblFishingSpots (
            pmkFishingSpotsId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            fldLocation varchar(10),
            fldWildlifeWaterbody varchar(30),
            fldWildlifeSpeciesCaught varchar(250)
        )
        </pre>

        <h2>Insert Data</h2>
        <pre>
        INSERT INTO tblFishingSpots (fldLocation, fldWaterbody, 
        fldSpeciesCaught) VALUES
        ('Burlington', 'Lake Champlain', 'Smallmouth Bass, Black Crappie, Yellow Perch'),
        ('Jericho', 'Lamoille River', 'Brook Trout, Rainbow Trout, Brown Trout'),
        ('Bolton', 'Winooski River', 'Smallmouth Bass, Brown Trout, Fallfish')
        </pre>

        <h2>Select records</h2>
        <pre>
        SELECT fldLocation, fldWaterbody, fldSpeciesCaught FROM tblFishingSpots
        </pre>
</main>
<?php
include 'footer.php';
?>

    