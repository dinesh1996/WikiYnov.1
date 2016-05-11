$('form#comment').on('submit', function (e) {
    console.log('form');
    e.preventDefault();

    var comment = $("#comment").val();
    var post_id = $("#id").val();

    var dataString = $(this).serialize();
    $("#flash").show();
    //$("#flash").fadeIn(400).html('<img src="ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');
    $.ajax({
        type: "POST",
        url: "commentajax.php",
        data: dataString,
        cache: false,
        success: function (html) {
            console.log(html);
            $("ol#update").append(html);
            $("ol#update li:last").fadeIn("slow");
            document.getElementById('comment').value = '';

            $("#name").focus();

            $("#flash").hide();

        }
    });

});





