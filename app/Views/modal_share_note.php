<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Share This Note</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <section class="wait-message">
          <img src="/assets/img/loading.gif">
          <p >Wait... while system is securing your Notes...</p>
        </section>
        <section class="another-message">
          <h5>Notes successfully secured!</h5>
          <p>Put Your Friends Number (Whatsapp) for Sharing</p>
          <input id="no-wa-target-sharing" type="text" value="" placeholder="start with 08xxxxxx" >
        </section>
        <section class="error-message">
          <h5>Securing Process failed!</h5>
        </section>
      </div>
      <div class="modal-footer">

        <button type="button" id="send-note" class="btn btn-primary">Send</button>
      </div>
    </div>
  </div>
</div>