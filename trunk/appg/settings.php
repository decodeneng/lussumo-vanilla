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
* Description: Global application constants
* 
* !DO NOT CHANGE ANYTHING IN THIS FILE!
* 
* If you wish to override any configuration setting, do it in the
* conf/settings.php file (they will override any settings made
* here).
*/

// ob_start();

$Configuration = array();

// Database Settings
$Configuration["DATABASE_SERVER"] = "MySQL";
$Configuration["DATABASE_TABLE_PREFIX"] = "LUM_";
$Configuration["DATABASE_HOST"] = "localhost"; 
$Configuration["DATABASE_NAME"] = "your_vanilla_database_name"; 
$Configuration["DATABASE_USER"] = "your_vanilla_database_user_name"; 
$Configuration["DATABASE_PASSWORD"] = "your_vanilla_database_password"; 
$Configuration["FARM_DATABASE_HOST"] = ""; 
$Configuration["FARM_DATABASE_NAME"] = "your_farm_database_name"; 
$Configuration["FARM_DATABASE_USER"] = "your_farm_database_user_name"; 
$Configuration["FARM_DATABASE_PASSWORD"] = "your_farm_database_password"; 

// Path Settings
$Configuration["APPLICATION_PATH"] = "/path/to/vanilla/";
$Configuration["DATABASE_PATH"] = "/path/to/your/database/file.php"; 
$Configuration["LIBRARY_PATH"] = "/path/to/your/library/"; 
$Configuration["EXTENSIONS_PATH"] = "/path/to/your/extensions/"; 
$Configuration["LANGUAGES_PATH"] = "/path/to/your/languages/";
$Configuration["THEME_PATH"] = "/path/to/vanilla/themes/vanilla/";

// People Settings
$Configuration["AUTHENTICATION_MODULE"] = "People/People.Class.Authenticator.php";
$Configuration["COOKIE_USER_KEY"] = "lussumocookieone";
$Configuration["COOKIE_VERIFICATION_KEY"] = "lussumocookietwo";
$Configuration["SESSION_USER_IDENTIFIER"] = "LussumoUserID";
$Configuration["COOKIE_DOMAIN"] = ".domain.com"; 
$Configuration["COOKIE_PATH"] = "/"; 
$Configuration["SUPPORT_EMAIL"] = "support@domain.com"; 
$Configuration["SUPPORT_NAME"] = "Support"; 
$Configuration["LOG_ALL_IPS"] = "0";
$Configuration["FORWARD_VALIDATED_USER_URL"] = "./";
$Configuration["DEFAULT_ROLE"] = "0"; 
$Configuration["ALLOW_IMMEDIATE_ACCESS"] = "0"; 
$Configuration["APPROVAL_ROLE"] = "4"; 
$Configuration["SAFE_REDIRECT"] = "people.php?PageAction=SignOutNow"; 

// Framework Settings
$Configuration["URL_BUILDING_METHOD"] = "Standard";  // Standard or mod_rewrite
$Configuration["BASE_URL"] = "http://your.base.url/to/vanilla/";
$Configuration["CHARSET"] = "utf-8";
$Configuration["PAGE_EVENTS"] = array("Page_Init", "Page_Render", "Page_Unload");
$Configuration["PAGELIST_NEXT_TEXT"] = "Prev";
$Configuration["PAGELIST_PREVIOUS_TEXT"] = "Next";
$Configuration["PAGELIST_NUMERIC_TEXT"] = "0";
$Configuration["LIBRARY_NAMESPACE_ARRAY"] = array("Framework", "People", "Vanilla");
$Configuration["DEFAULT_FORMAT_TYPE"] = "Text";
$Configuration["FORMAT_TYPES"] = array("Text");
$Configuration["APPLICATION_TITLE"] = "Vanilla"; 
$Configuration["BANNER_TITLE"] = "Vanilla"; 
$Configuration["DEFAULT_STYLE"] = "./themes/vanilla/styles/default/"; 
$Configuration["DOMAIN"] = "http://www.domain.com/vanilla/";
$Configuration["SIGNIN_URL"] = "./people.php";
$Configuration["SIGNOUT_URL"] = "./people.php?PostBackAction=SignOutNow";

