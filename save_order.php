<meta charset="UTF-8" />
<?php

date_default_timezone_set("Asia/Bangkok");
$now = new DateTime();
$dateRent = $now->format('d-m-Y');
$timeRent = $now->format('H:i');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cartclothesid = $_POST['cartclothesid'];
    $rentlistid = $_POST['rentlistid'];
    $dateGive = date("d-m-Y",strtotime($_POST['dateGive']));
    $dateReturn = date("d-m-Y",strtotime($_POST['dateReturn']));
    $userid = $_POST['userid'];

    $order_number = (rand(1, 1000000));

    $doc = new DOMDocument();
    $doc->load('backend/db/rents.xml');
    $clothes = $doc->getElementsByTagName("Clothe");
    $types = $doc->getElementsByTagName("Type");

    foreach ($clothes as $clothe) {
        $clothesid = $clothe->getAttribute("clothesid");
        if ($clothesid == $cartclothesid) {


            $names = $clothe->getElementsByTagName("Name");
            $clothesname = $names->item(0)->nodeValue;
        }
    }


    fnDOMAddElement($cartclothesid, $rentlistid, $dateRent, $timeRent, $dateGive, $dateReturn, $userid, $order_number);
    echo "<script>";
    echo "window.location ='success_order.php?success=$clothesname&orderno=$order_number'; ";
    echo "</script>";
} else {

    echo "<script>";
    echo "alert('ไม่สามารถทำรายการได้');";
    echo "window.location ='product_rent.php?ID=$cartclothesid'; ";
    echo "</script>";
}
function fnDOMAddElement($cartclothesid, $rentlistid, $dateRent, $timeRent, $dateGive, $dateReturn, $userid, $order_number)
{
    $dom = new DOMDocument();
    $dom->load('backend/db/rents.xml');
    $RentLists = $dom->getElementsByTagName('RentLists');

    foreach ($RentLists as $add_RentList) {

        $add_RentList->childNodes->item(0);

        $RentList = $dom->createElement('RentList');
        $RentList->setAttribute('rentid', $rentlistid);
        $RentList->setAttribute('clothesidref', $cartclothesid);
        $RentList->setAttribute('status', "1");
        $RentList->setAttribute('userid', $userid);

        $prop = $dom->createElement('OrderNo', $order_number);
        $RentList->appendChild($prop);

        $prop = $dom->createElement('DateRent', $dateRent);
        $RentList->appendChild($prop);

        $prop = $dom->createElement('TimeRent', $timeRent);
        $RentList->appendChild($prop);

        $prop = $dom->createElement('DateGive', $dateGive);
        $RentList->appendChild($prop);

        $prop = $dom->createElement('DateReturn', $dateReturn);
        $RentList->appendChild($prop);

        $add_RentList->appendChild($RentList);
    }

    $dom->save('backend/db/rents.xml');
}
?>