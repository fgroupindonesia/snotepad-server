<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">

  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Favicons -->
  <link rel="icon" type="image/x-icon" href="/assets/img/favicon.png" >
  <link href="/assets/img/favicon.png" rel="apple-touch-icon">

<link rel='stylesheet' href='/assets/css/style.css' />
<link rel='stylesheet' href='/assets/css/quill.snow.css' />

<link rel="stylesheet" href="/assets/css/font-awesome.min.css">

<title>SNPAD - Write Your Notes: </title>
  <meta content="SNPAD offers encrypted digital journaling for every notes, codes, and file text with security & privacy. Start protecting your notes today here in SNPAD." name="description">
  <meta content="notepad, security, secured, secure notepad, secured note, secured notes, note apps, note web app, web app, desktop app, apps, program, applications, download, access, free, upload, post, privacy, security, encryption, decryption" name="keywords">
<link rel='stylesheet' href='/assets/vendor/bootstrap/css/bootstrap.css' />

<script src="/assets/js/quill.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="/assets/js/jquery-3.7.1.min.js"></script>
<script src="/assets/js/web-worker.js"></script>


</head>


<body class='centered'>

<?php include('modal_share_note.php'); ?>
<?php include('modal_share_direct_note.php'); ?>

<div id="container-logo">
<a href="http://snpad.fgroupindonesia.com">
<img class="logo24" src="/assets/img/logo-snpad.png" />
</a>
</div>

<h3 id="title-encrypted" >Write Your Notes:</h3>
<br>
<center>
<div class='fit medium-note' id='writepad'>  </div>
<span id="limit-size">Warning! The notes is exceeding limit (now is 
  <b id="current-size"> </b> from 2Mb). </span>
</center>
<input id="secure-note" type='button' data-bs-toggle="modal" data-bs-target="#exampleModal" value='(Secured) Share this!' class=' btn-primary btn-translate' />
<input id="direct-share-note" type='button' data-bs-toggle="modal" data-bs-target="#directShareModal" value='(Not Secured) Direct Share this!' class='btn-primary btn-translate' />
<input id="btn-clear" type='button' value='Clear All' class='btn-primary ' />

<script>
  const quill = new Quill('#writepad', {
    theme: 'snow'
  });
</script>

<input type="hidden" id="qcode" name="q" value="">

</body>

</html>