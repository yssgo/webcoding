<script>UPLOADCARE_PUBLIC_KEY = "<?=$prefer['uploadcare_publickey']?>"</script>
<script charset="utf-8" src="config/uploadcare_settings.js">
</script>
<script charset="utf-8" src="https://ucarecdn.com/libs/widget/2.10.3/uploadcare.full.min.js"></script>

<script type="text/javascript">
    var sw=uploadcare.SingleWidget('[role=uploadcare-uploader]');
    sw.onUploadComplete(function(info){
        document.querySelector("#description").value=document.querySelector("#description").value+
        '<img src="'+info.cdnUrl+'" alt="" />';
    });
</script>