// Vanilla Settings
$Configuration["ENABLE_WHISPERS"] = "0";
$Configuration["DISCUSSIONS_PER_PAGE"] = "30"; 
$Configuration["COMMENTS_PER_PAGE"] = "50"; 
$Configuration["SEARCH_RESULTS_PER_PAGE"] = "30"; 
$Configuration["ALLOW_NAME_CHANGE"] = "1";
$Configuration["ALLOW_EMAIL_CHANGE"] = "1";
$Configuration["ALLOW_PASSWORD_CHANGE"] = "1";
$Configuration["USE_REAL_NAMES"] = "1";
$Configuration["PUBLIC_BROWSING"] = "1"; 
$Configuration["USE_CATEGORIES"] = "1"; 
$Configuration["PANEL_BOOKMARK_COUNT"] = "10"; 
$Configuration["PANEL_PRIVATE_COUNT"] = "5"; 
$Configuration["PANEL_HISTORY_COUNT"] = "5"; 
$Configuration["PANEL_USER_DISCUSSIONS_COUNT"] = "5"; 
$Configuration["PANEL_SEARCH_COUNT"] = "20";
$Configuration["MAX_COMMENT_LENGTH"] = "5000"; 
$Configuration["MAX_TOPIC_WORD_LENGTH"] = "45"; 
$Configuration["DISCUSSION_POST_THRESHOLD"] = "3"; 
$Configuration["DISCUSSION_TIME_THRESHOLD"] = "60"; 
$Configuration["DISCUSSION_THRESHOLD_PUNISHMENT"] = "120"; 
$Configuration["COMMENT_POST_THRESHOLD"] = "5"; 
$Configuration["COMMENT_TIME_THRESHOLD"] = "60"; 
$Configuration["COMMENT_THRESHOLD_PUNISHMENT"] = "120"; 
$Configuration["TEXT_WHISPERED"] = "Private"; 
$Configuration["TEXT_STICKY"] = "Sticky"; 
$Configuration["TEXT_CLOSED"] = "Closed"; 
$Configuration["TEXT_HIDDEN"] = "Hidden"; 
$Configuration["TEXT_BOOKMARKED"] = ""; 
$Configuration["TEXT_PREFIX"] = "["; 
$Configuration["TEXT_SUFFIX"] = "]";
$Configuration["UPDATE_URL"] = "http://lussumo.com/updatecheck/vanilla.php";

// Vanilla Control Positions
$Configuration["CONTROL_POSITION_HEAD"] = "100";
$Configuration["CONTROL_POSITION_MENU"] = "200";
$Configuration["CONTROL_POSITION_BANNER"] = "200";
$Configuration["CONTROL_POSITION_PANEL"] = "300";
$Configuration["CONTROL_POSITION_BODY_ITEM"] = "400";
$Configuration["CONTROL_POSITION_FOOT"] = "500";
$Configuration["CONTROL_POSITION_PAGE_END"] = "600";

// Vanilla Tab Positions
$Configuration["TAB_POSITION_DISCUSSIONS"] = "10";
$Configuration["TAB_POSITION_CATEGORIES"] = "20";
$Configuration["TAB_POSITION_SEARCH"] = "30";
$Configuration["TAB_POSITION_SETTINGS"] = "40";
$Configuration["TAB_POSITION_ACCOUNT"] = "50";

// Url Rewriting Definitions
$Configuration["REWRITE_categories.php"] = "categories/";
$Configuration["REWRITE_index.php"] = "discussions/";
$Configuration["REWRITE_comments.php"] = "discussion/";
$Configuration["REWRITE_search.php"] = "search/";
$Configuration["REWRITE_account.php"] = "account/";
$Configuration["REWRITE_settings.php"] = "settings/";
$Configuration["REWRITE_post.php"] = "post/";
$Configuration["REWRITE_people.php"] = "people/";

