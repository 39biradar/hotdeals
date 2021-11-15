$(function(){
  $("#search_deals").autocomplete({
    source: "<?php echo base_url();?>index.php/home/get_deals" // path to the get_birds method
  });
});