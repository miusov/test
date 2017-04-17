(function($) {
    $(function() {
        
        $('#review').click(function () {
            // var form   = $('#form-task').serialize();
                $.ajax({
                    url: '/task/review',
                    type: 'post',
                    data: {'name':$('#name').val(), 'email':$('#email').val(), 'text':$('#text').val(), 'img':$('#image').attr('src')},
                    success: function (res) {
                        $('#add-task').hide();
                        $('#block-review').html(res);
                    },
                    error: function () {
                        alert('ERROR');
                    }
                })
            });

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#img").change(function(){
            readURL(this);
        });
        
    })
})(jQuery)
