	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.6/holder.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>

    <!--===============================================================================================-->
	<script type="text/javascript" src="{{ asset('vendor0/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{ asset('vendor0/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{ asset('vendor0/bootstrap/js/popper.js') }}"></script>
	<script type="text/javascript" src="{{ asset('vendor0/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{ asset('vendor0/select2/select2.min.js') }}"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{ asset('vendor0/slick/slick.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/slick-custom.js') }}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{ asset('vendor0/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{ asset('vendor0/lightbox2/js/lightbox.min.js') }}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{ asset('vendor0/sweetalert/sweetalert.min.js') }}"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script src="{{ asset('js/main.js') }}"></script>
	<script>
		$(document).ready(function() {
    $('.registerForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'The username can only consist of alphabetical, number and underscore'
                    }
                }
            },
            phone: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'The username can only consist of alphabetical, number and underscore'
                    }
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'The email is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            }
        }
    });
});
	</script>