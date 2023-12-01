<?php
include 'top.php';

$fishingDerbyWinners = array(
    array(2022, 'Jonny Lynch', 'Milton, VT', '6/19/2022', '11:16 am'),
    array(2021, 'Alex Doudkin', 'Barre, VT', '6/20/2021', '12:20 pm'),
    array(2020, 'Tyler Lareau', 'Montpilier, VT', '6/21/2020', '11:49 am'),
    array(2019, 'Carter Hillson', 'Burlington, VT', '6/16/2019', '10:13 am'),
    array(2018, 'Colin Zary', 'Shelburne, VT', '6/17/2018', '9:52 am')
);
?>
<main>
    <h1>Father's Day Derby</h1>
    <section>
        <h2>Fish from Father's Day Derby</h2>
        <figure class="rounded">
            <img class="rounded" alt="Bass from derby" src="images/derby-bass.png">
            <figcaption>A nice fish caught at a past derby<cite>Photo by Ty Joe</cite></figcaption>
        </figure>
    </section>

<section>
        <h2>Last <?php // look up how to do this ?> Winners</h2>
            <table>
            <tr>
                <th>Year</th>
                <th>Winner</th>
                <th>Town</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
<?php
foreach($fishingDerbyWinners as $fishingDerbyWinner){
    print '<tr>';
    print '<td>' . $fishingDerbyWinner[0] . '</td>';
    print '<td>' . $fishingDerbyWinner[1] . '</td>';
    print '<td>' . $fishingDerbyWinner[2] . '</td>';
    print '<td>' . $fishingDerbyWinner[3] . '</td>';
    print '<td>' . $fishingDerbyWinner[4] . '</td>';
    print '</tr>' . PHP_EOL;
}
?>
            <tr>
                <td colspan="5"><cite>Information about the Derby <a href="https://www.mychamplain.net/fathers-day-derby" target="_blank">Derby 
                    Info</a></cite></td>
            </tr>
            </table>
</section>

    <section>
        <h2>About the Derby</h2>
        <p>The annual Lake Champlain Father's Day Derby is an event that many Vermont anglers highly anticipate every year. 
            The derby brings together fathers and their families to come enjoy one of Vermont's greatest fishing lakes, Lake Champlain! 
            The derby is held on father's day, a great time in the summer when the weather is good and the fishing is as well! The day is 
            always full of fun an excitement for both kids and adults. It is truly cherished by fathers as they get to spend time with their 
            families doing something that they truly enjoy. This event is truly special!</p>

        <p>While the fun of being out on the water is already enough of a treat, the fishing is at its peak in Vermont during father's day! 
            The fish at this point have all emerged from their stagnant winter state and are hungry and ready to bite. Due to the derby being
             held on Lake Champlain, there is always a possibility that you catch the unexpected! While the derby participants are usually 
             trying to catch the largest bass to win, bycatches can make it even more fun. There is a chance of hooking rare fish like sturgeon, 
             lake trout, and freshwater drum. Truly a treat for all.</p>

        <p>The derby is truly an experience that anyone who fishes in Vermont should experience. The atmosphere and excitement is unmatched.
            In order to enter participants only need a fishing license and their own gear. More information regarding the Derby
            can be found on the Derby's web site: <a href="https://www.mychamplain.net/fathers-day-derby" target="blank">https://www.mychamplain.net/fathers-day-derby</a></p>
    </section>
</main>
<?php
include 'footer.php';
?>

    