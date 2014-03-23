<?php 

	// Select Player list from PwlInf
	$Gbl_MySql_query_PwlInf = " Select * From PwlInf ";
	$Gbl_MySql_query_PwlInf .= " Where PwlPlyCod = '@PlayerID' ";

	// Select Player list from PwlInf join with PlyInf
	$Gbl_MySql_query_PwlInfPlyInf = " Select * From PwlInf, PlyInf ";
	$Gbl_MySql_query_PwlInfPlyInf .= " Where PwlVstDtm like '@CurrentDate%' ";
	$Gbl_MySql_query_PwlInfPlyInf .= " And PlyCod = PwlPlyCod  Order by PwlVstDtm ";
	
	// Select Player Information from PwlInf join with PlyInf
	$Gbl_MySql_query_PwlInfPlyInf_OnePlayer = " Select * From PwlInf, PlyInf ";
	$Gbl_MySql_query_PwlInfPlyInf_OnePlayer .= " Where PwlSeqNum = @SeqNum ";
	$Gbl_MySql_query_PwlInfPlyInf_OnePlayer .= " And PlyCod = PwlPlyCod ";
        
?>
