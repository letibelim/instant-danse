


		

<!DOCTYPE html>
<html lang="en-US" >

<head>

	
	<script>
window.ts_endpoint_url = "https:\/\/slack.com\/beacon\/timing";

(function(e) {
	var n=Date.now?Date.now():+new Date,r=e.performance||{},t=[],a={},i=function(e,n){for(var r=0,a=t.length,i=[];a>r;r++)t[r][e]==n&&i.push(t[r]);return i},o=function(e,n){for(var r,a=t.length;a--;)r=t[a],r.entryType!=e||void 0!==n&&r.name!=n||t.splice(a,1)};r.now||(r.now=r.webkitNow||r.mozNow||r.msNow||function(){return(Date.now?Date.now():+new Date)-n}),r.mark||(r.mark=r.webkitMark||function(e){var n={name:e,entryType:"mark",startTime:r.now(),duration:0};t.push(n),a[e]=n}),r.measure||(r.measure=r.webkitMeasure||function(e,n,r){n=a[n].startTime,r=a[r].startTime,t.push({name:e,entryType:"measure",startTime:n,duration:r-n})}),r.getEntriesByType||(r.getEntriesByType=r.webkitGetEntriesByType||function(e){return i("entryType",e)}),r.getEntriesByName||(r.getEntriesByName=r.webkitGetEntriesByName||function(e){return i("name",e)}),r.clearMarks||(r.clearMarks=r.webkitClearMarks||function(e){o("mark",e)}),r.clearMeasures||(r.clearMeasures=r.webkitClearMeasures||function(e){o("measure",e)}),e.performance=r,"function"==typeof define&&(define.amd||define.ajs)&&define("performance",[],function(){return r}) // eslint-disable-line
})(window);

</script>
<script>

;(function() {
'use strict';


window.TSMark = function(mark_label) {
	if (!window.performance || !window.performance.mark) return;
	performance.mark(mark_label);
};
window.TSMark('start_load');


window.TSMeasureAndBeacon = function(measure_label, start_mark_label) {
	if (start_mark_label === 'start_nav' && window.performance && window.performance.timing) {
		window.TSBeacon(measure_label, (new Date()).getTime() - performance.timing.navigationStart);
		return;
	}
	if (!window.performance || !window.performance.mark || !window.performance.measure) return;
	performance.mark(start_mark_label + '_end');
	try {
		performance.measure(measure_label, start_mark_label, start_mark_label + '_end');
		window.TSBeacon(measure_label, performance.getEntriesByName(measure_label)[0].duration);
	} catch (e) {
		
	}
};


if ('sendBeacon' in navigator) {
	window.TSBeacon = function(label, value) {
		var endpoint_url = window.ts_endpoint_url || 'https://slack.com/beacon/timing';
		navigator.sendBeacon(endpoint_url + '?data=' + encodeURIComponent(label + ':' + value), '');
	};
} else {
	window.TSBeacon = function(label, value) {
		var endpoint_url = window.ts_endpoint_url || 'https://slack.com/beacon/timing';
		(new Image()).src = endpoint_url + '?data=' + encodeURIComponent(label + ':' + value);
	};
}
})();
</script>
 

<script>
window.TSMark('step_load');
</script>	<noscript><meta http-equiv="refresh" content="0; URL=/files/elise/F65QK226B/personas_v0r1.md?nojsmode=1" /></noscript>
<script type="text/javascript">
if(self!==top)window.document.write("\u003Cstyle>body * {display:none !important;}\u003C\/style>\u003Ca href=\"#\" onclick="+
"\"top.location.href=window.location.href\" style=\"display:block !important;padding:10px\">Go to Slack.com\u003C\/a>");

(function() {
	var timer;
	if (self !== top) {
		timer = window.setInterval(function() {
			if (window.$) {
				try {
					$('#page').remove();
					$('#client-ui').remove();
					window.TS = null;
					window.clearInterval(timer);
				} catch(e) {}
			}
		}, 200);
	}
}());

</script>

