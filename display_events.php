<?php

include 'iCalParser.php';
$file = 'https://p109-caldav.icloud.com/published/2/MTAyMTQ3MTU4OTAxMDIxNLIYbaRwAhcWGum4NLPEID38xPzy9FnK20AgEyZYfDAgqAhwPWyOqqP3wQ-2X0Q276hTKRcQl60bWM7RPZqMyUU';
$iCal = new iCal($file);
//Get all ical-objects of since the beginning of the current year
$events = $iCal->eventsByDateSince(substr(date('Y.m.d'), 0, 4) . '-01-01');

// display header for table
echo '   <table>
<tr style="font-weight:bolder;">
    <td>Date</td>
    <td>Event</td>
    <td>Location</td>
    <td>Ticket</td>';
// iterate over array of ical-Events and set date as the access key for an event in the list of events
foreach ($events as $date => $eventList) {
    // Print out every event of the specific event on a specific date 
    foreach ($eventList as $event) {
        $description = stringCleanUp($event->description());
        //only display events that have #online in the description (in apple calendar the field calles notes)      
        if (strpos($description ?? '', '#online') !== false) {
            $dateFormatted = date('d.m.Y', strtotime($event->dateStart));
            $eventName = stringCleanUp($event->summary());
            $location = stringCleanUp($event->location);
            $ticket = getLinkInDescription($description);
            // only display ticketlinks if they are in the event notes/descirpiton
            $css_ticketlink = ($ticket == "") ? "display:none" : "";
            echo '<tr style="border-top:0px">
                <td width=200>' . $dateFormatted . '</td>
                <td width=300>' . $eventName . '</td>
                <td width=200>' . $location . '</td>
               <td width=400><a style=' . $css_ticketlink . ' target=\'_blanc\' href="' . $ticket . '"><i class="fas fa-ticket-alt"></i></a></td>
            </tr>';
        }

    }
}
echo '</table>';
function getLinkInDescription($string)
{
    preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $string, $match);
    return (count($match[0]) > 0) ? strval($match[0][0]) : "";
}

function stringCleanUp($string)
{
    if ($string !== null) {
        $string = str_replace(["\n", "\\", ","], ' ', $string);
    }
    return $string;
}

?>
