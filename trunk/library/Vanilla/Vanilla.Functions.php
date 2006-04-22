<?php
/*
* Copyright 2003 - 2005 Mark O'Sullivan
* This file is part of Vanilla.
* Vanilla is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
* Vanilla is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.
* You should have received a copy of the GNU General Public License along with Vanilla; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
* The latest source code for Vanilla is available at www.lussumo.com
* Contact Mark O'Sullivan at mark [at] lussumo [dot] com
*
* Description: Utility functions specific to Vanilla
*/

function DiscussionPrefix(&$Configuration, &$Discussion) {
	$Prefix = '';
	if (!$Discussion->Active && $Configuration['TEXT_HIDDEN'] != '') $Prefix = $Configuration['TEXT_HIDDEN'];

	if ($Discussion->Sticky && $Configuration['TEXT_STICKY'] != '' && $Prefix != '') $Prefix .= ', ';
	if ($Discussion->Sticky && $Configuration['TEXT_STICKY'] != '') $Prefix .= $Configuration['TEXT_STICKY'];
	
	if ($Discussion->Closed && $Configuration['TEXT_CLOSED'] != '' && $Prefix != '') $Prefix .= ', ';
	if ($Discussion->Closed && $Configuration['TEXT_CLOSED'] != '') $Prefix .= $Configuration['TEXT_CLOSED'];

	if ($Discussion->Bookmarked && $Configuration['TEXT_BOOKMARKED'] != '' && $Prefix != '') $Prefix .= ', ';
	if ($Discussion->Bookmarked && $Configuration['TEXT_BOOKMARKED'] != '') $Prefix .= $Configuration['TEXT_BOOKMARKED'];

	if ($Discussion->Sink && $Configuration['TEXT_SINK'] != '' && $Prefix != '') $Prefix .= ', ';
	if ($Discussion->Sink && $Configuration['TEXT_SINK'] != '') $Prefix .= $Configuration['TEXT_SINK'];

	if ($Discussion->WhisperUserID > 0 && $Configuration['TEXT_WHISPERED'] != '' && $Prefix != '') $Prefix .= ', ';
	if ($Discussion->WhisperUserID > 0 && $Configuration['TEXT_WHISPERED'] != '') $Prefix .= $Configuration['TEXT_WHISPERED'];

	if ($Prefix != '') return $Configuration['TEXT_PREFIX'].$Prefix.$Configuration['TEXT_SUFFIX'].' ';
}

function GetLastCommentQuerystring(&$Discussion, &$Configuration) {
	$Suffix = '';
	if ($Configuration['URL_BUILDING_METHOD'] == 'mod_rewrite') $Suffix = CleanupString($Discussion->Name).'/';
   $JumpToItem = $Discussion->CountComments - (($Discussion->LastPage - 1) * $Configuration['COMMENTS_PER_PAGE']);
	if ($JumpToItem < 0) $JumpToItem = 0;
	$LastPage = $Discussion->LastPage;
	if ($LastPage == 0) $LastPage = '';
	return GetUrl($Configuration, 'comments.php', '', 'DiscussionID', $Discussion->DiscussionID, $LastPage, '#Item_'.$JumpToItem, $Suffix);
}

function GetUnreadQuerystring(&$Discussion, &$Configuration, $CurrentUserJumpToLastCommentPref = '0') {
	$Suffix = '';
	if ($Configuration['URL_BUILDING_METHOD'] == 'mod_rewrite') $Suffix = CleanupString($Discussion->Name).'/';
	if ($CurrentUserJumpToLastCommentPref) {
		$UnreadCommentCount = $Discussion->CountComments - $Discussion->NewComments + 1;
		$ReadCommentCount = $Discussion->CountComments - $Discussion->NewComments;
		$PageNumber = CalculateNumberOfPages($ReadCommentCount, $Configuration['COMMENTS_PER_PAGE']);
		$JumpToItem = $ReadCommentCount - (($PageNumber-1) * $Configuration['COMMENTS_PER_PAGE']);
		if ($JumpToItem < 0) $JumpToItem = 0;
		if ($PageNumber == 0) $PageNumber = '';
		return GetUrl($Configuration, 'comments.php', '', 'DiscussionID', $Discussion->DiscussionID, $PageNumber, '#Item_'.$JumpToItem, $Suffix);
	} else {
		return GetUrl($Configuration, 'comments.php', '', 'DiscussionID', $Discussion->DiscussionID, '', '', $Suffix);
	}
}

function HighlightTrimmedString($Haystack, $Needles, $TrimLength = '') {	
   $Highlight = '<span class="Highlight">\1</span>';
	$Pattern = '#(?!<.*?)(%s)(?![^<>]*?>)#i';
	$TrimLength = ForceInt($TrimLength, 0);
	if ($TrimLength > 0) $Haystack = SliceString($Haystack, $TrimLength);
	$WordsToHighlight = count($Needles);
	if ($WordsToHighlight > 0) {
		$i = 0;
		for ($i = 0; $i < $WordsToHighlight; $i++) {
         $CurrentWord = preg_quote($Needles[$i]);
         $Regex = sprintf($Pattern, $CurrentWord);
         $Haystack = preg_replace($Regex, $Highlight, $Haystack);
		}
	}
	return $Haystack;
}


function ParseQueryForHighlighting(&$Context, $Query) {
	if ($Query != '') {
		$Query = eregi_replace('"', '', $Query);
		$Query = eregi_replace(' '.$Context->GetDefinition('And').' ', ' ', $Query);
		$Query = eregi_replace(' '.$Context->GetDefinition('Or').' ', ' ', $Query);
		return explode(' ', $Query);
	} else {
		return array();
	}	
}
?>