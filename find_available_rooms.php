<?php
// Input : 3, 8, 9, 20, 22, 25, 30
// Output : 1,2,4-8,10-20,21,21,23,24,26-30,31-100

$bookedRooms = [3, 8, 9, 20, 22, 25, 30];
$availableRoomString = ""; // Stores the final available room output
$availableTemp = [];       // Temporarily holds a sequence of available room numbers
$shortAvailable = '';      // Holds short sequences (less than 3) of available room numbers

for ($roomNumber = 1; $roomNumber <= 100; $roomNumber++) {
    $availableTemp[] = $roomNumber;

    if (in_array($roomNumber, $bookedRooms)) {
        //  availableTemp count is greater then 3 store the rooms as range 3-4
        $availableRoomString .= (count($availableTemp) > 3)? ',' . $availableTemp[0] . '-' . $availableTemp[count($availableTemp) - 1]: '';

        $availableTemp = []; // Reset after a booked room
    } else {
        // Collect short sequences of available rooms (less than 3)
        $shortAvailable = (count($availableTemp) < 3)? $shortAvailable . ',' . $roomNumber: '';
    }
    // shortAvailable variable value store in the availableRoomString variable
    $availableRoomString .= (count($availableTemp) == 0 && $shortAvailable !== '')? $shortAvailable: '';
}

// Remaining available rooms store in the availableRoomString variable
$availableRoomString .= (count($availableTemp) > 0)? ',' . $availableTemp[0] . '-' . $availableTemp[count($availableTemp) - 1]: '';

echo ltrim($availableRoomString, ','); // Clean first comma 