// Default values for role permissions
// Standard Permissions
$Configuration["PERMISSION_SIGN_IN"] = "0";
$Configuration["PERMISSION_ADD_COMMENTS"] = "0";
$Configuration["PERMISSION_START_DISCUSSION"] = "0";
$Configuration["PERMISSION_HTML_ALLOWED"] = "0";
// Discussion Moderator Permissions
$Configuration["PERMISSION_STICK_DISCUSSIONS"] = "0";
$Configuration["PERMISSION_HIDE_DISCUSSIONS"] = "0";
$Configuration["PERMISSION_CLOSE_DISCUSSIONS"] = "0";
$Configuration["PERMISSION_EDIT_DISCUSSIONS"] = "0";
$Configuration["PERMISSION_VIEW_HIDDEN_DISCUSSIONS"] = "0";
$Configuration["PERMISSION_EDIT_COMMENTS"] = "0";
$Configuration["PERMISSION_HIDE_COMMENTS"] = "0";
$Configuration["PERMISSION_VIEW_HIDDEN_COMMENTS"] = "0";
$Configuration["PERMISSION_ADD_COMMENTS_TO_CLOSED_DISCUSSION"] = "0";
$Configuration["PERMISSION_ADD_CATEGORIES"] = "0";
$Configuration["PERMISSION_EDIT_CATEGORIES"] = "0";
$Configuration["PERMISSION_REMOVE_CATEGORIES"] = "0";
$Configuration["PERMISSION_SORT_CATEGORIES"] = "0";
$Configuration["PERMISSION_VIEW_ALL_WHISPERS"] = "0";
// User Moderator Permissions
$Configuration["PERMISSION_APPROVE_APPLICANTS"] = "0";
$Configuration["PERMISSION_RECEIVE_APPLICATION_NOTIFICATION"] = "0";
$Configuration["PERMISSION_CHANGE_USER_ROLE"] = "0";
$Configuration["PERMISSION_EDIT_USERS"] = "0";
$Configuration["PERMISSION_IP_ADDRESSES_VISIBLE"] = "0";
$Configuration["PERMISSION_MANAGE_REGISTRATION"] = "0";
$Configuration["PERMISSION_SORT_ROLES"] = "0";
$Configuration["PERMISSION_ADD_ROLES"] = "0";
$Configuration["PERMISSION_EDIT_ROLES"] = "0";
$Configuration["PERMISSION_REMOVE_ROLES"] = "0";
// Administrative Permissions
$Configuration["PERMISSION_CHECK_FOR_UPDATES"] = "0";
$Configuration["PERMISSION_CHANGE_APPLICATION_SETTINGS"] = "0";
$Configuration["PERMISSION_MANAGE_EXTENSIONS"] = "0";
$Configuration["PERMISSION_MANAGE_LANGUAGE"] = "0";
$Configuration["PERMISSION_MANAGE_STYLES"] = "0";
$Configuration["PERMISSION_ALLOW_DEBUG_INFO"] = "0";

// Default values for User Preferences
$Configuration["PREFERENCE_HtmlOn"] = "1";
$Configuration["PREFERENCE_ShowBookmarks"] = "0";
$Configuration["PREFERENCE_ShowRecentDiscussions"] = "0";
$Configuration["PREFERENCE_ShowPrivateDiscussions"] = "0";
$Configuration["PREFERENCE_ShowRecentDiscussions"] = "0";
$Configuration["PREFERENCE_ShowBrowsingHistory"] = "0";
$Configuration["PREFERENCE_ShowAppendices"] = "1";
$Configuration["PREFERENCE_ShowSavedSearches"] = "1";
$Configuration["PREFERENCE_ShowTextToggle"] = "1";
$Configuration["PREFERENCE_JumpToLastReadComment"] = "1";
$Configuration["PREFERENCE_ShowLargeCommentBox"] = "0";
$Configuration["PREFERENCE_ShowFormatSelector"] = "1";
$Configuration["PREFERENCE_ShowDeletedDiscussions"] = "0";
$Configuration["PREFERENCE_ShowDeletedComments"] = "0";

// Application versions
define("PEOPLE_VERSION", "0.0.1");
define("VANILLA_VERSION", "0.9.3");

// Application Mode Constants
define("MODE_DEBUG", "DEBUG"); 
define("MODE_RELEASE", "RELEASE"); 

// Format type definitions
define("FORMAT_STRING_FOR_DISPLAY", "DISPLAY"); 
define("FORMAT_STRING_FOR_DATABASE", "DATABASE");

// PHP Settings
define("MAGIC_QUOTES_ON", get_magic_quotes_gpc());

// Include custom settings
include(dirname(__FILE__) . "/../conf/settings.php");
?>