<?php

    include('../lib/full/qrlib.php');
    
    $codeText = 'https://www.youtube.com/watch?v=1Nr_tqkMsJs';
    // here our data
    $name         = 'John Doe';
    $sortName     = 'Doe;John';
    $phone        = '(049)012-345-678';
    $phonePrivate = '(049)012-345-987';
    $phoneCell    = '(049)888-123-123';
    $orgName      = 'My Company Inc.';

    $email        = 'john.doe@example.com';

    // if not used - leave blank!
    $addressLabel     = 'Our Office';
    $addressPobox     = '';
    $addressExt       = 'Suite 123';
    $addressStreet    = '7th Avenue';
    $addressTown      = 'New York';
    $addressRegion    = 'NY';
    $addressPostCode  = '91921-1234';
    $addressCountry   = 'USA';

    // we building raw data
    $codeContents  = 'BEGIN:VCARD'."\n";
    $codeContents .= 'VERSION:2.1'."\n";
    $codeContents .= 'N:'.$sortName."\n";
    $codeContents .= 'FN:'.$name."\n";
    $codeContents .= 'ORG:'.$orgName."\n";

    $codeContents .= 'TEL;WORK;VOICE:'.$phone."\n";
    $codeContents .= 'TEL;HOME;VOICE:'.$phonePrivate."\n";
    $codeContents .= 'TEL;TYPE=cell:'.$phoneCell."\n";

    $codeContents .= 'ADR;TYPE=work;'.
        'LABEL="'.$addressLabel.'":'
        .$addressPobox.';'
        .$addressExt.';'
        .$addressStreet.';'
        .$addressTown.';'
        .$addressPostCode.';'
        .$addressCountry
    ."\n";

    $codeContents .= 'EMAIL:'.$email."\n";

    $codeContents .= 'END:VCARD';
    
    QRcode::png($codeContents);
    // outputs image directly into browser, as PNG stream