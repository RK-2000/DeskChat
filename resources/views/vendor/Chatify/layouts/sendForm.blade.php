<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <label><span class="fas fa-paperclip"></span><input disabled='disabled' type="file" class="upload-attachment" name="file" accept="image/*, .txt, .rar, .zip" /></label>
        <textarea id="encyptMessage" readonly='readonly' name="message" class="m-send app-scroll" placeholder="Type a message.."></textarea>
        <button disabled='disabled' id="sendButton"><span class="fas fa-paper-plane"></span></button>
    </form>
</div>

<script>
    $( document ).ready(function() {
        $("#sendButton").click(function(){
            if($("#encyptMessage").val() == ""){
                return;
            }
            var key= 'abc123XYZ';
            let message = $("#encyptMessage").val();
            var encrypted = CryptoJS.AES.encrypt(message, key);  
            $("#encyptMessage").val(encrypted);
        });
    });
</script>