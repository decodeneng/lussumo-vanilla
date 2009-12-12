<?php
/*
Extension Name: Minify
Extension Url: subjunk@gmail.com
Description: Combines, minifies, caches, gzips and serves correct headers for CSS and JavaScript files, making the forum load faster for users
Version: 1.0
Author: Klaus Burton
Author Url: http://www.redskiesdesign.com/
*/

// TODO: add packaging  level options.

$Context->AddToDelegate('Head',
      'PackAssets',
      'Minify_Head_PackAssets_Delegation');


/**
 * Handler for PackAssets Delegation
 *
 * @param Head $Head
 */
function Minify_Head_PackAssets_Delegation(&$Head) {
	$WebRoot = $Head->Context->Configuration['WEB_ROOT'];

	// Pack Scripts
	$Filters = Minify_GetScriptFilter(3);
	foreach ($Filters as $FilterPair) {
		list($ToPackFilter, $ToKeepFilter) = $FilterPair;
		$ToPackScripts = array_filter($Head->_Scripts, $ToPackFilter);
		$MinScript = Minify_Script($ToPackScripts, $WebRoot, $MinifyPrepend);

		if ($MinScript) {
			$Head->_Scripts = array_filter($Head->_Scripts, $ToKeepFilter);
			$Head->_Scripts[$MinScript] = 400;
		}
	}

	// Pack StyleSheets

	// TODO: Keep correct order or force the use of specific ranges by media
	$Collections = array();
	foreach ($Head->StyleSheets as $StyleSheet) {
		if (!array_key_exists($StyleSheet['Media'], $Collections)) {
			$Collections[$StyleSheet['Media']] = array();
		}
		$Collections[$StyleSheet['Media']][] = $StyleSheet['Sheet'];
	}


	$Head->StyleSheets = array();
	foreach ($Collections as $Media => $StyleSheets) {
		$MinStyleSheet = Minify_StyleSheets($StyleSheets, $WebRoot);
		if ($MinStyleSheet) {
			$Head->StyleSheets[] = array(
				'Media'=>$Media, 'Sheet'=>$MinStyleSheet);
		} else {
			foreach ($StyleSheets as $StyleSheet) {
				$Head->StyleSheets[] = array(
					'Media'=>$Media, 'Sheet'=>$StyleSheet);
			}
		}
	}
}


/**
 * Get URL for packed version of a collection of scripts
 *
 * Return false if there is less than two scripts to pack, or if any script
 * URL does not start by WebRoot.
 *
 * @param array $Scripts The key should a path, the value should  the script
 *              position.
 * @param string $WebRoot Path all the script start with.
 * @return bool|string
 */
function Minify_Script($Scripts, $WebRoot) {

	if (!is_array($Scripts) || count($Scripts) < 2) {
		return false;
	}

	$MinifyPrepend = '';
	if ($WebRoot !== "/") {
		$MinifyPrepend = 'b=' . trim($WebRoot, '/') . '&';
	}

	asort($Scripts, SORT_NUMERIC);
	
	$RelPaths = array();
	while (list($Script,) = each($Scripts)) {
		$RelPaths[] = Minify_MakeRelative($Script, $WebRoot);
	}

	return $WebRoot . 'extensions/Minify/'
		. $MinifyPrepend
		. 'f=' . implode(',', $RelPaths);
}

/**
 * Get URL for packed version of a collection of style sheets
 *
 * Return false if there is less than two style sheet, or if any script
 * URL does not start by WebRoot.
 *
 * @param array $StyleSheets The key should be the position of style sheet,
 *              the value should be the path
 * @param string $WebRoot
 * @return bool|string
 */
function Minify_StyleSheets($StyleSheets, $WebRoot) {

	if (!is_array($StyleSheets) || count($StyleSheets) < 2) {
		return false;
	}

	$MinifyPrepend = '';
	if ($WebRoot !== "/") {
		$MinifyPrepend = 'b=' . trim($WebRoot, '/') . '&';
	}

	foreach ($StyleSheets as &$Sheet) {
		$Sheet = Minify_MakeRelative($Sheet, $WebRoot);
		if ($Sheet === false) {
			return false;
		}
	}

	return !Error && $WebRoot . 'extensions/Minify/'
		. $WebRootMinifyPrepend
		. 'f=' . implode(',', $StyleSheets);
}

/**
 * Make the Path relative
 *
 * @param string $Path
 * @param string $Base
 * @return bool|string Return false if one of the path is not in $Base
 */
function Minify_MakeRelative($Path, $Base) {
	if (strpos($Path, $Base) === 0) {
		return substr($Path, strlen($Base));
	} else {
		return false;
	}
}

/**
 * Return an array of pair of filter to regroup scripts that can be packed together
 *
 * The first filter in a pair is used to select the script to package. The other
 * select the other ones.
 *
 * @param int $Level of packaging. 0: no packing, 1:package global and specific
 *            scripts but separatly. 2: package global and specific scripts together,
 *            3: package all packageable script together, including libraries;
 *            4: package all files.
 *
 * @return array
 */
function Minify_GetScriptFilter($Level) {
	switch ($Level) {
		case 1: // Pack Global and page scripts in two different packages
			return array(
				array('Minify_IsScriptGlobal', 'Minify_IsNotScriptGlobal'),
				array('Minify_IsScriptForPage', 'Minify_IsNotScriptForPage')
			);

		case 2: // Pack Global and page scripts together
			return array(
				array('Minify_IsPackableAndNotLibrary', 'Minify_IsNotPackableOrIsNotLibrary')
			);

		case 3: // Pack all packable scripts
			return array(
				array('Minify_IsPackable', 'Minify_IsNotPackable')
			);

		case 4: // Pack all scripts
			return array(
				array('Minify_AllScripts','Minify_NoScript')
			);

		default: // Pack no script.
			return array();;
	}
}

/** Script filters **/


function Minify_IsScriptGlobal($Position) {
	return $Position >= 200 && $Position < 300;
}

function Minify_IsNotScriptGlobal($Position) {
	return !Minify_IsScriptForPage($Position);
}


function Minify_IsScriptForPage($Position) {
	return $Position >= 300 && $Position < 400;
}

function Minify_IsNotScriptForPage($Position) {
	return !Minify_IsScriptForPage($Position);
}


function Minify_IsPackable($Position) {
	return $Position >= 100 && $Position < 400;
}

function Minify_IsNotPackable($Position) {
	return !Minify_IsPackable($Position);
}


function Minify_IsPackableAndNotLibrary($Position) {
	return $Position >= 200 && $Position < 400;
}

function Minify_IsNotPackableOrIsNotLibrary($Position) {
	return !Minify_IsPackableAndNotLibrary($Position);
}


function Minify_AllScripts($Position) {
	return true;
}

function Minify_NoScript($Position) {
	return false;
}