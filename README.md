# EasyiCalWebsiteIntegration
Easy example how to display events from an apple calendar on your homepage. 

## How can i use it?
Just replace the Caldav URL in display_events.php. Details for getting the URL from iClouds Apple Calendar can you read in my medium article.
Only events with the keyword #online in the description of the calendar event are beeing displayed. So you can separate your private events & events to display on your website without using 2 calendars.

At the current implementation there is also the possiblilty to add a ticket link in the description. Just paste a link in the descirpition field of your event and it will be referenced in the ticket icon.

Of course you can change the keyowrd in the display_events.php

## Example 
You can see the example integration in the file index.php

Output example:

![image](https://github.com/Jumbinator/calendar-caldav-website-integration/assets/63051149/92caff4d-76f6-44ad-b171-69fd50b545ec)


## Details

For Details just ready my medium post --> Link tbd.




Notes:
I used the iCalParser from seebz to parse the events from apple calendar via caldav.
Credits to Seedz: -> https://gist.github.com/seebz/c00a38d9520e035a6a8c


