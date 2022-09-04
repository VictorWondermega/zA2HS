
// version: 1

// ザガタ。六 /////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////

function zA2HS(za,a,n) {
	/* Zagata.Add to Homescreen */

	this.za = (typeof(za)=='undefined')?false:za; // core
	var a = (typeof(a)=='undefined')?false:a; // attr
	this.n = (typeof(n)=='undefined')?'zA2HS':n; // name

	this.e = false;
	this.da = false;
	
	///////////////////////////////
	// funcs


	///////////////////////////////
	// ini
	this.za.msg('dbg','zA2HS','i am '+this.n+'(zA2HS)');

    var deferredPrompt;
    var installBtn = document.getElementById('btn-install');

    window.addEventListener('appinstalled', (e) => {
        console.log('minicalc installed');
    });

    window.addEventListener('beforeinstallprompt', (e) => {
        console.log('minicalc beforeinstallprompt');
        e.preventDefault();
        deferredPrompt = e;
        // Update UI notify the user they can add to home screen
        // installBtn.style.display = 'block';
		console.log('show button',this);
    });

    function isIos(){
        return /iphone|ipad|ipod/.test( window.navigator.userAgent.toLowerCase() );
    }
    // Detects if device is in standalone mode
    function isInStandaloneMode(){
        return ('standalone' in window.navigator) && (window.navigator.standalone);
    }

    // Checks if should display install popup notification:
    if(isIos() && !isInStandaloneMode()) {
        // offer app installation here
        // installBtn.style.display = 'block';
		console.log('show button');
    }

    if("serviceWorker" in navigator) {
        if (navigator.serviceWorker.controller) {
            console.log("[PWA] active service worker found, no need to register");
        } else {
            // Register the service worker
            navigator.serviceWorker
                .register("/serviceWorker.js", {
                    scope: "/"
                })
                .then(function (reg) {
                    console.log("[PWA] Service worker has been registered for scope: " + reg.scope);
                });
        }
    }

};

////////////////////////////////////////////////////////////////
if(typeof(zlo)=='object') {
	zlo.da('zA2HS');
} else {
  console.log('zA2HS');
}
