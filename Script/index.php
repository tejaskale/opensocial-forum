<?php
/* * * * * * * * * * * * * *
Social Kit - A Social Networking Platform
Copyright (c) 2014 Rehan Adil. All rights reserved.

@author Rehan Adil (MarvelKit)
@author_url http://codecanyon.net/user/MarvelKit
* * * * * * * * * * * * * */

error_reporting(0);
require_once('assets/includes/core.php');

if (!isset($_GET['tab1'])) {
    $_GET['tab1'] = 'welcome';
}

switch ($_GET['tab1']) {
    
    // Welcome page source
    case 'welcome':
        include('assets/sources/welcome.php');
    break;
    
    // Email verification source
    case 'email-verification':
        include('assets/sources/email_verification.php');
    break;
    
    // Home page source
    case 'home':
        include('assets/sources/home.php');
    break;
    
    // Messages page source
    case 'messages':
        include('assets/sources/messages.php');
    break;
    
    // Timeline page source
    case 'timeline':
        include('assets/sources/timeline.php');
    break;
    
    // Story page source
    case 'story':
        include('assets/sources/story.php');
    break;

    // Album page source
    case 'album':
        include('assets/sources/album.php');
    break;
    
    // Create page source
    case 'create_page':
        include('assets/sources/create_page.php');
    break;
    
    // Create group page source
    case 'create_group':
        include('assets/sources/create_group.php');
    break;
    
    // Hashtag page source
    case 'hashtag':
        include('assets/sources/hashtag.php');
    break;
    
    // Search page source
    case 'search':
        include('assets/sources/search.php');
    break;
    
    // User settings page source
    case 'settings':
        include('assets/sources/user_settings.php');
    break;
    
    // More features page source
    case 'more':
        include('assets/sources/more.php');
    break;
    
    // Terms page source
    case 'terms':
        include('assets/sources/terms.php');
    break;
    
    // Logout source
    case 'logout':
        include('assets/sources/logout.php');
    break;
    //Custom group code
    case 'custom_timeline':
        include('assets/sources/custom_timeline.php');
    break;
    
}

// If no sources found
if (empty($sk['content'])) {
    $sk['content'] = SK_getPage('welcome/error');
}
if($_GET['tab1'] == 'custom_timeline'){
	// Init the facebook API to get the login URL.
	/* Facebook Developer API */
	require_once("assets/imports/facebook/facebook.php");
	
	$fb_config = array(
	    'appId' => $fb_app_id,
	    'secret' => $fb_app_secret,
	    'fileUpload' => false,
	    'allowSignedRequest' => false,
	);
	
	$facebook = new Facebook($fb_config);
	$params = array(
	  'scope' => 'email',
	  'redirect_uri' => $config['site_url'] . '/import.php?type=facebook'
	);
	
	$fb_login_url = $facebook->getLoginUrl($params);
	
	$sk['fb_login_url'] = $fb_login_url;
	echo SK_getPage('custom_container');
}else{
    echo SK_getPage('container');
}
mysqli_close($dbConnect);