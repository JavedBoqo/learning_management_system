<?php
    $video=new Video();
    $recID = isset($aPost['id']) && !empty($aPost['id']) ?  $aPost['id'] : 0;
	$sMsg = ERROR_UNEXPECTED;
	$vRedirectURL = "?p=".P_ADMIN_VIDEO;
	switch ($subTask) {
		case ACTION_DELETE:
				if($video->deleteVideo($recID) == PROCESS_SUCCESS) {
					$bStatus = true;
					$sMsg = "Video Deleted Successfully";
				}
			break;
	}	
?>