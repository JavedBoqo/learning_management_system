<?php
function getNewspaperName($newspaperId) {
    if($newspaperId == NEWSPAPER_AZAAN) return "Azaan";
    elseif($newspaperId == NEWSPAPER_ASTOM) return "Astom";
}

function printR($data) {
	echo "<pre>".print_r($data,true)."</pre>";
}

function showHideForm($id) {
	$hideForm = $hideList = "";
	if($id == 0) {
	  $hideForm="display: none" ; $hideList = "display: block";
	} else {
	    $hideForm="display: block";$hideList = "display: none";
	} 
	return array($hideForm,$hideList);
}

function showInfo($msg,$success=true){
	$className = $success ? "alert-success" : "alert-danger";
	$m = '<div class="alert '.$className.'">';
	$m .= $msg;
	$m .= '</div>';
	return $m;
}

function getDistricts() {
	return array(
		"Gilgit","Hunza","Nagar","Diamer","Skardu"
	);
}

function deleteModal($task, $subTask) {
	$task = base64_encode($task);
	$subTask = base64_encode($subTask);
	$temp = "'{$task}', '{$subTask}'";

	echo ' <div id="custom-modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Delete</h4>
    <div class="custom-modal-text">
        <form class="form-horizontal" action="#">
            <div class="form-group m-b-25">
                	<div class="col-12">
						<label for="emailaddress3">Are you sure you want to delete?</label>					
				  </div>
				  <div class="result"></div>
            </div>
            <div class="form-group account-btn text-center m-t-10">
                <div class="col-12">
                    <a class="btn-action btn w-lg btn-rounded btn-custom waves-effect waves-light btn-danger" href="javascript:deleteRecord('.$temp.')">Yes</a>
                    <input type="hidden" id="delId" name="delId" value=""/>
                </div>
            </div>

        </form>
    </div>
</div>  ';
}

function deleteLink($id) {	
	return '<a href="#custom-modal" class="fa fa-window-close" data-animation="door" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a" onclick="setDeleteId('.$id.')"></a>';
}

function refreshPage($redirectTo) {
	return '<script>function refreshPage() {
		setTimeout(function(){
			window.location="'.$redirectTo.'";
		},2000);
	}
	refreshPage();
	</script>';
}

function reportTable($heads,$colspan) {
	$table = '<table class="table mb-0 report">
	<thead class="thead-light">
	<tr>';
	foreach($heads as $h) $table .='<th>'.$h.'</th>';
		
	$table .='</tr>
	</thead>
	<tbody>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="'.$colspan.'"><p style="font-style:italic;">'.SPRYSOL." Contact: ".SPRYSOL_CONTACT.'</p></td>
		</tr>
	</tfoot>
</table>';
return $table;
}

function amountInWords($number) {
	$number = str_replace(",","",$number);
	$no = round($number);
	$point = round($number - $no, 2) * 100;
	$hundred = null;
	$digits_1 = strlen($no);
	$i = 0;
	$str = array();
	$words = array('0' => '', '1' => 'one', '2' => 'two',
					'3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
					'7' => 'seven', '8' => 'eight', '9' => 'nine',
					'10' => 'ten', '11' => 'eleven', '12' => 'twelve',
					'13' => 'thirteen', '14' => 'fourteen',
					'15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
					'18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
					'30' => 'thirty', '40' => 'forty', '50' => 'fifty',
					'60' => 'sixty', '70' => 'seventy',
					'80' => 'eighty', '90' => 'ninety');
	$digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
	while ($i < $digits_1) {
		$divider = ($i == 2) ? 10 : 100;
		$number = floor($no % $divider);
		$no = floor($no / $divider);
		$i += ($divider == 10) ? 1 : 2;
		if ($number) {
			$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
			$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
			$str [] = ($number < 21) ? $words[$number] ." " . $digits[$counter] . $plural . " " . $hundred :
			$words[floor($number / 10) * 10]. " " . $words[$number % 10] . " ". $digits[$counter] . $plural . " " . $hundred;
		} else $str[] = null;
	}
	$str = array_reverse($str);
	$result = implode('', $str);
	$points = ($point) ? "." . $words[$point / 10] . " " .$words[$point = $point % 10] : '';
	//echo strtoupper($result) . "RUPEES";// . $points . " Paise";
	return strtoupper($result);
}

function getLoggedInUserId() {
    return isset($_SESSION["USER"]["ID"]) ? $_SESSION["USER"]["ID"] : 0;
}

function getLoggedInEmail() {
    return isset($_SESSION["USER"]["EMAIL"]) ? $_SESSION["USER"]["EMAIL"] : "";
}


function getLoggedInFullname() {
    return isset($_SESSION["USER"]["NAME"]) ? $_SESSION["USER"]["NAME"] : "";
}

function getCurrentNewspaperCode() {
    return isset($_SESSION["USER"]["NEWSPAPER"]) ? $_SESSION["USER"]["NEWSPAPER"] : 0;
}

function logoutUser() {	
	$_SESSION["USER"] = null;
	unset($_SESSION["USER"]);
	session_destroy();
}

