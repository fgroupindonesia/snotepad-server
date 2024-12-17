// singlecall.js

function loadScript(src) {
    return new Promise((resolve, reject) => {
        const script = document.createElement('script');
        script.src = src;
        script.onload = () => resolve();
        script.onerror = () => reject(new Error(`Failed to load script: ${src}`));
        document.head.appendChild(script);
    });
}

async function call(namefile){
	let location = '/assets/vendor/highlight/languages/' + namefile;
	await loadScript(location);
}

async function loadScripts() {
    try {
    	call('plaintext.js');
        call('apache.js');
        call('basic.js');
        call('c.js');
        call('cpp.js');
        call('csharp.js');
        call('css.js');
        call('go.js');
        call('java.js');
        call('javascript.js');
        call('json.js');
        call('markdown.js');
        call('nginx.js');
        call('powershell.js');
        call('rust.js');
        call('sql.js');
        call('typescript.js');
        call('vbnet.js');
        call('vbscript.js');
        call('vbscript-html.js');
        call('xml.js');

        console.log('All scripts loaded successfully');
    } catch (error) {
        console.error(error);
    }
}

// Call the function to load the scripts
loadScripts();