<script>(function() {
	'use strict';

	window.callSlackAPIUnauthed = function(method, args, callback) {
		var timestamp = Date.now() / 1000;  
		var version = (window.TS && TS.boot_data && TS.boot_data.version_uid) ? TS.boot_data.version_uid.substring(0, 8) : 'noversion';
		var url = '/api/' + method + '?_x_id=' + version + '-' + timestamp;
		var req = new XMLHttpRequest();

		req.onreadystatechange = function() {
			if (req.readyState == 4) {
				req.onreadystatechange = null;
				var obj;

				if (req.status == 200 || req.status == 429) {
					try {
						obj = JSON.parse(req.responseText);
					} catch (err) {
						TS.console.warn(8675309, 'unable to do anything with api rsp');
					}
				}

				obj = obj || {
					ok: false,
				};

				callback(obj.ok, obj, args);
			}
		};

		var async = true;
		req.open('POST', url, async);

		var form_data = new FormData();
		var has_data = false;
		Object.keys(args).forEach(function(k) {
			if (k[0] === '_') return;
			form_data.append(k, args[k]);
			has_data = true;
		});

		if (has_data) {
			req.send(form_data);
		} else {
			req.send();
		}
	};
})();
</script>

	<script type="text/javascript" src="https://a.slack-edge.com/bv1-1/webpack.manifest.7781684bbfcffe24e850.min.js" crossorigin="anonymous" onload="window._cdn && _cdn.ok(this, arguments)" onerror="window._cdn && _cdn.failed(this, arguments)"></script>

			
	
		<script>
			if (window.location.host == 'slack.com' && window.location.search.indexOf('story') < 0) {
				document.cookie = '__cvo_skip_doc=' + escape(document.URL) + '|' + escape(document.referrer) + ';path=/';
			}
		</script>
	

		<script type="text/javascript">
		
		try {
			if(window.location.hash && !window.location.hash.match(/^(#?[a-zA-Z0-9_]*)$/)) {
				window.location.hash = '';
			}
		} catch(e) {}
		
	</script>

	<script type="text/javascript">
				
			window.optimizely = [];
			window.dataLayer = [];
			window.ga = false;
		
	
				(function(e,c,b,f,d,g,a){e.SlackBeaconObject=d;
		e[d]=e[d]||function(){(e[d].q=e[d].q||[]).push([1*new Date(),arguments])};
		e[d].l=1*new Date();g=c.createElement(b);a=c.getElementsByTagName(b)[0];
		g.async=1;g.src=f;a.parentNode.insertBefore(g,a)
		})(window,document,"script","https://a.slack-edge.com/bv1-1/slack_beacon.9555f5e382af865f618b.min.js","sb");
		sb('set', 'token', '3307f436963e02d4f9eb85ce5159744c');

					sb('set', 'user_id', "U6449MT4L");
							sb('set', 'user_' + "batch", "signup_api");
							sb('set', 'user_' + "created", "2017-07-05");
						sb('set', 'name_tag', "projetinstantdansewf3" + '/' + "letibelim");
				sb('track', 'pageview');

		
		function track(a) {
			if(window.ga) ga('send','event','web', a);
			if(window.sb) sb('track', a);
		}
		

	</script>

	
	<meta name="referrer" content="no-referrer">
		<meta name="superfish" content="nofish">

	<script type="text/javascript">



var TS_last_log_date = null;
var TSMakeLogDate = function() {
	var date = new Date();

	var y = date.getFullYear();
	var mo = date.getMonth()+1;
	var d = date.getDate();

	var time = {
	  h: date.getHours(),
	  mi: date.getMinutes(),
	  s: date.getSeconds(),
	  ms: date.getMilliseconds()
	};

	Object.keys(time).map(function(moment, index) {
		if (moment == 'ms') {
			if (time[moment] < 10) {
				time[moment] = time[moment]+'00';
			} else if (time[moment] < 100) {
				time[moment] = time[moment]+'0';
			}
		} else if (time[moment] < 10) {
			time[moment] = '0' + time[moment];
		}
	});

	var str = y + '/' + mo + '/' + d + ' ' + time.h + ':' + time.mi + ':' + time.s + '.' + time.ms;
	if (TS_last_log_date) {
		var diff = date-TS_last_log_date;
		//str+= ' ('+diff+'ms)';
	}
	TS_last_log_date = date;
	return str+' ';
}

var parseDeepLinkRequest = function(code) {
	var m = code.match(/"id":"([CDG][A-Z0-9]{8})"/);
	var id = m ? m[1] : null;

	m = code.match(/"team":"(T[A-Z0-9]{8})"/);
	var team = m ? m[1] : null;

	m = code.match(/"message":"([0-9]+\.[0-9]+)"/);
	var message = m ? m[1] : null;

	return { id: id, team: team, message: message };
}

if ('rendererEvalAsync' in window) {
	var origRendererEvalAsync = window.rendererEvalAsync;
	window.rendererEvalAsync = function(blob) {
		try {
			var data = JSON.parse(decodeURIComponent(atob(blob)));
			if (data.code.match(/handleDeepLink/)) {
				var request = parseDeepLinkRequest(data.code);
				if (!request.id || !request.team || !request.message) return;

				request.cmd = 'channel';
				TSSSB.handleDeepLinkWithArgs(JSON.stringify(request));
				return;
			} else {
				origRendererEvalAsync(blob);
			}
		} catch (e) {
		}
	}
}
</script>



<script type="text/javascript">

	var TSSSB = {
		call: function() {
			return false;
		}
	};

</script>
<script>TSSSB.env = (function() {
	'use strict';

	var v = {
		win_ssb_version: null,
		win_ssb_version_minor: null,
		mac_ssb_version: null,
		mac_ssb_version_minor: null,
		mac_ssb_build: null,
		lin_ssb_version: null,
		lin_ssb_version_minor: null,
		desktop_app_version: null,
	};

	var is_win = (navigator.appVersion.indexOf('Windows') !== -1);
	var is_lin = (navigator.appVersion.indexOf('Linux') !== -1);
	var is_mac = !!(navigator.userAgent.match(/(OS X)/g));

	if (navigator.userAgent.match(/(Slack_SSB)/g) || navigator.userAgent.match(/(Slack_WINSSB)/g)) {
		
		var parts = navigator.userAgent.split('/');
		var version_str = parts[parts.length - 1];
		var version_float = parseFloat(version_str);
		var version_parts = version_str.split('.');
		var version_minor = (version_parts.length == 3) ? parseInt(version_parts[2], 10) : 0;

		if (navigator.userAgent.match(/(AtomShell)/g)) {
			
			if (is_lin) {
				v.lin_ssb_version = version_float;
				v.lin_ssb_version_minor = version_minor;
			} else if (is_win) {
				v.win_ssb_version = version_float;
				v.win_ssb_version_minor = version_minor;
			} else if (is_mac) {
				v.mac_ssb_version = version_float;
				v.mac_ssb_version_minor = version_minor;
			}

			if (version_parts.length >= 3) {
				v.desktop_app_version = {
					major: parseInt(version_parts[0], 10),
					minor: parseInt(version_parts[1], 10),
					patch: parseInt(version_parts[2], 10),
				};
			}
		} else {
			
			v.mac_ssb_version = version_float;
			v.mac_ssb_version_minor = version_minor;

			
			
			var app_ver = window.macgap && macgap.app && macgap.app.buildVersion && macgap.app.buildVersion();
			var matches = String(app_ver).match(/(?:\()(.*)(?:\))/);
			v.mac_ssb_build = (matches && matches.length == 2) ? parseInt(matches[1] || 0, 10) : 0;
		}
	}

	return v;
})();
</script>


	<script type="text/javascript">
		
		window.addEventListener('load', function() {
			var was_TS = window.TS;
			delete window.TS;
			if (was_TS) window.TS = was_TS;
		});
	</script>
	    <title>personas_V0R1.md | Projet Instant Danse WF3 Slack</title>
    <meta name="author" content="Slack">

	
		
	
	
		
	
				
	
	

	
	
	
	
	
	
	
			<!-- output_css "core" -->
    <link href="https://a.slack-edge.com/bca2c/style/rollup-plastic.css" rel="stylesheet" type="text/css" crossorigin="anonymous" onload="window._cdn && _cdn.ok(this, arguments)" onerror="window._cdn && _cdn.failed(this, arguments)">

		<!-- output_css "before_file_pages" -->
    <link href="https://a.slack-edge.com/74a30/style/libs/codemirror.css" rel="stylesheet" type="text/css" crossorigin="anonymous" onload="window._cdn && _cdn.ok(this, arguments)" onerror="window._cdn && _cdn.failed(this, arguments)">
    <link href="https://a.slack-edge.com/7f828/style/codemirror_overrides.css" rel="stylesheet" type="text/css" crossorigin="anonymous" onload="window._cdn && _cdn.ok(this, arguments)" onerror="window._cdn && _cdn.failed(this, arguments)">

	<!-- output_css "file_pages" -->
    <link href="https://a.slack-edge.com/98028/style/rollup-file_pages.css" rel="stylesheet" type="text/css" crossorigin="anonymous" onload="window._cdn && _cdn.ok(this, arguments)" onerror="window._cdn && _cdn.failed(this, arguments)">

	
			<!-- output_css "regular" -->
    <link href="https://a.slack-edge.com/e855/style/print.css" rel="stylesheet" type="text/css" crossorigin="anonymous" onload="window._cdn && _cdn.ok(this, arguments)" onerror="window._cdn && _cdn.failed(this, arguments)">
    <link href="https://a.slack-edge.com/96b46/style/libs/quill.core.css" rel="stylesheet" type="text/css" crossorigin="anonymous" onload="window._cdn && _cdn.ok(this, arguments)" onerror="window._cdn && _cdn.failed(this, arguments)">
    <link href="https://a.slack-edge.com/9626b/style/texty.css" rel="stylesheet" type="text/css" crossorigin="anonymous" onload="window._cdn && _cdn.ok(this, arguments)" onerror="window._cdn && _cdn.failed(this, arguments)">
    <link href="https://a.slack-edge.com/b003/style/libs/lato-2-compressed.css" rel="stylesheet" type="text/css" crossorigin="anonymous" onload="window._cdn && _cdn.ok(this, arguments)" onerror="window._cdn && _cdn.failed(this, arguments)">
    <link href="https://a.slack-edge.com/f19704/style/_helpers.css" rel="stylesheet" type="text/css" crossorigin="anonymous" onload="window._cdn && _cdn.ok(this, arguments)" onerror="window._cdn && _cdn.failed(this, arguments)">

	

	
	
		<meta name="robots" content="noindex, nofollow" />
	

	
<link id="favicon" rel="shortcut icon" href="https://a.slack-edge.com/66f9/img/icons/favicon-32.png" sizes="16x16 32x32 48x48" type="image/png" />

<link rel="icon" href="https://a.slack-edge.com/0180/img/icons/app-256.png" sizes="256x256" type="image/png" />

<link rel="apple-touch-icon-precomposed" sizes="152x152" href="https://a.slack-edge.com/66f9/img/icons/ios-152.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://a.slack-edge.com/66f9/img/icons/ios-144.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="https://a.slack-edge.com/66f9/img/icons/ios-120.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://a.slack-edge.com/66f9/img/icons/ios-114.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://a.slack-edge.com/0180/img/icons/ios-72.png" />
<link rel="apple-touch-icon-precomposed" href="https://a.slack-edge.com/66f9/img/icons/ios-57.png" />

<meta name="msapplication-TileColor" content="#FFFFFF" />
<meta name="msapplication-TileImage" content="https://a.slack-edge.com/66f9/img/icons/app-144.png" />
	
	<!--[if lt IE 9]>
	<script src="https://a.slack-edge.com/bv1-1/html5shiv.e7cd7843b61b9c027447.min.js"></script>
	<![endif]-->

</head>

<body class="						">

		  			<script>
		
			var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
			if (w > 1440) document.querySelector('body').classList.add('widescreen');
		
		</script>
	
  	
	

			

<nav id="site_nav" class="no_transition">

	<div id="site_nav_contents">

		<div id="user_menu">
			<div id="user_menu_contents">
				<div id="user_menu_avatar">
										<span class="member_image thumb_48" style="background-image: url('https://secure.gravatar.com/avatar/c30727f4b921e97451e82da6d56f4716.jpg?s=192&d=https%3A%2F%2Fa.slack-edge.com%2F7fa9%2Fimg%2Favatars%2Fava_0006-192.png')" data-thumb-size="48" data-member-id="U6449MT4L"></span>
					<span class="member_image thumb_36" style="background-image: url('https://secure.gravatar.com/avatar/c30727f4b921e97451e82da6d56f4716.jpg?s=72&d=https%3A%2F%2Fa.slack-edge.com%2F66f9%2Fimg%2Favatars%2Fava_0006-72.png')" data-thumb-size="36" data-member-id="U6449MT4L"></span>
				</div>
				<h3>Signed in as</h3>
				<span id="user_menu_name">letibelim</span>
			</div>
		</div>

		<div class="nav_contents">

			<ul class="primary_nav">
									<li><a href="/messages" data-qa="app"><i class="ts_icon ts_icon_angle_arrow_up_left"></i>Back to Slack</a></li>
								<li><a href="/home" data-qa="home"><i class="ts_icon ts_icon_home"></i>Home</a></li>
				<li><a href="/account" data-qa="account_profile"><i class="ts_icon ts_icon_user"></i>Account &amp; Profile</a></li>
				<li><a href="/apps/manage" data-qa="configure_apps" target="_blank"><i class="ts_icon ts_icon_plug"></i>Configure Apps</a></li>
								<li><a href="/files" data-qa="files"><i class="ts_icon ts_icon_all_files clear_blue"></i>Files</a></li>
				<li><a href="/team" data-qa="team_directory"><i class="ts_icon ts_icon_team_directory"></i>Directory</a></li>
															<li><a href="/stats" data-qa="statistics"><i class="ts_icon ts_icon_dashboard"></i>Statistics</a></li>
																		<li><a href="/customize" data-qa="customize"><i class="ts_icon ts_icon_magic"></i>Customize</a></li>
													<li><a href="/account/team" data-qa="team_settings"><i class="ts_icon ts_icon_cog_o"></i>Team Settings</a></li>
							</ul>

			
		</div>

		<div id="footer">

			<ul id="footer_nav">
				<li><a href="/is" data-qa="tour">Tour</a></li>
				<li><a href="/downloads" data-qa="download_apps">Download Apps</a></li>
				<li><a href="/brand-guidelines" data-qa="brand_guidelines">Brand Guidelines</a></li>
				<li><a href="/help" data-qa="help">Help</a></li>
				<li><a href="https://api.slack.com" target="_blank" data-qa="api">API<i class="ts_icon ts_icon_external_link small_left_margin ts_icon_inherit"></i></a></li>
								<li><a href="/pricing" data-qa="pricing">Pricing</a></li>
				<li><a href="/help/requests/new" data-qa="contact">Contact</a></li>
				<li><a href="/terms-of-service" data-qa="policies">Policies</a></li>
				<li><a href="http://slackhq.com/" target="_blank" data-qa="our_blog">Our Blog</a></li>
				<li><a href="https://slack.com/signout/208017043891?crumb=s-1499418531-b277ccdcad-%E2%98%83" data-qa="sign_out">Sign Out<i class="ts_icon ts_icon_sign_out small_left_margin ts_icon_inherit"></i></a></li>
			</ul>

			<p id="footer_signature">Made with <i class="ts_icon ts_icon_heart"></i> by Slack</p>

		</div>

	</div>
</nav>	
			
<header>
			<a id="menu_toggle" class="no_transition" data-qa="menu_toggle_hamburger">
			<span class="menu_icon"></span>
			<span class="menu_label">Menu</span>
			<span class="vert_divider"></span>
		</a>
		<h1 id="header_team_name" class="inline_block no_transition" data-qa="header_team_name">
			<a href="/home">
				<i class="ts_icon ts_icon_home" /></i>
				Projet Instant Danse WF3
			</a>
		</h1>
		<div class="header_nav">
			<div class="header_btns float_right">
				<a id="team_switcher" data-qa="team_switcher">
					<i class="ts_icon ts_icon_th_large ts_icon_inherit"></i>
					<span class="block label">Teams</span>
				</a>
				<a href="/help" id="help_link" data-qa="help_link">
					<i class="ts_icon ts_icon_life_ring ts_icon_inherit"></i>
					<span class="block label">Help</span>
				</a>
															<a href="/messages" data-qa="launch">
							<img src="https://a.slack-edge.com/66f9/img/icons/ios-64.png" srcset="https://a.slack-edge.com/66f9/img/icons/ios-32.png 1x, https://a.slack-edge.com/66f9/img/icons/ios-64.png 2x" title="Slack" alt="Launch Slack"/>
							<span class="block label">Launch</span>
						</a>
												</div>
				                    <ul id="header_team_nav" data-qa="team_switcher_menu">
	                        	                            <li class="active">
	                            	<a href="https://projetinstantdansewf3.slack.com/home" target="https://projetinstantdansewf3.slack.com/">
	                            			                            			<i class="ts_icon small ts_icon_check_circle_o active_icon s"></i>
	                            			                            			                            			<i class="team_icon small default" >PI</i>
	                            			                            		<span class="switcher_label team_name">Projet Instant Danse WF3</span>
	                            	</a>
	                            </li>
	                        	                            <li >
	                            	<a href="https://webdev-aix-marseille.slack.com/home" target="https://webdev-aix-marseille.slack.com/">
	                            			                            			                            			<i class="team_icon small default" >WW</i>
	                            			                            		<span class="switcher_label team_name">WebDev Warriors - Aix Marseille</span>
	                            	</a>
	                            </li>
	                        	                        <li id="add_team_option"><a href="https://slack.com/signin" target="_blank"><i class="ts_icon ts_icon_plus team_icon small"></i> <span class="switcher_label">Sign in to another team...</span></a></li>
	                    </ul>
	                		</div>
	
	
	
</header>	
	<div id="page" >

		<div id="page_contents" data-qa="page_contents" class="">


<p class="print_only">
	<strong>
	
	Created by elise on Thursday, July 6, 2017 at 9:19 PM
	</strong><br />
	<span class="subtle_silver break_word">https://projetinstantdansewf3.slack.com/files/elise/F65QK226B/personas_v0r1.md</span>
</p>

<div class="file_header_container no_print"></div>

<div class="alert_container">
		

<div class="file_public_link_shared alert" style="display: none;">
		
	<i class="ts_icon ts_icon_link"></i> Public Link: <a class="file_public_link" href="https://slack-files.com/T640H19S7-F65QK226B-034788e229" target="new">https://slack-files.com/T640H19S7-F65QK226B-034788e229</a>
</div></div>

<div id="file_page" class="card top_padding">

	<p class="small subtle_silver no_print meta">
		
		3KB Markdown (raw) snippet created on <span class="date">July 6, 2017</span>.
						<span class="file_share_list"></span>
	</p>

	<a id="file_action_cog" class="action_cog action_cog_snippet float_right no_print">
		<span>Actions </span><i class="ts_icon ts_icon_cog"></i>
	</a>
	<a id="snippet_expand_toggle" class="float_right no_print">
		<i class="ts_icon ts_icon_expand "></i>
		<i class="ts_icon ts_icon_compress hidden"></i>
	</a>

	<div class="large_bottom_margin clearfix">
		<pre id="file_contents">
Marion 29 ans : 
Working girl qui vient de s&#039;installer à Marseille, elle est festive, joyeuse, sort notamment en afterwork, voyage beaucoup et parle plusieurs langues.
Elle est déjà danseuse.
Elle cherche à danser, se faire un réseau d&#039;amis et se donner une identité sociale
sur le site : 
- cherche des infos pratiques 
- veut cerneer si l&#039;école lui correspond : photos d&#039;événements, ton utilisé, style et tranche d&#039;âge des élèves d&#039;après les photos
- type &amp; fréquence d&#039;événements : est-ce que l&#039;école bouge suffisamment pour elle ?


Thomas 40 ans :
Marseillais de souche, actif, père de 2 enfants qui vient de se séparer.
Il veut se recréer un cercle d&#039;amis, s&#039;occuper, et éventuellement rencontrer quelqu&#039;un.
Il ne sait pas danser mais a toujours rêvé d&#039;apprendre la salsa.
Il veut reprendre confiance en lui, sans trop se l&#039;avouer.
sur le site : 
- cherche des infos pratiques 
- cerner si l&#039;école lui correspond 
- savoir au bout de combien de temps il pourra sortir danser 
- type &amp; fréquence d&#039;événements


Caroline et Alexandre, 45 ans :
Les enfants ont grandi, ils peuvent recommencer à sortir. 
Ils ont envie d&#039;une activité à 2 qui les sorte de leur quotidien.
Elle sait un peu danser, lui pas du tout. Il vient surtout pour lui faire plaisir, mais se dit aussi qu&#039;il va rencontrer des gens funs et refaire la fête.
sur le site : 
- cherchent les infos pratiques 
- ne sont pas particulièrement intéressés par les soirées dans un 1er temps : ce n&#039;est pas un critère de sélection
- séduits par l&#039;idée des voyages 


Sophie, 65 ans :
Elle refuse de vieillir et se voit toujours comme jeune et bonne danseuse, un peu déconnectée de la réalité. 
Sophie est très coquette et dynamique par rapport aux gens de son âge et n&#039;est nulle part vraiment à sa place : trop senior parmi les jeunes, trop jeune parmi les personnes de son âge. 
C&#039;est un peu la mascotte des écoles qu&#039;elle a pu fréquenter : elle est très différente des autres élèves car absolument pas dans la cible privilégiée, mais elle est très attachante. Elle investit beaucoup de temps et d&#039;énergie à aider ses profs sur des points logistiques : elle fonctionne à l&#039;affect et aime sincèrement ses profs.
Elle a un ordinateur mais ne comprend pas grand chose aux nouvelles technologies : elle surfe un peu pour se tenir informée et garder le contact avec ses petits-enfants.
sur le site : 
- elle  cherche essentiellement les infos pratiques, 
- parfois, elle regarde des photos et vidéos des événements passés par nostalgie 


Dominique, 32 ans :
Prof de danse qui monte son école. Souhaite un site qui attire en priorité les gens qui lui ressemblent : jeunes, dynamiques, qui aiment faire la fête, danser boire, des mojitos et partager des bons moments entre amis. Dominique aime également s&#039;entourer de gens très différents les uns des autres.
Son site doit donner envie aux gens de se déplacer : il ne doit pas se substituer à un échange humain par des fonctionnalités trop poussées mais rester simple, moderne et accessible, à l&#039;image de l&#039;école.
Sur le site :
- Dominique va devoir régulièrement mettre à jour des informations concernant les événements (soirées, stages, festivals) 
- veut également pouvoir modifier les informations concernant les cours hebdomadaires si besoin (danses, tarifs, planning, profs). 
- L&#039;outil doit rester simple et intuitif pour que Dominique ne perde pas son temps ... ou ses nerfs ! 
</pre>

		<p class="file_page_meta no_print" style="line-height: 1.5rem;">
			<label class="checkbox normal mini float_right no_top_padding no_min_width">
				<input type="checkbox" id="file_preview_wrap_cb"> wrap long lines			</label>
		</p>

	</div>

	<div id="comments_holder" class="clearfix clear_both">
	<div class="col span_1_of_6"></div>
	<div class="col span_4_of_6 no_right_padding">
		<div id="file_page_comments">
			

<div class="loading_hash_animation">
	<span class=loading_hash_container><img src="https://a.slack-edge.com/9c217/img/loading_hash_animation_@2x.gif" srcset="https://a.slack-edge.com/9c217/img/loading_hash_animation.gif 1x, https://a.slack-edge.com/9c217/img/loading_hash_animation_@2x.gif 2x" alt="Loading" class="loading_hash" /><br />loading...</span>
	<noscript>
		
			You must enable javascript in order to use Slack :(
						<style type="text/css">span.loading_hash_container { display: none; }</style>
	</noscript>
</div>		</div>	
		

	<form action="https://projetinstantdansewf3.slack.com/files/elise/F65QK226B/personas_v0r1.md"
			id="file_comment_form"
							class="comment_form clearfix"
						method="post">
					<a href="/team/letibelim" class="member_preview_link" data-member-id="U6449MT4L" >
				<span class="member_image thumb_36" style="background-image: url('https://secure.gravatar.com/avatar/c30727f4b921e97451e82da6d56f4716.jpg?s=72&d=https%3A%2F%2Fa.slack-edge.com%2F66f9%2Fimg%2Favatars%2Fava_0006-72.png')" data-thumb-size="36" data-member-id="U6449MT4L"></span>
			</a>
				<input type="hidden" name="addcomment" value="1" />
		<input type="hidden" name="crumb" value="s-1499418531-b341d55e6c-☃" />

					<div id="file_comment" class="small texty_comment_input comment_input small_bottom_margin" name="comment" wrap="virtual" ></div>
				<span class="input_note float_left indifferent_grey file_comment_tip">shift+enter to add a new line</span>		<button id="file_comment_submit_btn" type="submit" class="btn float_right  ladda-button" data-style="expand-right"><span class="ladda-label">Add Comment</span></button>
	</form>

<form
		id="file_edit_comment_form"
					class="edit_comment_form clearfix hidden"
				method="post">
				<div id="file_edit_comment" class="small texty_comment_input comment_input small_bottom_margin" name="comment" wrap="virtual"></div>
		<input type="submit" class="save btn float_right " value="Save" />
	<button class="cancel btn btn_outline float_right small_right_margin ">Cancel</button>
</form>	
	</div>
	<div class="col span_1_of_6"></div>
</div>
</div>



		
	</div>
	<div id="overlay"></div>
</div>







<script type="text/javascript">

	/**
	 * A placeholder function that the build script uses to
	 * replace file paths with their CDN versions.
	 *
	 * @param {String} file_path - File path
	 * @returns {String}
	 */
	function vvv(file_path) {

		var vvv_warning = 'You cannot use vvv on dynamic values. Please make sure you only pass in static file paths.';
		if (TS && TS.warn) {
			TS.warn(vvv_warning);
		} else {
			console.warn(vvv_warning);
		}

		return file_path;
	}

	var cdn_url = "https:\/\/slack.global.ssl.fastly.net";
	var vvv_abs_url = "https:\/\/slack.com\/";
	var inc_js_setup_data = {
			emoji_sheets: {
			apple: 'https://a.slack-edge.com/bfaba/img/emoji_2016_06_08/sheet_apple_64_indexed_256colors.png',
			google: 'https://a.slack-edge.com/f360/img/emoji_2016_06_08/sheet_google_64_indexed_128colors.png',
			twitter: 'https://a.slack-edge.com/bfaba/img/emoji_2016_06_08/sheet_twitter_64_indexed_128colors.png',
			emojione: 'https://a.slack-edge.com/bfaba/img/emoji_2016_06_08/sheet_emojione_64_indexed_128colors.png',
		},
		};
</script>
			<script type="text/javascript">
<!--
	// common boot_data
	var boot_data = {
		start_ms: Date.now(),
		app: 'web',
		user_id: 'U6449MT4L',
		team_id: 'T640H19S7',
		no_login: false,
		version_ts: '1499394399',
		version_uid: '4294e1525b30111d8d555f4e1a9f84640e1e3b82',
		cache_version: "v16-giraffe",
		cache_ts_version: "v2-bunny",
		redir_domain: 'slack-redir.net',
		signin_url: 'https://slack.com/signin',
		abs_root_url: 'https://slack.com/',
		api_url: '/api/',
		team_url: 'https://projetinstantdansewf3.slack.com/',
		image_proxy_url: 'https://slack-imgs.com/',
		beacon_timing_url: "https:\/\/slack.com\/beacon\/timing",
		beacon_error_url: "https:\/\/slack.com\/beacon\/error",
		clog_url: "clog\/track\/",
		api_token: 'xoxs-208017043891-208145741156-208929157447-ae149899f7',
		ls_disabled: false,
		use_react_sidebar: false,

		vvv_paths: {
			
		lz_string: "https:\/\/a.slack-edge.com\/bv1-1\/lz-string-1.4.4.worker.8de1b00d670ff3dc706a0.js",
		codemirror: "https:\/\/a.slack-edge.com\/bv1-1\/codemirror.276c7c0e745cf2afa047.min.js",
	codemirror_addon_simple: "https:\/\/a.slack-edge.com\/bv1-1\/simple.6d6b9767ccc48ef971d4.min.js",
	codemirror_load: "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_load.f85ef99f6ca2441dd6d9.min.js",

	// Silly long list of every possible file that Codemirror might load
	codemirror_files: {
		'apl': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_apl.83cf40b833835334a453.min.js",
		'asciiarmor': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_asciiarmor.c4fa27565d9ecc60216c.min.js",
		'asn.1': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_asn.1.ce8084190b417f2a2de4.min.js",
		'asterisk': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_asterisk.dada007c6a3cbb8c19f6.min.js",
		'brainfuck': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_brainfuck.b86f3838c54d7c548805.min.js",
		'clike': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_clike.4ee0fe04fbb4ba704674.min.js",
		'clojure': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_clojure.7b8fde4f8a7e2b0b321a.min.js",
		'cmake': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_cmake.db4541003f350b8128dd.min.js",
		'cobol': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_cobol.a3f416007d41c58bc4e0.min.js",
		'coffeescript': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_coffeescript.0ed3145b8d18b0cd46ac.min.js",
		'commonlisp': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_commonlisp.779b2849803b8fb485b1.min.js",
		'css': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_css.be082fca6a87fe1e1f1f.min.js",
		'crystal': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_crystal.463f29cb3a8258aa9b8e.min.js",
		'cypher': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_cypher.1aca279b04f843d9939a.min.js",
		'd': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_d.d83aacdb48afcc75e27c.min.js",
		'dart': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_dart.414dcad33c2a4db24829.min.js",
		'diff': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_diff.f6dde3514d4118bbd90d.min.js",
		'django': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_django.f8537a4a1d956ab5aa29.min.js",
		'dockerfile': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_dockerfile.3fb5f4c9058ccd26b7c8.min.js",
		'dtd': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_dtd.49126dda832f132f1b94.min.js",
		'dylan': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_dylan.88ac2d6fea71101bf00a.min.js",
		'ebnf': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_ebnf.f8cce40b2751c0bd8b43.min.js",
		'ecl': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_ecl.2ac48319df4250831e78.min.js",
		'eiffel': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_eiffel.600a390082cbf4e41217.min.js",
		'elm': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_elm.57c8ec1533592a92b4f7.min.js",
		'erlang': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_erlang.d9e6d0aad526f15ee346.min.js",
		'factor': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_factor.0dcbb36a302be1c5aad3.min.js",
		'forth': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_forth.a59af8625507d5849eb1.min.js",
		'fortran': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_fortran.27571069607067aa58e0.min.js",
		'gas': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_gas.3d568d48846c3bba115a.min.js",
		'gfm': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_gfm.4e8c454f9ee0aa697c23.min.js",
		'gherkin': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_gherkin.6bcb85f1626c89218e41.min.js",
		'go': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_go.b4c1c2d7fdfc46009276.min.js",
		'groovy': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_groovy.2a6821b778a397a5c108.min.js",
		'haml': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_haml.c06d42eaf3aea386abad.min.js",
		'handlebars': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_handlebars.d2c36d3908194ab68223.min.js",
		'haskell': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_haskell.73bf9013be9e7f6c5c8a.min.js",
		'haxe': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_haxe.f5b58b5cc6ca4b5ac520.min.js",
		'htmlembedded': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_htmlembedded.55cded80d8fdf31bb910.min.js",
		'htmlmixed': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_htmlmixed.50ed44d762014b7e0f1e.min.js",
		'http': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_http.0cae0da1eb19c48eb7e7.min.js",
		'idl': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_idl.3f30a05488ef4fa5430a.min.js",
		'jade': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_jade.54d66f1d7c799d63cc49.min.js",
		'javascript': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_javascript.16f9b843c39208498f2d.min.js",
		'jinja2': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_jinja2.4f74a652f7e6876b91aa.min.js",
		'julia': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_julia.a95d56e79a8118f66c53.min.js",
		'livescript': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_livescript.0073eab18da61304bc65.min.js",
		'lua': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_lua.0e5562b95e4db7b32937.min.js",
		'markdown': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_markdown.d287820fd10361ad72d2.min.js",
		'mathematica': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_mathematica.db7592eaf3fcf0ebaf59.min.js",
		'mirc': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_mirc.de65b53a2e956de93f70.min.js",
		'mllike': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_mllike.9d5037f99e11e9b8cb74.min.js",
		'modelica': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_modelica.9915f1e2328a9e73fe35.min.js",
		'mscgen': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_mscgen.de63768b5c0feaa67884.min.js",
		'mumps': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_mumps.4df5048ed53eda4554fa.min.js",
		'nginx': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_nginx.cfb7a50e2270895f6626.min.js",
		'nsis': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_nsis.4fa8f85995fe58335d71.min.js",
		'ntriples': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_ntriples.351d3f907cb1a7400636.min.js",
		'octave': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_octave.024965964176778f68d8.min.js",
		'oz': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_oz.9d31868be74f3198ec32.min.js",
		'pascal': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_pascal.7f31fe781c1a15641107.min.js",
		'pegjs': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_pegjs.14535b3a5f46e03b4b11.min.js",
		'perl': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_perl.6d29cb7fa15002076d8c.min.js",
		'php': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_php.5951d51609094a088aee.min.js",
		'pig': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_pig.3a84c69f456abac987ee.min.js",
		'powershell': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_powershell.787d9c9dd1fbe56412eb.min.js",
		'properties': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_properties.8f0218a9b5cc5339597b.min.js",
		'puppet': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_puppet.dc47a7f86bc94dc7ce0d.min.js",
		'python': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_python.930759d091ca5d9fc1bc.min.js",
		'q': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_q.2c32168c5308e3aa55c5.min.js",
		'r': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_r.8723865cff38b25541e0.min.js",
		'rpm': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_rpm.d00d37f3713806e99d35.min.js",
		'rst': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_rst.7de3c50543496175c85e.min.js",
		'ruby': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_ruby.dd188060b47dde29ea1e.min.js",
		'rust': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_rust.a9a267e5746f78edd308.min.js",
		'sass': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_sass.4fb9a1c9738d19ff2148.min.js",
		'scheme': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_scheme.0fccdc58bf84a4bd5f4d.min.js",
		'shell': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_shell.71106a758b88b65f88ad.min.js",
		'sieve': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_sieve.afd38c43091506519bc9.min.js",
		'slim': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_slim.b49db0c71dfb2251db2a.min.js",
		'smalltalk': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_smalltalk.cce66fef44b6b6e31961.min.js",
		'smarty': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_smarty.ff2ab7cd555ad52d7a3a.min.js",
		'solr': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_solr.79d36ea5a52a04758025.min.js",
		'soy': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_soy.dc7ad913caa11c258ec9.min.js",
		'sparql': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_sparql.b2191a5c90b751419eae.min.js",
		'spreadsheet': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_spreadsheet.78705124b1e5ec0af2fe.min.js",
		'sql': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_sql.eed86693726f28aa80df.min.js",
		'stex': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_stex.37a0bc67464358ce843f.min.js",
		'stylus': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_stylus.ee830b675ad51163548e.min.js",
		'swift': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_swift.2aaee20580db1b1cd89e.min.js",
		'tcl': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_tcl.ded61814d5b76e0dc415.min.js",
		'textile': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_textile.da5971ba67dbd06ffde9.min.js",
		'tiddlywiki': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_tiddlywiki.1f1cc9d30110d04c641c.min.js",
		'tiki': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_tiki.141493bbb5c83fdea7b7.min.js",
		'toml': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_toml.719bbb6d130f3c45c1e6.min.js",
		'tornado': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_tornado.44bf0c83630c59a93249.min.js",
		'troff': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_troff.1358e6398400c97b7d7f.min.js",
		'ttcn': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_ttcn.770af9b55a1a2dd0d72d.min.js",
		'ttcn:cfg': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_ttcn-cfg.e15e845a38c33845eca1.min.js",
		'turtle': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_turtle.18ab50839fdc5b3c6ae0.min.js",
		'twig': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_twig.cf54185dae1db5bfd086.min.js",
		'vb': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_vb.904d482d7dbedca81680.min.js",
		'vbscript': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_vbscript.18894cf0af3a82523f82.min.js",
		'velocity': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_velocity.ce9d82131daa898979ff.min.js",
		'verilog': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_verilog.d79705cbdffc0e07eba9.min.js",
		'vhdl': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_vhdl.7897cfb253c58ed77a9b.min.js",
		'vue': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_vue.a955b71c33e70f6cc835.min.js",
		'xml': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_xml.1b1827756a9a776e969c.min.js",
		'xquery': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_xquery.98b702be497019debf5a.min.js",
		'yaml': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_yaml.d5c80f7fa9dbb54371d0.min.js",
		'z80': "https:\/\/a.slack-edge.com\/bv1-1\/codemirror_lang_z80.ddd4d9a50f693a61ccd6.min.js"
	}		},

		notification_sounds: [{"value":"b2.mp3","label":"Ding","url":"https:\/\/slack.global.ssl.fastly.net\/7e91\/sounds\/push\/b2.mp3","url_ogg":"https:\/\/slack.global.ssl.fastly.net\/46ebb\/sounds\/push\/b2.ogg"},{"value":"animal_stick.mp3","label":"Boing","url":"https:\/\/slack.global.ssl.fastly.net\/7e91\/sounds\/push\/animal_stick.mp3","url_ogg":"https:\/\/slack.global.ssl.fastly.net\/46ebb\/sounds\/push\/animal_stick.ogg"},{"value":"been_tree.mp3","label":"Drop","url":"https:\/\/slack.global.ssl.fastly.net\/7e91\/sounds\/push\/been_tree.mp3","url_ogg":"https:\/\/slack.global.ssl.fastly.net\/46ebb\/sounds\/push\/been_tree.ogg"},{"value":"complete_quest_requirement.mp3","label":"Ta-da","url":"https:\/\/slack.global.ssl.fastly.net\/7e91\/sounds\/push\/complete_quest_requirement.mp3","url_ogg":"https:\/\/slack.global.ssl.fastly.net\/46ebb\/sounds\/push\/complete_quest_requirement.ogg"},{"value":"confirm_delivery.mp3","label":"Plink","url":"https:\/\/slack.global.ssl.fastly.net\/7e91\/sounds\/push\/confirm_delivery.mp3","url_ogg":"https:\/\/slack.global.ssl.fastly.net\/46ebb\/sounds\/push\/confirm_delivery.ogg"},{"value":"flitterbug.mp3","label":"Wow","url":"https:\/\/slack.global.ssl.fastly.net\/7e91\/sounds\/push\/flitterbug.mp3","url_ogg":"https:\/\/slack.global.ssl.fastly.net\/46ebb\/sounds\/push\/flitterbug.ogg"},{"value":"here_you_go_lighter.mp3","label":"Here you go","url":"https:\/\/slack.global.ssl.fastly.net\/7e91\/sounds\/push\/here_you_go_lighter.mp3","url_ogg":"https:\/\/slack.global.ssl.fastly.net\/46ebb\/sounds\/push\/here_you_go_lighter.ogg"},{"value":"hi_flowers_hit.mp3","label":"Hi","url":"https:\/\/slack.global.ssl.fastly.net\/7e91\/sounds\/push\/hi_flowers_hit.mp3","url_ogg":"https:\/\/slack.global.ssl.fastly.net\/46ebb\/sounds\/push\/hi_flowers_hit.ogg"},{"value":"knock_brush.mp3","label":"Knock Brush","url":"https:\/\/slack.global.ssl.fastly.net\/7e91\/sounds\/push\/knock_brush.mp3","url_ogg":"https:\/\/slack.global.ssl.fastly.net\/46ebb\/sounds\/push\/knock_brush.ogg"},{"value":"save_and_checkout.mp3","label":"Whoa!","url":"https:\/\/slack.global.ssl.fastly.net\/7e91\/sounds\/push\/save_and_checkout.mp3","url_ogg":"https:\/\/slack.global.ssl.fastly.net\/46ebb\/sounds\/push\/save_and_checkout.ogg"},{"value":"item_pickup.mp3","label":"Yoink","url":"https:\/\/slack.global.ssl.fastly.net\/7e91\/sounds\/push\/item_pickup.mp3","url_ogg":"https:\/\/slack.global.ssl.fastly.net\/46ebb\/sounds\/push\/item_pickup.ogg"},{"value":"hummus.mp3","label":"Hummus","url":"https:\/\/slack.global.ssl.fastly.net\/7fa9\/sounds\/push\/hummus.mp3","url_ogg":"https:\/\/slack.global.ssl.fastly.net\/46ebb\/sounds\/push\/hummus.ogg"},{"value":"none","label":"None"}],
		alert_sounds: [{"value":"frog.mp3","label":"Frog","url":"https:\/\/slack.global.ssl.fastly.net\/a34a\/sounds\/frog.mp3"}],
		call_sounds: [{"value":"call\/alert_v2.mp3","label":"Alert","url":"https:\/\/slack.global.ssl.fastly.net\/08f7\/sounds\/call\/alert_v2.mp3"},{"value":"call\/incoming_ring_v2.mp3","label":"Incoming ring","url":"https:\/\/slack.global.ssl.fastly.net\/08f7\/sounds\/call\/incoming_ring_v2.mp3"},{"value":"call\/outgoing_ring_v2.mp3","label":"Outgoing ring","url":"https:\/\/slack.global.ssl.fastly.net\/08f7\/sounds\/call\/outgoing_ring_v2.mp3"},{"value":"call\/pop_v2.mp3","label":"Incoming reaction","url":"https:\/\/slack.global.ssl.fastly.net\/08f7\/sounds\/call\/pop_v2.mp3"},{"value":"call\/they_left_call_v2.mp3","label":"They left call","url":"https:\/\/slack.global.ssl.fastly.net\/08f7\/sounds\/call\/they_left_call_v2.mp3"},{"value":"call\/you_left_call_v2.mp3","label":"You left call","url":"https:\/\/slack.global.ssl.fastly.net\/08f7\/sounds\/call\/you_left_call_v2.mp3"},{"value":"call\/they_joined_call_v2.mp3","label":"They joined call","url":"https:\/\/slack.global.ssl.fastly.net\/08f7\/sounds\/call\/they_joined_call_v2.mp3"},{"value":"call\/you_joined_call_v2.mp3","label":"You joined call","url":"https:\/\/slack.global.ssl.fastly.net\/08f7\/sounds\/call\/you_joined_call_v2.mp3"},{"value":"call\/confirmation_v2.mp3","label":"Confirmation","url":"https:\/\/slack.global.ssl.fastly.net\/08f7\/sounds\/call\/confirmation_v2.mp3"}],
		call_sounds_version: "v2",
		max_team_handy_rxns: 5,
		max_channel_handy_rxns: 5,
		max_poll_handy_rxns: 7,
		max_handy_rxns_title_chars: 30,
				default_tz: "America\/Los_Angeles",
				
		feature_tinyspeck: false,
		feature_create_team_google_auth: false,
		feature_flannel_fe: false,
		feature_optimize_client_markup: false,
		feature_no_placeholders_in_messages: true,
		feature_webapp_always_collect_initial_time_period_stats: false,
		feature_lazy_load_members_and_bots_everywhere: false,
		feature_flannel_use_canary_sometimes: false,
		feature_store_members_in_redux: false,
		feature_enable_redux_for_non_client: false,
		feature_file_threads: false,
		feature_new_broadcast: true,
		feature_message_replies_inline: false,
		feature_subteam_members_diff: false,
		feature_a11y_keyboard_shortcuts: false,
		feature_email_ingestion: false,
		feature_msg_consistency: false,
		feature_sli_channel_priority: false,
		feature_react_sidebar: false,
		feature_thanks: false,
		feature_attachments_inline: false,
		feature_fix_files: true,
		feature_channel_eventlog_client: true,
		feature_paging_api: false,
		feature_enterprise_frecency: false,
		feature_enterprise_move_channels: true,
		feature_i18n_bank_settlement: true,
		feature_compliance_sku: true,
		feature_i18n_checkout_updates: true,
		feature_dunning: true,
		feature_invoice_dunning: false,
		feature_safeguard_org_retention: true,
		feature_i18n_bank_settlement_checkout: true,
		feature_ssi_checkout: false,
		feature_enterprise_sso_test_mode: false,
		feature_basic_analytics: false,
		feature_team_site_basic_analytics: false,
		feature_free_team_analytics_upsell: false,
		feature_analytics_team_overview: false,
		feature_analytics_csv_exports: false,
		feature_refactor_admin_stats: false,
		feature_guest_invitation_restrictions: false,
		feature_sso_expose_signed_elements: true,
		feature_channel_alert_words: false,
		feature_shared_channels_beta: false,
		feature_conversations_api: false,
		feature_shared_channels_client: false,
		feature_connecting_shared_channels: false,
		feature_shared_channels_invite: false,
		feature_allow_shared_general: false,
		feature_winssb_beta_channel: false,
		feature_presence_sub: true,
		feature_live_support_free_plan: false,
		feature_slackbot_goes_to_college: false,
		feature_newxp_enqueue_message: true,
		feature_lato_2_ssb: true,
		feature_focus_mode: false,
		feature_star_shortcut: false,
		feature_show_jumper_scores: true,
		feature_omit_localstorage_users_bots: false,
		feature_disable_ls_compression: false,
		feature_force_ls_compression: false,
		feature_zendesk_app_submission_improvement: false,
		feature_ignore_code_mentions: true,
		feature_name_tagging_client: false,
		feature_name_tagging_client_autocomplete: false,
		feature_name_tagging_client_topic_purpose: false,
		feature_use_imgproxy_resizing: false,
		feature_auth_unfurls: true,
		feature_localization: false,
		feature_locale_es_ES: false,
		feature_locale_fr_FR: false,
		feature_locale_de_DE: false,
		feature_locale_ja_JP: false,
		feature_pseudo_locale: false,
		feature_share_mention_comment_cleanup: false,
		feature_external_files: false,
		feature_min_web: true,
		feature_electron_memory_logging: false,
		feature_channel_exports: false,
		feature_wait_for_all_mentions_in_client: false,
		feature_prev_next_button: false,
		feature_free_inactive_domains: true,
		feature_keyboard_navigation: false,
		feature_measure_css_usage: false,
		feature_take_profile_photo: false,
		feature_arugula: false,
		feature_texty: true,
		feature_texty_takes_over: true,
		feature_texty_browser_substitutions: false,
		feature_texty_rewrite_on_paste: false,
		feature_texty_search: false,
		feature_more_texty_search: false,
		feature_texty_mentions: false,
		feature_parsed_mrkdwn: false,
		feature_toggle_id_translation: false,
		feature_emoji_menu_tuning: false,
		feature_default_shared_channels: false,
		feature_workspace_request: false,
		feature_disc_workspace_pagination: false,
		feature_enable_mdm: false,
		feature_message_menus: true,
		feature_sli_recaps: true,
		feature_sli_recaps_interface: true,
		feature_slackbot_help_v2: true,
		feature_new_message_click_logging: true,
		feature_user_custom_status: true,
		feature_announce_only_channels: false,
		feature_two_step_oauth: true,
		feature_hide_join_leave: false,
		feature_show_join_leave_pref: true,
		feature_channel_details_invite_link: true,
		feature_update_emoji_to_v4: false,
		feature_slim_scrollbar: false,
		feature_i18n_emoji: false,
		feature_sli_briefing: true,
		feature_sli_channel_insights: false,
		feature_platform_disable_rtm: true,
		feature_scrollback_half_measures: true,
		feature_initial_scroll_position: true,
		feature_calc_unread_minimums: false,
		feature_notif_prefs_overhaul: true,
		feature_react_messages: false,
		feature_enterprise_loading_state: false,
		feature_api_admin_page: true,
		feature_api_admin_page_not_ent: false,
		feature_imgproxy_multicloud: false,
		feature_app_permissions_api_site: false,
		feature_app_index: false,
		feature_deleted_dm_archives: true,
		feature_archive_deeplink: true,
		feature_dm_retention: true,
		feature_untangle_app_directory_templates: false,
		feature_scim_profile_fields: true,
		feature_ms_msg_handlers_profiling: true,
		feature_unknown_members: false,
		feature_ms_latest: false,
		feature_no_preload_video: true,
		feature_one_rebuild_per_animation_frame: false,
		feature_disable_history_prefetch: false,
		feature_async_queue: true,
		feature_app_space: false,
		feature_app_space_permissions_tab: false,
		feature_queue_metrics: false,
		feature_stop_loud_channel_mentions: false,
		feature_message_input_byte_limit: false,
		feature_perfectrics: false,
		feature_automated_perfectrics: false,
		feature_retire_team_site_directory: false,
		feature_link_buttons: false,
		feature_nudge_team_creators: false,
		feature_sidebar_hide_count: true,
		feature_onedrive_picker: false,
		feature_lazy_pins: true,
		feature_lazy_shared_files: true,
		feature_aaa_app_dir: false,
		feature_quest_onboarding: false,
		feature_less_accessible_id_fetching: false,
		feature_delete_team_and_apps: false,
		feature_email_forwarding: false,

	client_logs: {"0":{"numbers":[0],"user_facing":false},"@scott":{"numbers":[2,4,37,58,67,141,142,389,481,488,529,667,773,808,888,999],"owner":"@scott"},"@eric":{"numbers":[2,23,47,48,72,73,82,91,93,96,365,438,552,777,794],"owner":"@eric"},"2":{"owner":"@scott \/ @eric","numbers":[2],"user_facing":false},"4":{"owner":"@scott","numbers":[4],"user_facing":false},"5":{"channels":"#dhtml","numbers":[5],"user_facing":false},"23":{"owner":"@eric","numbers":[23],"user_facing":false},"sounds":{"owner":"@scott","name":"sounds","numbers":[37]},"37":{"owner":"@scott","name":"sounds","numbers":[37],"user_facing":true},"47":{"owner":"@eric","numbers":[47],"user_facing":false},"48":{"owner":"@eric","numbers":[48],"user_facing":false},"Message History":{"owner":"@scott","name":"Message History","numbers":[58]},"58":{"owner":"@scott","name":"Message History","numbers":[58],"user_facing":true},"67":{"owner":"@scott","numbers":[67],"user_facing":false},"72":{"owner":"@eric","numbers":[72],"user_facing":false},"73":{"owner":"@eric","numbers":[73],"user_facing":false},"82":{"owner":"@eric","numbers":[82],"user_facing":false},"@shinypb":{"owner":"@shinypb","numbers":[88,1000,1989,1990,1991,1996]},"88":{"owner":"@shinypb","numbers":[88],"user_facing":false},"91":{"owner":"@eric","numbers":[91],"user_facing":false},"93":{"owner":"@eric","numbers":[93],"user_facing":false},"96":{"owner":"@eric","numbers":[96],"user_facing":false},"@steveb":{"owner":"@steveb","numbers":[99]},"99":{"owner":"@steveb","numbers":[99],"user_facing":false},"Channel Marking (MS)":{"owner":"@scott","name":"Channel Marking (MS)","numbers":[141]},"141":{"owner":"@scott","name":"Channel Marking (MS)","numbers":[141],"user_facing":true},"Channel Marking (Client)":{"owner":"@scott","name":"Channel Marking (Client)","numbers":[142]},"142":{"owner":"@scott","name":"Channel Marking (Client)","numbers":[142],"user_facing":true},"365":{"owner":"@eric","numbers":[365],"user_facing":false},"389":{"owner":"@scott","numbers":[389],"user_facing":false},"438":{"owner":"@eric","numbers":[438],"user_facing":false},"@rowan":{"numbers":[444,666],"owner":"@rowan"},"444":{"owner":"@rowan","numbers":[444],"user_facing":false},"481":{"owner":"@scott","numbers":[481],"user_facing":false},"488":{"owner":"@scott","numbers":[488],"user_facing":false},"529":{"owner":"@scott","numbers":[529],"user_facing":false},"552":{"owner":"@eric","numbers":[552],"user_facing":false},"dashboard":{"owner":"@ac \/ @bruce \/ @kylestetz \/ @nic \/ @rowan","channels":"#devel-enterprise-fe, #feat-enterprise-dash","name":"dashboard","numbers":[666]},"@ac":{"channels":"#devel-enterprise-fe, #feat-enterprise-dash","name":"dashboard","numbers":[666],"owner":"@ac"},"@bruce":{"channels":"#devel-enterprise-fe, #feat-enterprise-dash","name":"dashboard","numbers":[666],"owner":"@bruce"},"@kylestetz":{"channels":"#devel-enterprise-fe, #feat-enterprise-dash","name":"dashboard","numbers":[666],"owner":"@kylestetz"},"@nic":{"channels":"#devel-enterprise-fe, #feat-enterprise-dash","name":"dashboard","numbers":[666],"owner":"@nic"},"666":{"owner":"@ac \/ @bruce \/ @kylestetz \/ @nic \/ @rowan","channels":"#devel-enterprise-fe, #feat-enterprise-dash","name":"dashboard","numbers":[666],"user_facing":false},"667":{"owner":"@scott","numbers":[667],"user_facing":false},"773":{"owner":"@scott","numbers":[773],"user_facing":false},"777":{"owner":"@eric","numbers":[777],"user_facing":false},"794":{"owner":"@eric","numbers":[794],"user_facing":false},"Client Responsiveness":{"owner":"@scott","name":"Client Responsiveness","user_facing":false,"numbers":[808]},"808":{"owner":"@scott","name":"Client Responsiveness","user_facing":false,"numbers":[808]},"Message Pane Scrolling":{"owner":"@scott","name":"Message Pane Scrolling","numbers":[888]},"888":{"owner":"@scott","name":"Message Pane Scrolling","numbers":[888],"user_facing":true},"999":{"owner":"@scott","numbers":[999],"user_facing":false},"1000":{"owner":"@shinypb","numbers":[1000],"user_facing":false},"Members":{"owner":"@fearon","name":"Members","numbers":[1975]},"@fearon":{"owner":"@fearon","name":"Members","numbers":[1975,98765]},"1975":{"owner":"@fearon","name":"Members","numbers":[1975],"user_facing":true},"lazy loading":{"owner":"@shinypb","channels":"#devel-flannel","name":"lazy loading","numbers":[1989]},"1989":{"owner":"@shinypb","channels":"#devel-flannel","name":"lazy loading","numbers":[1989],"user_facing":true},"thin_channel_membership":{"owner":"@shinypb","channels":"#devel-infrastructure","name":"thin_channel_membership","numbers":[1990]},"1990":{"owner":"@shinypb","channels":"#devel-infrastructure","name":"thin_channel_membership","numbers":[1990],"user_facing":true},"stats":{"owner":"@shinypb","channels":"#team-infrastructure","name":"stats","numbers":[1991]},"1991":{"owner":"@shinypb","channels":"#team-infrastructure","name":"stats","numbers":[1991],"user_facing":true},"ms":{"owner":"@shinypb","name":"ms","numbers":[1996]},"1996":{"owner":"@shinypb","name":"ms","numbers":[1996],"user_facing":true},"shared_channels_connection":{"owner":"@jim","name":"shared_channels_connection","numbers":[1999]},"@jim":{"owner":"@jim","name":"shared_channels_connection","numbers":[1999]},"1999":{"owner":"@jim","name":"shared_channels_connection","numbers":[1999],"user_facing":false},"dnd":{"owner":"@patrick","channels":"dhtml","name":"dnd","numbers":[2002]},"@patrick":{"owner":"@patrick","channels":"dhtml","name":"dnd","numbers":[2002,2003,2004,2005]},"2002":{"owner":"@patrick","channels":"dhtml","name":"dnd","numbers":[2002],"user_facing":true},"2003":{"owner":"@patrick","channels":"dhtml","numbers":[2003],"user_facing":false},"Threads":{"owner":"@patrick","channels":"#feat-threads, #devel-threads","name":"Threads","numbers":[2004]},"2004":{"owner":"@patrick","channels":"#feat-threads, #devel-threads","name":"Threads","numbers":[2004],"user_facing":true},"2005":{"owner":"@patrick","numbers":[2005],"user_facing":false},"mc_sibs":{"name":"mc_sibs","numbers":[9999]},"9999":{"name":"mc_sibs","numbers":[9999],"user_facing":false},"98765":{"owner":"@fearon","numbers":[98765],"user_facing":false},"@ainjii":{"owner":"@ainjii","numbers":[8675309]},"8675309":{"owner":"@ainjii","numbers":[8675309],"user_facing":false},"@monty":{"owner":"@monty","numbers":[6532]},"6532":{"owner":"@monty","numbers":[6532],"user_facing":false}},


		img: {
			app_icon: 'https://a.slack-edge.com/272a/img/slack_growl_icon.png'
		},
		page_needs_custom_emoji: false,
		page_needs_team_profile_fields: false,
		page_needs_enterprise: false	};

	
	
	
	
	
	// i18n locale map (eg: maps Slack `ja-jp` to ZD `ja`)
			boot_data.slack_to_zd_locale = {"en-us":"en-us","fr-fr":"fr-fr","de-de":"de","es-es":"es","ja-jp":"ja"};
	
	// client boot data
	
		
	
	
	
	
//-->
</script>	
	
	



	


	<!-- output_js "core" -->
<script type="text/javascript" src="https://a.slack-edge.com/bv1-1/emoji.1ededa120e6a9042a904.min.js" crossorigin="anonymous" onload="window._cdn && _cdn.ok(this, arguments)" onerror="window._cdn && _cdn.failed(this, arguments)"></script>
<script type="text/javascript" src="https://a.slack-edge.com/bv1-1/rollup-core_required_libs.26075590dfd605943913.min.js" crossorigin="anonymous" onload="window._cdn && _cdn.ok(this, arguments)" onerror="window._cdn && _cdn.failed(this, arguments)"></script>
<script type="text/javascript" src="https://a.slack-edge.com/bv1-1/rollup-core_required_ts.6c161b39e18c61f2a0af.min.js" crossorigin="anonymous" onload="window._cdn && _cdn.ok(this, arguments)" onerror="window._cdn && _cdn.failed(this, arguments)"></script>
<script type="text/javascript" src="https://a.slack-edge.com/bv1-1/TS.web.456221fdf47c5a10d27e.min.js" crossorigin="anonymous" onload="window._cdn && _cdn.ok(this, arguments)" onerror="window._cdn && _cdn.failed(this, arguments)"></script>

	<!-- output_js "core_web" -->
<script type="text/javascript" src="https://a.slack-edge.com/bv1-1/rollup-core_web.490f831ef88d6d238945.min.js" crossorigin="anonymous" onload="window._cdn && _cdn.ok(this, arguments)" onerror="window._cdn && _cdn.failed(this, arguments)"></script>

	<!-- output_js "secondary" -->
<script type="text/javascript" src="https://a.slack-edge.com/bv1-1/rollup-secondary_a_required.e7eab203fc8083f23ac2.min.js" crossorigin="anonymous" onload="window._cdn && _cdn.ok(this, arguments)" onerror="window._cdn && _cdn.failed(this, arguments)"></script>
<script type="text/javascript" src="https://a.slack-edge.com/bv1-1/rollup-secondary_b_required.cb5fcbc97347e5378909.min.js" crossorigin="anonymous" onload="window._cdn && _cdn.ok(this, arguments)" onerror="window._cdn && _cdn.failed(this, arguments)"></script>

	<!-- output_js "application" -->
<script type="text/javascript" src="https://a.slack-edge.com/bv1-1/application.ed92cd3823b50cba92f7.min.js" crossorigin="anonymous" onload="window._cdn && _cdn.ok(this, arguments)" onerror="window._cdn && _cdn.failed(this, arguments)"></script>

			
	
	<!-- output_js "regular" -->
<script type="text/javascript" src="https://a.slack-edge.com/bv1-1/TS.web.comments.3d86f10380ed56d97a47.min.js" crossorigin="anonymous" onload="window._cdn && _cdn.ok(this, arguments)" onerror="window._cdn && _cdn.failed(this, arguments)"></script>
<script type="text/javascript" src="https://a.slack-edge.com/bv1-1/TS.web.file.e875d8b2744620648b61.min.js" crossorigin="anonymous" onload="window._cdn && _cdn.ok(this, arguments)" onerror="window._cdn && _cdn.failed(this, arguments)"></script>
<script type="text/javascript" src="https://a.slack-edge.com/bv1-1/codemirror.276c7c0e745cf2afa047.min.js" crossorigin="anonymous" onload="window._cdn && _cdn.ok(this, arguments)" onerror="window._cdn && _cdn.failed(this, arguments)"></script>
<script type="text/javascript" src="https://a.slack-edge.com/bv1-1/codemirror_load.f85ef99f6ca2441dd6d9.min.js" crossorigin="anonymous" onload="window._cdn && _cdn.ok(this, arguments)" onerror="window._cdn && _cdn.failed(this, arguments)"></script>


		<script type="text/javascript">
				TS.clog.setTeam('T640H19S7');
				TS.clog.setUser('U6449MT4L');
			</script>

			<script type="text/javascript">
	<!--
		boot_data.page_needs_custom_emoji = true;

		boot_data.file = {"id":"F65QK226B","created":1499368772,"timestamp":1499368772,"name":"personas_V0R1.md","title":"personas_V0R1.md","mimetype":"text\/plain","filetype":"markdown","pretty_type":"Markdown (raw)","user":"U63CJ046L","editable":true,"size":3528,"mode":"snippet","is_external":false,"external_type":"","is_public":true,"public_url_shared":false,"display_as_bot":false,"username":"","url_private":"https:\/\/files.slack.com\/files-pri\/T640H19S7-F65QK226B\/personas_v0r1.md","url_private_download":"https:\/\/files.slack.com\/files-pri\/T640H19S7-F65QK226B\/download\/personas_v0r1.md","permalink":"https:\/\/projetinstantdansewf3.slack.com\/files\/elise\/F65QK226B\/personas_v0r1.md","permalink_public":"https:\/\/slack-files.com\/T640H19S7-F65QK226B-034788e229","edit_link":"https:\/\/projetinstantdansewf3.slack.com\/files\/elise\/F65QK226B\/personas_v0r1.md\/edit","preview":"\r\nMarion 29 ans : \r\nWorking girl qui vient de s'installer \u00e0 Marseille, elle est festive, joyeuse, sort notamment en afterwork, voyage beaucoup et parle plusieurs langues.\r\nElle est d\u00e9j\u00e0 danseuse.\r\nElle cherche \u00e0 danser, se faire un r\u00e9seau d'amis et se donner une identit\u00e9 sociale\r","preview_highlight":"\u003Cdiv class=\"CodeMirror cm-s-default CodeMirrorServer\" oncopy=\"if(event.clipboardData){event.clipboardData.setData('text\/plain',window.getSelection().toString().replace(\/\\u200b\/g,''));event.preventDefault();event.stopPropagation();}\"\u003E\n\u003Cdiv class=\"CodeMirror-code\"\u003E\n\u003Cdiv\u003E\u003Cpre\u003E&#8203;\u003C\/pre\u003E\u003C\/div\u003E\n\u003Cdiv\u003E\u003Cpre\u003EMarion 29 ans : \u003C\/pre\u003E\u003C\/div\u003E\n\u003Cdiv\u003E\u003Cpre\u003EWorking girl qui vient de s'installer \u00e0 Marseille, elle est festive, joyeuse, sort notamment en afterwork, voyage beaucoup et parle plusieurs langues.\u003C\/pre\u003E\u003C\/div\u003E\n\u003Cdiv\u003E\u003Cpre\u003EElle est d\u00e9j\u00e0 danseuse.\u003C\/pre\u003E\u003C\/div\u003E\n\u003Cdiv\u003E\u003Cpre\u003EElle cherche \u00e0 danser, se faire un r\u00e9seau d'amis et se donner une identit\u00e9 sociale\u003C\/pre\u003E\u003C\/div\u003E\n\u003C\/div\u003E\n\u003C\/div\u003E\n","lines":51,"lines_more":46,"preview_is_truncated":true,"channels":["C64T7NBT5"],"groups":[],"ims":[],"comments_count":1,"initial_comment":{"id":"Fc6501DMBL","created":1499368772,"timestamp":1499368772,"user":"U63CJ046L","is_intro":true,"comment":"j'ai \u00e9toff\u00e9 un peu les personas et travaill\u00e9 sur le profil de l'admin"},"pinned_to":["C64T7NBT5"]};
		boot_data.file.comments = [{"id":"Fc6501DMBL","created":1499368772,"timestamp":1499368772,"user":"U63CJ046L","is_intro":true,"comment":"j'ai \u00e9toff\u00e9 un peu les personas et travaill\u00e9 sur le profil de l'admin"}];

		

		var g_editor;

		$(function(){

			var wrap_long_lines = !!TS.model.code_wrap_long_lines;

			g_editor = CodeMirror(function(elt){
				var content = document.getElementById("file_contents");
				content.parentNode.replaceChild(elt, content);
			}, {
				value: $('#file_contents').text(),
				lineNumbers: true,
				matchBrackets: true,
				indentUnit: 4,
				indentWithTabs: true,
				enterMode: "keep",
				tabMode: "shift",
				viewportMargin: 10,
				readOnly: true,
				lineWrapping: wrap_long_lines
			});

			// past a certain point, CodeMirror rendering may simply stop working.
			// start having CodeMirror use its Long List View-style scolling at >= max_lines.
			var max_lines = 8192;

			var snippet_lines;

			// determine # of lines, limit height accordingly
			if (g_editor.doc && g_editor.doc.lineCount) {
				snippet_lines = parseInt(g_editor.doc.lineCount());
				var new_height;
				if (snippet_lines) {
					// we want the CodeMirror container to collapse around short snippets.
					// however, we want to let it auto-expand only up to a limit, at which point
					// we specify a fixed height so CM can display huge snippets without dying.
					// this is because CodeMirror works nicely with no height set, but doesn't
					// scale (big file performance issue), and doesn't work with min/max-height -
					// so at some point, we have to set an absolute height to kick it into its
					// smart / partial "Long List View"-style rendering mode.
					if (snippet_lines < max_lines) {
						new_height = 'auto';
					} else {
						new_height = (max_lines * 0.875) + 'rem'; // line-to-rem ratio
					}
					var line_count = Math.min(snippet_lines, max_lines);
					TS.info('Applying height of ' + new_height + ' to container for this snippet of ' + snippet_lines + (snippet_lines === 1 ? ' line' : ' lines'));
					$('#page .CodeMirror').height(new_height);
				}
			}

			$('#file_preview_wrap_cb').bind('change', function(e) {
				TS.model.code_wrap_long_lines = $(this).prop('checked');
				g_editor.setOption('lineWrapping', TS.model.code_wrap_long_lines);
			})

			$('#file_preview_wrap_cb').prop('checked', wrap_long_lines);

			CodeMirror.switchSlackMode(g_editor, "markdown");
		});

		
		$('#file_comment').css('overflow', 'hidden').autogrow();
	//-->
	</script>


			<script type="text/javascript">TS.boot(boot_data);</script>
	
<style>.color_9f69e7:not(.nuc) {color:#9F69E7;}.color_4bbe2e:not(.nuc) {color:#4BBE2E;}.color_e7392d:not(.nuc) {color:#E7392D;}.color_3c989f:not(.nuc) {color:#3C989F;}.color_674b1b:not(.nuc) {color:#674B1B;}.color_e96699:not(.nuc) {color:#E96699;}.color_e0a729:not(.nuc) {color:#E0A729;}.color_684b6c:not(.nuc) {color:#684B6C;}.color_5b89d5:not(.nuc) {color:#5B89D5;}.color_2b6836:not(.nuc) {color:#2B6836;}.color_99a949:not(.nuc) {color:#99A949;}.color_df3dc0:not(.nuc) {color:#DF3DC0;}.color_4cc091:not(.nuc) {color:#4CC091;}.color_9b3b45:not(.nuc) {color:#9B3B45;}.color_d58247:not(.nuc) {color:#D58247;}.color_bb86b7:not(.nuc) {color:#BB86B7;}.color_5a4592:not(.nuc) {color:#5A4592;}.color_db3150:not(.nuc) {color:#DB3150;}.color_235e5b:not(.nuc) {color:#235E5B;}.color_9e3997:not(.nuc) {color:#9E3997;}.color_53b759:not(.nuc) {color:#53B759;}.color_c386df:not(.nuc) {color:#C386DF;}.color_385a86:not(.nuc) {color:#385A86;}.color_a63024:not(.nuc) {color:#A63024;}.color_5870dd:not(.nuc) {color:#5870DD;}.color_ea2977:not(.nuc) {color:#EA2977;}.color_50a0cf:not(.nuc) {color:#50A0CF;}.color_d55aef:not(.nuc) {color:#D55AEF;}.color_d1707d:not(.nuc) {color:#D1707D;}.color_43761b:not(.nuc) {color:#43761B;}.color_e06b56:not(.nuc) {color:#E06B56;}.color_8f4a2b:not(.nuc) {color:#8F4A2B;}.color_902d59:not(.nuc) {color:#902D59;}.color_de5f24:not(.nuc) {color:#DE5F24;}.color_a2a5dc:not(.nuc) {color:#A2A5DC;}.color_827327:not(.nuc) {color:#827327;}.color_3c8c69:not(.nuc) {color:#3C8C69;}.color_8d4b84:not(.nuc) {color:#8D4B84;}.color_84b22f:not(.nuc) {color:#84B22F;}.color_4ec0d6:not(.nuc) {color:#4EC0D6;}.color_e23f99:not(.nuc) {color:#E23F99;}.color_e475df:not(.nuc) {color:#E475DF;}.color_619a4f:not(.nuc) {color:#619A4F;}.color_a72f79:not(.nuc) {color:#A72F79;}.color_7d414c:not(.nuc) {color:#7D414C;}.color_aba727:not(.nuc) {color:#ABA727;}.color_965d1b:not(.nuc) {color:#965D1B;}.color_4d5e26:not(.nuc) {color:#4D5E26;}.color_dd8527:not(.nuc) {color:#DD8527;}.color_bd9336:not(.nuc) {color:#BD9336;}.color_e85d72:not(.nuc) {color:#E85D72;}.color_dc7dbb:not(.nuc) {color:#DC7DBB;}.color_bc3663:not(.nuc) {color:#BC3663;}.color_9d8eee:not(.nuc) {color:#9D8EEE;}.color_8469bc:not(.nuc) {color:#8469BC;}.color_73769d:not(.nuc) {color:#73769D;}.color_b14cbc:not(.nuc) {color:#B14CBC;}</style>

<!-- slack-www-hhvm-099c3380e1d8ea7b4 / 2017-07-07 02:08:51 / v4294e1525b30111d8d555f4e1a9f84640e1e3b82 / B:H -->


</body>
</html>