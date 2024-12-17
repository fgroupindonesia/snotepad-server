const URL_TRANSLATE_TO_CODE     = "/translate-to-code";
const URL_TRANSLATE_FROM_CODE   = "/translate-from-code";
const URL_TRANSLATE_TO_CODE_NONSECURED = "/translate-to-code-nonsecured";
const URL_UPDATE_PASSKEY   = "/update-passkey";
const URL_VIEW = "";
const URL_TINY_URL_API = "https://tinyurl.com/api-create.php?url=";

let _status_saved = false;
let _data_saved = '';
const MAX_SIZE = 1 * 1024 * 1024;
let _debounce_timer;
const _debounce_delay = 300;

$( document ).ready(function() {
    console.log( "ready!" );

    $('#send-note').on('click', function(){
        let qcodeNa = $('#qcode').val();
        let passkeyNa = $('#no-wa-target-sharing').val();

        let snpadURL = window.location.origin + '/view?q=' + qcodeNa;
        let shortURLNa = convertToShort(snpadURL);

        let dataForm = {q : qcodeNa, passkey : passkeyNa, shorturl: shortURLNa};
        console.log('mengirim ' + passkeyNa + ' ' + qcodeNa + ' to ' + URL_UPDATE_PASSKEY);

        updatePassKey(dataForm, URL_UPDATE_PASSKEY);
    	
    });

    // to ensure the text is not over limit
    // and not freeze when checking it over the time
 $('body').on('cut keydown keyup paste', '#writepad div', function(){
  
    ensureNotExceedingLimit($(this));

  });


    // to ensure the text is not over limit
    // and not freeze when checking it over the time
    $('body').on('cut keydown keyup paste', '#writepad div', function(){
        
      ensureNotExceedingLimit($(this));

    } );

     $('#btn-open-access').on('click', function(){
        let pass = $('#passkey').val();
        let code = $('#text-content').find('code').text();
        let q = $('#q').val();

          $('.wait-message').show();
          $('.access-message').hide();
          $('#btn-open-access').hide();


        // call the system for opening the data
        // after 3 seconds
        setTimeout(function(){
               requestAccess(q, pass, code, URL_TRANSLATE_FROM_CODE);
        }, 3000);

       
    });

    $('#btn-translate').on('click', function(){
    	
        $('#btn-open-access').hide();
    	$('.error-message').hide();
        $('.wait-message').hide();
        $('.access-message').show();

    });

      $('#btn-clear').on('click', function(){
        
      $('.ql-editor').html('');
      $('#qcode').val('');

    });



    $('#direct-share-note').on('click', function(){ 
    
        let textNa = $('.ql-editor').html();
        let langNa = $('#language').val();
        let dataNa = {text : textNa, mode:'ns', language: langNa};

         setTimeout(function(){
                if(_status_saved != true || _data_saved != textNa){
                 _data_saved = textNa;
                 sendData(dataNa, URL_TRANSLATE_TO_CODE_NONSECURED);
                }else if(_data_saved == textNa) {
                    $('.wait-message').hide();
                    $('.another-message').show();
                }
        }, 3000);

    });

    // reformatting using highlighterjs
    reformatting();
         

    $('#secure-note').on('click', function(){
        
        $('#send-note').hide();
        $('.another-message').hide();
        $('.error-message').hide();

        let textNa = $('.ql-editor').html();
        let langNa = $('#language').val();
        let dataNa = {text : textNa, language: langNa};

        // call the system for securing the data
        // after 3 seconds
        setTimeout(function(){
                sendData(dataNa, URL_TRANSLATE_TO_CODE);
        }, 3000);
        

    });

    $('#direct-sharing-link').click('on', function(){

        let el = $('#direct-sharing-link');
        copyToClipboard(el);

    });

    $('#no-wa-target-sharing').keyup(function() {
      if ($(this).val().trim() === '') {
        $('#send-note').hide(); 
      } else {
        $('#send-note').show(); 
      }
    });

    $('#passkey').keyup(function() {
      if ($(this).val().trim() === '') {
        $('#btn-open-access').hide(); 
      } else {
        $('#btn-open-access').show(); 
      }
    });

    $('#click-copy').on('click',function(){

        animateCopying();

        let el = $('#text-content').find('code').text();
        const tempTextarea = $('<textarea>');

        // Append it to the body and set its value to the code text
        $('body').append(tempTextarea);
        // Select the text inside
        tempTextarea.val(el).select(); 

        try {
            document.execCommand('copy'); 
        } catch (err) {
            console.error('Error copying text:', err);
        }

        // Remove the temporary textarea
        tempTextarea.remove();

    });

    $('.close-note').on('click',function(){
        $('#directShareModal').modal('hide');
        $('.wait-message').show();
        $('.another-message').hide();
    });

    setTimeout(function(){
        addToggleLanguages();
    }, 3000);
    

});

function ensureNotExceedingLimit(element){

  clearTimeout(_debounce_timer);
        _debounce_timer = setTimeout(() => {

        const text = $(element).text(); 
        const textSize = new TextEncoder().encode(text).length;
       
            if (textSize > MAX_SIZE) {
               $('#limit-size').show();
               $('#secure-note').hide();
               $('#direct-share-note').hide();

            } else {
               
                $('#limit-size').hide();
                $('#secure-note').show();
                $('#direct-share-note').show();
            }

        }, _debounce_delay);

}

