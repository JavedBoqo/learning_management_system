<?php

class Video extends Department {
    
    function addVideo($deparmentId, $videoName,$videoLink) {
        $db = new Database();
        $sql  = "INSERT INTO ".TBL_VIDEO." (dept_id,video_name,video_link, ".SQL_COMMON_FIELDS.")".chr(10);
        $sql .= "VALUES(".chr(10);
        $sql .= "{$deparmentId},'{$videoName}','{$videoLink}',".STATUS_ACTIVE.",NOW(),NOW()".chr(10);
        $sql .= ")".chr(10);
        // echo $sql;
        $db->setQuery($sql);
        if($db->executeInserQuery()) return PROCESS_SUCCESS;
        else return PROCESS_FAIL;
    }

    function updateVideo( $videoID ,$deparmentId,$videoName,$videoLink) {
        $db = new Database();
        $sql  = "UPDATE ".TBL_VIDEO." SET".chr(10);
        $sql .= "video_name='{$videoName}',video_link='{$videoLink}',dept_id={$deparmentId}".chr(10);
        $sql .= "WHERE id={$videoID}".chr(10);
        // echo $sql;
        $db->setQuery($sql);
        if($db->executeUpdateQuery()) return PROCESS_SUCCESS;
        else return PROCESS_FAIL;
    }


    function deleteVideo($videoID) {
        $db = new Database();
        $sql  = "UPDATE ".TBL_VIDEO." SET".chr(10);
        $sql .= "status=".STATUS_INACTIVE.chr(10);
        $sql .= "WHERE id={$videoID}".chr(10);
        // echo $sql;
        $db->setQuery($sql);
        if($db->executeUpdateQuery()) return PROCESS_SUCCESS;        
        else return PROCESS_FAIL;
    }

    function getVideo($videoID=0) {
        $db = new Database();
        $sql ="SELECT dep_name,v.* FROM  ".TBL_VIDEO." v,".TBL_DEPARTMENT." d".chr(10);
        $sql .="WHERE v.status=".STATUS_ACTIVE.chr(10);
        $sql .="AND v.dept_id=d.id".chr(10);
        if($videoID > 0) $sql .="AND v.id={$videoID}".chr(10);
        $sql .="ORDER BY dept_id".chr(10);
        // echo $sql;
        $db->setQuery($sql);
        return $db->executeListQuery();
    }
}