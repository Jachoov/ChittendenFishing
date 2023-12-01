<?php
$phpSelf = htmlspecialchars($_SERVER['PHP_SELF']);
$pathParts = pathinfo($phpSelf);
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Chittenden County Fishing</title>
        <meta name="author" content="Ty Joe">
        <meta name="description" content="A guide to fishing Chittenden county. Chittenden county is one of the most urban counties in Vermont. 
        Despite this, there is are many different bodies of water for anglers to enjoy. Here is an overview of 
        several spots within the county and information about fishing there.">
        <!-- note to self. ask other anglers to see if this description is accurate-->       
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="css/custom.css?version=<?php print time(); ?>" type="text/css">
        <link rel="stylesheet" media="(max-width: 800px)" href="css/custom-tablet.css?version=<?php print time(); ?>" type="text/css">
        <link rel="stylesheet" media="(max-width: 600px)" href="css/custom-phone.css?version=<?php print time(); ?>" type="text/css">
    
    </head>
<?php
print '<body class="' . $pathParts['filename'] . '">';
print '<!-- ################## Body element ################## -->';
include 'Connect-DB.php';
include 'header.php';
include 'nav.php';
?>