<!-- Modal -->
<div class="modal fade" id="directShareModal" tabindex="-1" aria-labelledby="directShareModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="directShareModalLabel">Share This Note</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <section class="wait-message">
          <img src="/assets/img/loading.gif">
          <p >Wait... while system is sharing your Notes...</p>
        </section>
        <section class="another-message">
          <h5>Notes successfully secured!</h5>
          <p>Copy this for direct Sharing</p>
          <p class="success-copied" >Successfully copied to clipboard!</p>
          <input id="direct-sharing-link" readonly type="text" value="" >
        </section>

      </div>
      <div class="modal-footer">
        <button type="button" class="close-note btn btn-primary">Close</button>
      </div>
    </div>
  </div>
</div>