<!doctype html>
<!--[if lt IE 9]><html class="oldie ++ rad no-js custom"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="++ rad no-js custom"> <!--<![endif]-->
<head>
    <meta charset=utf-8>
    <link rel=dns-prefetch href=//airve.github.com>
    <link rel=dns-prefetch href=//cdn.airve.com>

    <title>css3base: opensource CSS modules</title>
    <!-- 
        view the source of this entire site
        @link    github.com/ryanve/css3base   (please contribute =)
        @logo    cdn.airve.com/logo/css3base/ (css often requires sideways thinking)
    -->
    <meta name=viewport content="width=device-width,initial-scale=1.0">
    <meta name=description content="Modular css builder for base stylesheets.">
    <meta name=author content="Ryan Van Etten">

    <link rel=stylesheet href="http://css3base.com/build/normalize,fit,plus,rad,aid,print.20130415.css">
    <link rel=image_src href="http://css3base.com/apple-touch-icon.png"><!-- repurpose ios icon -->

    <style>
        /* The purpose of the `.custom` class is to override specificity from base sheets. */
        body { max-width:1004px; width:98%; padding:0 1% }
        a { text-decoration:none }
        form ul { list-style-type:none; padding-left:0 }
        form li { display:block; padding:1em; color:#133; background:#bee }
        form li:hover { background:#aee }
        form a, .custom form a { color:#409; font-weight:bold }
        form a:hover,.custom form a:hover { color:#e30 }
        form li+li { margin-top: 2px }
        .file:hover, .mode:hover { cursor:pointer }
        .no-js .file:hover,.oldie .file:hover { cursor:text }
        #build { padding:.3em 1em; font-weight:bold }
        @media all and (min-width:310px) {
            #logo{ width:160px; height:160px }
        }
        #logo:hover { opacity: 0.9; filter: alpha(opacity=90); }
        #build,.custom #build { display:block; padding:.6em 1em; background:#409; color:#ed3; text-align:center }
        #build:hover,.custom #build:hover { background: #fa0; color:#409; }
        #footer{ margin:2em 0;border-bottom:1em solid #ffe }
        nav ul { padding:0 }
        nav ul li{display:block;float:left;margin:0 0 1em}
        nav ul li a{ padding:.5em; background:#ed3; color:#409 !important; margin:0 1px 1em 0 }
        nav ul li a:hover{ background:#fa0 }
        .chromeframe { padding: 1em }
        .chromeframe a { border-bottom: 1px solid #bee }
        .oldie #build, .oldie input, .oldie .raw { display:none }
    </style>
    
    <script src="http://airve.github.com/js/modernizr/modernizr_shiv.min.js"></script>
   
</head>
<body id="start" data-ymd="<?php echo date('Ymd'); ?>" itemscope itemtype="http://schema.org/WebApplication">

    <header id="header">
        <h1>
            <a itemprop="url" href="http://css3base.com" accesskey="1" rel="home">
                <img id="logo" itemprop="image thumbnailUrl" src="http://cdn.airve.com/logo/css3base/300/css3base_logo_red_300.png" width="300" height="300" alt="css3base">
            </a>
        </h1>
    </header>
    
    <!--[if lt IE 9]>
        <p class="chromeframe rad dark">You are using an <strong>outdated</strong> browser. To fully experience this site you must <a href="http://browsehappy.com/">upgrade your browser</a> <b>or</b> <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a>.</p>
    <![endif]-->

    <noscript>
        For full functionality of this site it is necessary to enable JavaScript.
        Here are the <a href="http://www.enable-javascript.com/">
        instructions how to enable JavaScript in your web browser</a>.
    </noscript>
    
    <h2>
        <span itemprop="name">css3base</span>: <span itemprop="description">modular <a href="/css">css</a> builder</span>
    </h2>
    
    <form class="++">
        <ul>
            <li><input checked type=checkbox data-file="normalize"> <strong class="file" title="&radic;">normalize.css</strong> <small><span class=shape>&#9648;</span> Modern CSS reset alternative by <a href="https://github.com/necolas/normalize.css">@necolas</a> <span class=shape>&#9648;</span> <a class=raw href="http://css3base.com/css/normalize.css">raw</a></small>

            <li><input type=checkbox data-file="h5bp"> <strong class="file" title="&radic;">h5bp.css</strong> <small><span class=shape>&#9648;</span> <a href="https://github.com/h5bp/html5-boilerplate/tree/master/css">H5BP</a> <q>opinionated defaults</q> <span class=shape>&#9648;</span> <a class=raw href="http://css3base.com/css/h5bp.css">raw</a></small>

            <li><input checked type=checkbox data-file="fit"> <strong class="file" title="&radic;">fit.css</strong> <small><span class=shape>&#9648;</span> Responsive base for HTML5 elements by <a href="https://github.com/ryanve/css3base/blob/master/css/fit.css">@ryanve</a> <span class=shape>&#9648;</span> <a class=raw href="http://css3base.com/css/fit.css">raw</a></small>

            <li><input type=checkbox data-file="plus"> <strong class="file" title="&radic;">plus.css</strong> <small><span class=shape>&#9648;</span> Mobile-first <a href="http://en.wikipedia.org/wiki/Fibonacci_number" title="Wikipedia &raquo;">Fibonacci</a> text by <a href="https://github.com/ryanve/css3base/blob/master/css/plus.css">@ryanve</a> <span class=shape>&#9648;</span> <a class=raw href="http://css3base.com/css/plus.css">raw</a></small>

            <!--<li><input type=checkbox data-file="rad"> <strong class="file"  title="&radic;">rad.css</strong> <small><span class=shape>&#9648;</span> 80s-inspired color scheme by <a href="https://github.com/ryanve/css3base/blob/master/css/rad.css">@ryanve</a> <span class=shape>&#9648;</span> <a class=raw href="http://css3base.com/css/rad.css">raw</a></small>-->

            <li><input type=checkbox data-file="solarized"> <strong class="file" title="&radic;">solarized.css</strong> <small><span class=shape>&#9648;</span> A <a href="http://ethanschoonover.com/solarized">Solarized</a> color scheme implementation <span class=shape>&#9648;</span> <a class=raw href="http://css3base.com/css/solarized.css">raw</a></small>
            
            <li><input checked type=checkbox data-file="aid"> <strong class="file" title="&radic;">aid.css</strong> <small><span class=shape>&#9648;</span> Assistive helpers based on <a href="https://github.com/h5bp/html5-boilerplate/tree/master/css">H5BP</a> <span class=shape>&#9648;</span> <a class=raw href="http://css3base.com/css/aid.css">raw</a></small>

            <li><input type=checkbox data-file="helper"> <strong class="file" title="&radic;">helper.css</strong> <small><span class=shape>&#9648;</span> <a href="https://github.com/h5bp/html5-boilerplate/tree/master/css">H5BP</a> helper classes <span class=shape>&#9648;</span> <a class=raw href="http://css3base.com/css/helper.css">raw</a></small>
            
            <li><input type=checkbox data-file="tracer"> <strong class="file" title="&radic;">tracer.css</strong> <small><span class=shape>&#9648;</span> subtle transitions <span class=shape>&#9648;</span> <a class=raw href="http://css3base.com/css/tracer.css">raw</a></small>
            
            <li><input type=checkbox data-file="custom"> <strong class="file" title="&radic;">custom.css</strong> <small><span class=shape>&#9648;</span> A placeholder for your custom css. <span class=shape>&#9648;</span> <a href="http://css3base.com/css/custom.css">raw</a></small>
            
            <li><input checked type=checkbox data-file="print"> <strong class="file" title="&radic;">print.css</strong> <small><span class=shape>&#9648;</span> Hybrid print styles based on <a href="https://github.com/h5bp/html5-boilerplate/tree/master/css">H5BP</a> <span class=shape>&#9648;</span> <a class=raw href="http://css3base.com/css/print.css">raw</a></small>
            
            <li><input checked type=checkbox data-mode="min"> <span class="mode">compress</span>
        </ul>
        <a id="build" class="++" href="#build" accesskey=u>BUILD</a>
    </form>
    
    <footer id="footer">
        <nav>
            <h3 class="assistive">Project Links</h3>
            <ul>
                <li><a href="#start" title="up" accesskey="a"><span class=shape>&#9650;</span></a>
                <li><a href="http://twitter.com/ryanve" title="Twitter: @ryanve" itemprop="creator" accesskey=r>@ryanve</a>
                <li><a href="http://css3base.com/css/" title="css index" accesskey=i><b>/css</b></a>
                <li><a href="http://cdn.airve.com/logo/css3base/" title="logo index"><b>/logo</b></a></li>
                <li><a href="https://github.com/ryanve/css3base" title="repo" accesskey=g>Github</a>
                <li><a href="https://github.com/ryanve/css3base/issues" title="report an issue" accesskey=9>/issues</a>
                <li class="hidden"><a id="end" href="#end" title="down" accesskey=z><span class=shape>&#9660;</span></a>
            </ul>
        </nav>
        
        <div class="diagnostic">
            <h3>Testing</h3>
            <ul>
                <!--<li><a accesskey=x href="http://validator.w3.org/check?uri=referer">validate</a>-->
                <li><a accesskey="x" rel="nofollow" href="http://html5.validator.nu/?doc=http://css3base.com/">validate</a>
                <li><a accesskey="o" rel="nofollow" href="http://gsnedders.html5.org/outliner/process.py?url=http://css3base.com/">outline</a>
                <li><a accesskey="d" rel="nofollow" href="http://www.google.com/webmasters/tools/richsnippets?url=http://css3base.com/">data</a>
            </ul>
        </div>
    </footer>

    <!-- accesskeys: 
        1: homepage
        9: contact
        a: page up
        g: github repo
        i: css index
        o: outline
        r: author
        u: build
        v: validate
        z: page down
    -->

<!-- 
    Don't run the builder in IE8- (the js works in IE8 but IE8 forces a download of
    the css). This site is for developers so IE doesn't matter. Just sayin. In 
    Safari 5, if you press 'build', it works. But, if you then press 'back' and 
    'build' again, it doesn't. I'm not sure why. I tried with jQuery and with 
    changing the a#build to input#build but it was the same deal. Curious.
-->

<!--[if gt IE 8]><!-->
    <script src="http://airve.github.com/js/elo/elo.min.js"></script>
    <script>
    (function ($, location) {
        $ && $(function($) {
            var dir = 'http://css3base.com/build/'
              , $inputs = $('input')
              , defaultBuildName = '_'
              , ymd = this.body.getAttribute('data-ymd')
              , mode = ''
              , ext = isFinite(ymd) ? '.' + ymd + '.css' : '';

            $('.file,.mode').on('click', function() {
                // make it easier to check the checkboxes
                var node = this;
                while (node = node.previousSibling) {
                    if ('INPUT' === node.nodeName) {
                        node.checked = !node.checked;
                        break;
                    }
                }
            });

            $('#build').on('click', function() {
                var files = '';
                $inputs.each(function(el) {
                    var data;
                    el && (el.checked 
                        ? (data = el.getAttribute('data-file')) && (files += (files ? ',' : '') + data)
                        : (data = el.getAttribute('data-mode')) && (mode = '&mode=dev')
                    );
                });
                files = files || defaultBuildName;
                location.href = dir + files + ext + mode; // it works with or w/o the extension
            });
        });
    }(this.elo, location));
    </script>
<!--<![endif]-->

<!-- Google Analytics code. In the last line, 
     change UA-XXXXX-X and hostname to yours:
--><script>
(function(w,d,t,l,a,h){
    if(h&&l.hostname!==h)return;
    w["_gaq"]=[["_setAccount",a],["_trackPageview"]];
    var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.async=1;g.src=("https:"==l.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
    s.parentNode.insertBefore(g,s);
}(this,document,"script",location,"UA-5731919-25","css3base.com"));
</script>

</body> 
</html>
