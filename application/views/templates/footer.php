</div>
<div id="footer">
    <footer>
        <div class="container">
            <div class="row text-center">
                <hr>
                <div class="col-md-6">
                    <h5>Made by:</h5>
                    <p>Nikola Kovačević<br>kovacevicnikola@protonmail.com</p>
                    <br>
                    <p>Find more info <br>on <a href="<?php echo base_url(); ?>contact">Contact</a> page.</p>
                </div>
                <div class="col-md-6">
                    <h5>Useful links</h5>
                    <hr>
                    <p><a href="<?php echo base_url(); ?>">Home</a></p>
                    <p><a href="<?php echo base_url(); ?>topics">Topics</a></p>
                    <p><a href="<?php echo base_url(); ?>about">About</a></p>
                    <p><a href="<?php echo base_url(); ?>help">Help</a></p>
                </div>
                <!-- <div class="col-md-6">
                <img src="<?php echo base_url(); ?>assets/images/logo_black_1.png" width="200">
            </div> -->
                <div class="col-12 mb-3">
                    <hr>
                    <em>&copy;Vehix </em>
                </div>
            </div>
        </div>
    </footer>
</div>

<script>
    CKEDITOR.replace('editor1');
</script>

<!-- Script -->
<script type='text/javascript'>
    $(document).ready(function() {

        // Initialize
        $('.ratingbar').rating({
            showCaption: false,
            showClear: false,
            size: 'lg'
        });

        // Rating change
        $('.ratingbar').on('rating:change', function(event, value, caption) {
            var id = this.id;
            var splitid = id.split('_');
            var topic_id = splitid[1];

            $.ajax({
                url: '<?= base_url() ?>topics/updateRating',
                type: 'POST',
                data: {
                    topic_id: topic_id,
                    rating: value,
                },
                success: function(response) {
                    $(topic_id).text(response);
                    $('#averagerating_' + topic_id).text(response);
                }
            });
        });
    });
</script>

</body>

</html>