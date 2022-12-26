<?php 
	require_once 'assets/php/RICalcNSCDB.php';
?>
<!DOCTYPE html>
<html lang='en'>
<!--<html lang='en' manifest='./assets/appcache/index.appcache'>-->
    <head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
        <meta name='robots' content='all' />
        <meta name='robots' content='index, follow' />
        <meta name='robots' content='noodp, noydir' />
        <meta name='keywords' content='calculator, rubikidea, rubikidea.com, php, session, cookie, db' />
        <meta name='description' content='Simple Calculator by PHP using NO Session or Cookie or DB' />
        <meta name='title' content='RubikIdea.com' />
        <meta name='HandheldFriendly' content='true'/>
        <meta name='rating' content='general' />
        <meta name='rating' content='safe for kids' />
        <meta name='revisit-after' content='7 Days' />
            
        <!-- Viewport -->
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui' />
        <meta name='apple-mobile-web-app-capable' content='yes' />
        <meta name='apple-mobile-web-app-status-bar-style' content='black' />
        <meta name='apple-mobile-web-app-title' content='RubikIdea.com' />
        
        <!-- Author -->
        <meta name='author' content='rubikidea.com' />
        <meta name='signet:authors' content='RubikIdea.com' />
        <meta name='signet:links' content='https://rubikidea.com/' />
        
        <!-- Facebook Preview -->
        <meta property='og:locale' content='en' />
        <meta property='og:site_name' content='RubikIdea.com' />
        <meta property='og:title' content='RubikIdea.com' />
        <meta property='og:description' content='Simple Calculator by PHP using NO Session or Cookie or DB' />
        <meta property='og:type' content='website' />
        <meta property='og:url' content='https://rubikidea.com/' />
        <meta property='og:image' content='https://rubikidea.com/assets/images/logos/fb.png' />
        <meta property='og:image:type' content='image/png' />
        <meta property='og:image:width' content='227' />
        <meta property='og:image:height' content='227' />
            
        <!-- Twitter Card -->
        <meta name='twitter:card' content='summary' />
        <meta name='twitter:site' content='@rubikideacom' />
        <meta name='twitter:title' content='rubikideacom' />
        <meta name='twitter:description' content='Simple Calculator by PHP using NO Session or Cookie or DB' />
        <meta name='twitter:image:src' content='https://rubikidea.com/assets/images/logos/fb.png' />
        <meta name='twitter:domain' content='https://rubikidea.com/' />

        <link rel='help' href='https://rubikidea.com/Contact.php' />
        <link rel='search' href='https://rubikidea.com/Search.php' />
        <link rel='canonical' href='https://rubikidea.com/' />
        <link rel='shortlink' href='https://rubikidea.com/' />
        <link rel='icon' type='image/png' href='https://rubikidea.com/assets/images/logos/favicon.png' />
        <link rel='shortcut icon' type='image/png' href='https://rubikidea.com/assets/images/logos/favicon.png' />
        <link rel='image_src' href='https://rubikidea.com/assets/images/logos/favicon.png' />
            
        <!-- App Icons -->
        <meta name='msapplication-TileColor' content='#fff' />
        <meta name='msapplication-TileImage' content='https://rubikidea.com/assets/images/logos/favicon.png' />
        <link rel='apple-touch-icon-precomposed' sizes='57x57' href='https://rubikidea.com/assets/images/logos/apple-touch-icon-57-precomposed.png' />
        <link rel='apple-touch-icon-precomposed' sizes='72x72' href='https://rubikidea.com/assets/images/logos/apple-touch-icon-72-precomposed.png' />
        <link rel='apple-touch-icon-precomposed' sizes='114x114' href='https://rubikidea.com/assets/images/logos/apple-touch-icon-114-precomposed.png' />
        <link rel='apple-touch-icon-precomposed' sizes='144x144' href='https://rubikidea.com/assets/images/logos/apple-touch-icon-144-precomposed.png' />
        <link rel='apple-touch-icon' sizes='60x60' href='https://rubikidea.com/assets/images/logos/apple-touch-icon-iphone.png' />
        <link rel='apple-touch-icon' sizes='76x76' href='https://rubikidea.com/assets/images/logos/touch-icon-ipad.png' />
        <link rel='apple-touch-icon' sizes='120x120' href='https://rubikidea.com/assets/images/logos/touch-icon-iphone-retina.png' />
        <link rel='apple-touch-icon' sizes='152x152' href='https://rubikidea.com/assets/images/logos/touch-icon-ipad-retina.png' />
            
        <!-- Styles -->
        <link rel='stylesheet' type='text/css' href='./assets/css/reset.css' media='all' />
        <link rel='stylesheet' type='text/css' href='./assets/css/styles.css' media='all' />
        
        <title>RubikIdea Calculator: No Session, No Cookie, No DB</title>
    </head>
<body>
<form method='POST' action=''>
	<table align='center' class='calculator'>
		<tr>
			<td colspan='5'>
				<input type='text' name='result' class='result' value='<?php echo $RICalcNSCDBObj->result; ?>' />
			</td>
			<input type='hidden' name='lastOperator' value='<?php echo $RICalcNSCDBObj->lastOperator; ?>' />
			<input type='hidden' name='firstNum' value='<?php echo $RICalcNSCDBObj->firstNum; ?>' />
			<input type='hidden' name='lastNum' value='<?php echo $RICalcNSCDBObj->lastNum; ?>' />
		</tr>
		<tr>
			<td colspan='5'>
			<table>
				<tr><td>
					<input type='submit' name='ao' class='clr' value='backspace' />
					<input type='submit' name='ao' class='clr' value='CE' />
					<input type='submit' name='ao' class='clr' value='CLR' />
				</td></tr>
			</table>
			</td>			
		</tr>
		<tr>
			<td><input type='submit' name='num' class='num' value='7' /></td>
			<td><input type='submit' name='num' class='num' value='8' /></td>
			<td><input type='submit' name='num' class='num' value='9' /></td>
			<td><input type='submit' name='operator' class='operator' value='/' /></td>
			<td><input type='submit' name='ao' class='operator' value='sqrt' /></td>
		</tr>
		<tr>
			<td><input type='submit' name='num' class='num' value='4' /></td>
			<td><input type='submit' name='num' class='num' value='5' /></td>
			<td><input type='submit' name='num' class='num' value='6' /></td>
			<td><input type='submit' name='operator' class='operator' value='*' /></td>
			<td><input type='submit' name='ao' class='operator' value='%' onclick='notSupported(); return false;' /></td>
		</tr>
		<tr>
			<td><input type='submit' name='num' class='num' value='1' /></td>
			<td><input type='submit' name='num' class='num' value='2' /></td>
			<td><input type='submit' name='num' class='num' value='3' /></td>
			<td><input type='submit' name='operator' class='operator' value='-' /></td>
			<td><input type='submit' name='ao' class='operator' value='1/x' /></td>
		</tr>
		<tr>
			<td><input type='submit' name='ao' class='operator' value='+/-' /></td>
			<td><input type='submit' name='num' class='num' value='0' /></td>
			<td><input type='submit' name='ao' class='operator' value='.' /></td>
			<td><input type='submit' name='operator' class='operator' value='+' /></td>
			<td><input type='submit' name='finalResult' class='operator' value='=' /></td>
		</tr>		
	</table>
</form>
    <script type='text/javascript' src='./assets/js/general.js'></script>
</body>
</html>