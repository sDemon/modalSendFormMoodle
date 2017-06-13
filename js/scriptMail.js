/* must apply only after HTML has loaded */
$(document).ready(function () {
    $("#contactForm").on("submit", function(e) {
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax({
            url: formURL,
            type: "POST",
            data: postData,
            success: function(data, textStatus, jqXHR) {
                $('#contactDialog:lang(uk) .modal-header .modal-title').html("Результат");
                $('#contactDialog:lang(ru) .modal-header .modal-title').html("Результат");
                $('#contactDialog:lang(en) .modal-header .modal-title').html("Result");
                $('#contactDialog .modal-body').html(data);
                $("#submitForm").remove();
            },
            error: function(jqXHR, status, error) {
                console.log(status + ": " + error);
            }
        });
        e.preventDefault();
    });

    $("#submitForm").on('click', function() {
        $("#contactForm").submit();
    });
    $("#closeForm, #close").on('click', function() {
        location.reload();
    });
});
