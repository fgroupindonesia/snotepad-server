<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">

<link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Favicons -->
  <link rel="icon" type="image/x-icon" href="/assets/img/favicon.png" >
  <link href="/assets/img/favicon.png" rel="apple-touch-icon">

<link rel='stylesheet' href='/assets/vendor/bootstrap/css/bootstrap.css' />
<link rel='stylesheet' href='/assets/css/style.css' />

<link rel="stylesheet" href="/assets/vendor/highlight/styles/default.min.css">
<script src="/assets/vendor/highlight/highlight.min.js"></script>
<script src="/assets/vendor/highlight/languages/c.js"></script>
<script src="/assets/vendor/highlight/languages/xml.js"></script>

<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="/assets/js/jquery-3.7.1.min.js"></script>
<script src="/assets/js/web-worker.js"></script>

<title>SNPAD - <?= $title ;?> </title>
  <meta content="SNPAD offers encrypted digital journaling for every notes, codes, and file text with security & privacy. Start protecting your notes today here in SNPAD." name="description">
  <meta content="notepad, security, secured, secure notepad, secured note, secured notes, note apps, note web app, web app, desktop app, apps, program, applications, download, access, free, upload, post, privacy, security, encryption, decryption" name="keywords">


</head>

<body class='centered'>

<div id="container-logo">
<a href="<?= base_url(); ;?>" >
<img class="logo24" src="assets/img/logo-snpad.png" />
</a>
</div>

<?php include('modal_passkey_form.php'); ?>

<h3 id="title" ><?= $title; ?></h3>
<br>
<input type="hidden" id="q" name="q" value="<?= $q; ?>" >
<div class='fit' id="text-content" data-status="<?=$status_data;?>" >
  <p class="title-language"><b><?= $language; ?></b> Language : </p>
  <img src="/assets/img/copy.png" id="click-copy" />
  <span id="click-copy-message"> </span>
  <pre> <code class="language-<?= $language ;?>"> <?=$konten ;?> </code> </pre>
  <p class="note-date_created">Created Date : <?= $date_created; ?> </p>
</div>

<input type='button' data-bs-toggle="modal" data-bs-target="#passkeyForm"  id="btn-translate" value='translate this!' class='<?=$hide_btn;?> btn-primary btn-translate' />

</body>

</html>