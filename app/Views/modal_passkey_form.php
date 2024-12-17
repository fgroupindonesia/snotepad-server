<!-- Modal -->
<div class="modal fade" id="passkeyForm" tabindex="-1" aria-labelledby="passkeyFormLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Input Passkey</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center>
        <section class="access-message">
          <h5>Access Required</h5>
          <p>Put the number (passkey) for accessing the content.</p>
          <input id="passkey" type="text" value="" placeholder="ask your friend who share this page..." >
        </section>
        <section class="wait-message">
          <img src="/assets/img/loading.gif">
          <p >Wait... while system is translating the content...</p>
        </section>
        <section class="error-message">
           <img src="/assets/img/error.png">
          <h5>Opening content failed!</h5>
        </section>
      </center>
      </div>
      <div class="modal-footer">

        <button type="button" id="btn-open-access" class="btn btn-primary">Open Access</button>
      </div>
    </div>
  </div>
</div>