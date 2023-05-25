<?php

function validateNRC($nrcNumber)
{
    // Remove any whitespace characters from the NRC number
    $nrcNumber = preg_replace('/\s+/', '', $nrcNumber);
    
    // Check if the NRC number matches the expected format
    if (!preg_match('/^\d{1,2}\/[A-Za-z]{1,6}\([A-Za-z]\)\d{6}$/', $nrcNumber)) {
        return false;
    }
    
    // Extract the state and township codes from the NRC number
    $stateCode = substr($nrcNumber, 0, strpos($nrcNumber, '/'));
    $townshipCode = substr($nrcNumber, strpos($nrcNumber, '/') + 1, 6);
    $districtCode = substr($nrcNumber, strpos($nrcNumber, ')') - 1, 1);
    
    // Check if the state code is valid
    $validStates = array(
        '01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
        '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
        '21', '22', '23', '24', '25', '26', '27', '28', '29', '30',
        '31', '32'
    );
    
    if (!in_array($stateCode, $validStates)) {
        return false;
    }
    
    // All checks pass, the NRC number is valid
    return true;
}

// Example usage
$nrcNumber = '12/UKaMa(P)123456';

if (validateNRC($nrcNumber)) {
    echo "Valid NRC number.";
} else {
    echo "Invalid NRC number.";
}

?>

<!-- ADDRESS -->
<?php

$input = '15 Gordon St, 3121 Cremorne, Australia';
if (!preg_match('/^[^@]{1,63}@[^@]{1,255}$/', $input)) {
    echo 'Not matched';
} else {
    echo 'Matched';
}


// 1 phone
$phone = '000-0000-0000';

if(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phone)) {
  // $phone is valid
}

// 2
function validating($phone){
    $valid_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
    echo $valid_number.;
  }
  validating("+91-202-5555-0234");

// 3
  if(preg_match('/^[0-9]{10}+$/', $phone)) {
    echo "Valid Phone Number";
    } else {
    echo "Invalid Phone Number";
    }