function animateCopying(){

        $('#click-copy-message').text('copied!');
        $('#click-copy-message').fadeOut();

        $(this).fadeOut();
        let el = $(this);
        let msg = $('#click-copy-message');

        setTimeout(function(){
            
            el.fadeIn();
            msg.fadeIn();

            setTimeout(function(){
                msg.fadeOut();
            },400);

        }, 400);

}

function copyToClipboard(el){

                $('.success-copied').show();

                // Copy the text to the clipboard
                try {
                        el.select();
                    document.execCommand("copy");
                    //alert("Text copied to clipboard: " + inputElement.value);
                    setTimeout(function(){
                        $('.success-copied').fadeOut();
                    },1500);
                } catch (err) {
                    //alert("Failed to copy text.");
                }

}

function sendIntoWA(aShortedURL){

    // https://api.whatsapp.com/send?phone=1111111111&text=Hi
    let phone = $('#no-wa-target-sharing').val();
    phone = phone.replace(/-/g, "");
    phone = phone.replace(/^08/, "628");
    phone = phone.replace("62 8","628");
    phone = phone.replace(" ", "");
    phone = phone.replace("+", "");

    let text = '*Check Pesanku* di ' + aShortedURL + ' ya!';
    let url = "https://api.whatsapp.com/send?phone=" + phone + "&text=" + encodeURI(text);
    window.location = url;

}

function reformatting(){

 const currentPath = window.location.pathname;

if (currentPath.includes('/view')) {
    document.querySelectorAll('pre code').forEach((block) => {
        hljs.highlightElement(block);
    });

}

}
    
function convertToShort(urlNa){

    let targetURL = URL_TINY_URL_API + urlNa;
    let result  = '';

    $.ajax({
        url: targetURL,
        async: false,
        cache : false,
        type: 'GET',
        success: function(data){
           result = data;
        }
    });

    return result;

}

function updatePassKey(dataNa, urlNa){
let shortURL = dataNa.shorturl;

    $.ajax({
        url: urlNa,
        data: (dataNa),
        cache : false,
        type: 'POST',
        success: function(data){
            console.log(data);
            
            if(data == 'success'){
                sendIntoWA(shortURL);
            }

        }
    });

}

function requestAccess(qNa, dataPass, codeNa, urlNa){

let dataForm = {q : qNa, passkey : dataPass, code : codeNa};

console.log('mengirim ' + JSON.stringify(dataForm) + ' to ' + urlNa);

    $.ajax({
        url: urlNa,
        data: (dataForm),
        cache : false,
        type: 'POST',
        success: function(data){
            console.log(data);
            let dataIn = JSON.parse(data);
            if(dataIn.status == 'success'){
              
              $('#text-content').find('code').text(dataIn.data);
              $('#text-content').find('code').attr('class', 'language-'+dataIn.language);
              $('#text-content').data('status', 'decrypted');
              $('#btn-translate').hide();
              $('#title').text('Decrypted Notes:');

              // close the modal
              $('#passkeyForm').modal('hide');
              $('html').find('title').text('SNPAD - Decrypted Notes:');

              reformatting();
              
            }else{
                $('.error-message').show();
                $('.wait-message').hide();
                  $('#btn-open-access').hide(); 
            }
        }
    });

}

function addToggleLanguages(){

   const currentPath = window.location.pathname;
   console.log('adding toggle button');

if (currentPath.endsWith('/write')) {
    // console.log("The URL ends with '/write'.");


    // this will create languages dropdown
    let divEl = $('div[role="toolbar"]');

    let span = $('<span>');
    span.attr('class', 'ql-formats');

    let dropdown = $('<select>');
    dropdown.attr('id', 'language');
    dropdown.attr('name', 'language');

    let dataOptions = ["plaintext", "apache", "basic", "c", "cpp", "csharp", "css", "go", "java", "javascript", "json", "markdown", "nginx", "powershell", "rust", "sql", "typescript", "vbnet", "vbscript", "vbscript-html", "xml"];
    
    for(i = 0; i<dataOptions.length; i++){
        let opt = createLanguagesOptions(dataOptions[i]);
        dropdown.append(opt);
    }


    span.append(dropdown);
    divEl.append(span);

}

}

function createLanguagesOptions(lang){

    let opt1 = $('<option>');
    opt1.attr('value', lang);
    opt1.text(lang);

    return opt1;

}

function sendData(dataForm, urlNa){

console.log('mengirim ' + JSON.stringify(dataForm) + ' to ' + urlNa);

    $.ajax({
        url: urlNa,
        data: (dataForm),
        cache : false,
        type: 'POST',
        success: function(data){
            console.log(data);
            let dataIn = JSON.parse(data);
            if(dataIn.status == 'success'){
                $('#qcode').val(dataIn.q);
                $('.ql-editor').html(dataIn.data);

                $('.another-message').show();
                $('.wait-message').hide();

                if(urlNa == URL_TRANSLATE_TO_CODE_NONSECURED){
                    let link = window.location.origin;
                    $('#direct-sharing-link').val(link + '/view?q=' + dataIn.q);
                    _status_saved = true;
                }

            }else{
                $('.error-message').show();
                $('#wait-message').hide();
            }
        }
    });

}