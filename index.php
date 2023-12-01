<?php
include 'top.php';
?>

<main>
    <h1>Chittenden County Fishing</h1>
    <section>
        <h2>An overview of fishing Chittenden County</h2>
        <p>Chittenden county is the most populated county in Vermont and is home to the largest city of Vermont, Burlington. While there is a busy downtown area and multiple colleges in the county, there also are also a plethora of outdoor activities that are all accessible to residents, tourists, and college students. One such activity is fishing, a recreational activity that many find to be a relaxing and fun way to get outside and enjoy the outdoors.</p>
        <p>One of the largest challenges to fishing is figuring out where to catch fish. Many anglers are very tight lipped when it comes to sharing the location of their "secret spots". However, there are several popular spots which hold a variety of fun species to catch. Some of the most popular species to catch in Chittenden county are bass, panfish, trout, catfish, and fallfish. The bodies of water in Chittenden county provide many different fishing experiences as well. This includes lakes such as the large lake Champlain, to small high mountain trout streams.</p>
        <p>In the table below are some popular spots with accessible nearby parking. These spots provide a fun fishing experience and are great for kids and beginners as well as more experienced anglers.</p>
    </section>
    
    <section>
        <h2>Fishing Spots in Chittenden County</h2>
        <table>
            <caption><strong>Spots I have caught fish at</strong></caption>

            <tr>
                <th>Waterbody</th>
                <th>Location</th>
                <th>Species Caught</th>
            </tr>

<?php
$sql = 'SELECT fldLocation, fldWaterbody, fldSpeciesCaught FROM tblFishingSpots';
$statement = $pdo->prepare($sql);
$statement->execute();

$records = $statement->fetchAll();

foreach($records as $record){
    print '<tr>';
    print '<td>' . $record['fldLocation'] . '</td>';
    print '<td>' . $record['fldWaterbody'] . '</td>';
    print '<td>' . $record['fldSpeciesCaught'] . '</td>';
    print '</tr>' . PHP_EOL;
}
?>
            <tr>
                <td colspan="3">Source: <cite><a href="https://vtfishandwildlife.com/fish/fishing-opportunities/fishing-chittenden-county" target="_blank">https://vtfishandwildlife.com/fish/fishing-opportunities/fishing-chittenden-county</a></cite></td>
            </tr>
        </table>
    </section>

    <section>
        <h2>Where to buy fishing gear in Chittenden County</h2>
        <figure class="rounded">
            
            <img class="rounded" alt="Winooski River Brown Trout" src="images/brown-trout.png">
            <figcaption>Winooski River Brown Trout<cite>Photo by Ty Joe</cite></figcaption>
                    
        </figure>
        <ul>
            <li>Dattilio's Guns & Tackle, South Burlington</li>
            <li>Ray's Seafood Bait & Tackle, Burlington</li>
            <li>West Marine, South Burlington</li>
            <li>Walmart, Williston</li>
            <li>DICK's Sporting Goods, Williston</li>
            <li>Source: <cite>Ty Joe</cite></li>
        </ul>
    </section>
</main>
<?php
include 'footer.php';
?>

    