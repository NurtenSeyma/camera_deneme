<div class="modal-header">
<h5 class="modal-title">Fotoğraf Çek</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body" style="overflow: hidden;">
    <img id="output">
    <video id="player" autoplay></video>
    <canvas id="canvas" style="display: none" width=1920 height=1080></canvas>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
<button type="button" class="btn btn-primary capture">Fotoğraf Çek</button>
</div>



<script>

  const supported = 'mediaDevices' in navigator;
  const player = document.getElementById('player');
  const constraints = {
    video: true,
  };

  navigator.mediaDevices.getUserMedia(constraints)
  .then((stream) => {
    player.srcObject = stream;
  });

  const canvas = document.getElementById('canvas');
  const context = canvas.getContext('2d');


$(document).on("click", ".capture", function()
{
    context.drawImage(player, 0, 0, canvas.width, canvas.height);
      var temp = canvas.toDataURL();
      player.style.display="none";
      canvas.style.display="block";
      console.log(temp);
      //
      $.ajax({
          url:"include/capture.php",
          type: "POST",
          data: {image:temp},
          success: function (response) {
                

                //$('#globalModal').modal('toggle');
              //alert(response);
              
          }
      });
    return false;
});

</script>